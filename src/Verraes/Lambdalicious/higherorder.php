<?php
atom('partial');
atom('compose');
atom('memoize');
atom('__'); // Argument placeholder for partials

/**
 * The compose function returns a closure that calls each of the functions from last to first, passing on the result of
 * each function call to the next.
 * @param $functions
 * @return callable
 */
function compose(...$functions)
{
    return reduce(
        function (callable $carry, $function) {
            return function ($argument) use ($carry, $function) {
                return $carry($function($argument));
            };
        },
        $functions,
        identity
    );

}

/**
 * Fixes the $arguments to $function, producing another function with the leftover arguments.
 *
 * @param $function
 * @param $arguments
 * @return callable
 */
function partial($function, ...$arguments)
{
    return function (...$moreArguments) use ($function, $arguments) {
        return call($function, concat($arguments, $moreArguments));
    };

}


/**
 * Stores the results of expensive function calls and returns the cached result when the same function is called with
 * the same inputs again.
 *
 * @param callable $function
 * @return callable
 */
function memoize(callable $function)
{
    // We can't get a unique id for a closure so we have to do it using SplObjectStorage.
    // spl_object_hash() recycles used ids when objects are trashed.
    static $cache;
    if(!isset($cache)) $cache = new SplObjectStorage;
    if(!$cache->contains($function)) {
        $cache->attach($function, new ArrayObject());
    }

    return function(...$arguments) use($cache, $function) {
        $key = serialize($arguments);
        if(!array_key_exists($key, $cache[$function])) {
            $cache[$function][$key] = call($function, $arguments);
        }
        return $cache[$function][$key];
    };
}

<?php

/**
 * Kernel consists of functions that can't be implemented in Lambdalicious, and
 * are therefore written in legacy PHP.
 */


/**
 * Defines an atom.
 *
 * @param $atoms
 * @return void
 */
function atom(...$atoms)
{
    array_walk(
        $atoms,
        function ($atom) {
            if (defined($atom)) {
                if ($atom !== constant($atom)) raise("The atom is already defined with a different value: ".$atom);
            } else {
                define($atom, $atom);
            }
        }
    );
}

atom(@atom);
atom(@raise);
atom(@dispatch);
atom(@acceptsmessage);
atom(@isatom);


final class _λlicious_failed extends \Exception {}

/**
 * Raise an error.
 * @param $error
 * @return null
 * @throws _λlicious_failed
 */
function raise($error)
{
    throw new _λlicious_failed($error);
    return null; // for IDE's
}

/**
 * Returns a function that dispatches messages according to a map
 * @param array $map
 * @param string $error
 * @return callable
 */
function dispatch(array $map, $error = "Message could not be dispatched.")
{
    return function($message) use ($map, $error) {
        return
            array_key_exists($message, $map) ? $map[$message] :
            raise($error)
        ;
    };
}

/**
 * Check if a function accepts a message as the first argument
 * @param $function
 * @return bool
 * @throws _λlicious_failed
 */
function acceptsmessage($function)
{
    return
        !is_callable($function) ? false :
        (new ReflectionFunction($function))->getParameters()[0]->name == 'message'
    ;
}

/**
 * @param $atom
 * @return bool
 */
function isatom($atom)
{
    return is_scalar($atom);
}

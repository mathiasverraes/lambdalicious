<?php
atom(@arity);
atom(@call);
atom(@reverseargs);
atom(@evaluate);

/**
 * Set up some private stuff
 */
function __λlicious() {
    // @todo move out?
    if(!array_key_exists('λlicious', $GLOBALS)) $GLOBALS['λlicious'] = [];
    if(!array_key_exists('functions', $GLOBALS['λlicious'])) $GLOBALS['λlicious']['functions'] = [];
}

/**
 * Define a function that can be referenced by an atom
 * @param atom $name
 * @param callable $function
 * @return callable
 */
function def($name, callable $function)
{
    __λlicious();
    if(isdefined($name)) {
        throw new FunctionIsAlreadyDefined($name);
    }
    atom($name);
    $GLOBALS['λlicious']['functions'][$name] = $function;
    return $function;
}
final class FunctionIsAlreadyDefined extends Exception {}

/**
 * Is the function defined?
 *
 * @param atom $name
 */
function isdefined($name)
{
    __λlicious();
    return
        (
            is_string($name)
            && array_key_exists($name, $GLOBALS['λlicious']['functions'])
        )
        || is_callable($name);
}

/**
 * Call a $function using $arguments
 *
 * @partial
 * @param atom $function
 * @param array $arguments
 * @return mixed|callable
 */
function call($function, $arguments)
{
    __λlicious();

    if(not(isdefined($function))) {
        throw new FunctionIsNotDefined($function);
    }

    $call  = function($function, $arguments) {
        return call_user_func_array($function, $arguments);
    };


    $callback =
        is_callable($function) ? $function :
        ($GLOBALS['λlicious']['functions']($function));
    return $call($callback, $arguments);
}
final class FunctionIsNotDefined extends Exception {}

/**
 * Reverse the arguments of $function
 *
 * @param callable $function
 * @return callable
 */
function reverseargs($function)
{
    return function(...$arguments) use($function) {
        return call($function, reverse($arguments));
    };
}

/**
 * @param $function
 * @return bool
 */
function isfunction($function)
{
    return is_callable($function);
}

/**
 * Return the value of $x
 *
 * @param $x
 * @return mixed
 */
function evaluate($x)
{
    if(isfunction($x)) return $x(); else return $x;
}
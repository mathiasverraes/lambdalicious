<?php
atom(@arity);
atom(@call);
atom(@reverseargs);
atom(@evaluate);

/**
 * Call a $function using $arguments
 *
 * @partial
 * @param callable $function
 * @param list $arguments
 * @return mixed|callable
 */
function call($function, $arguments)
{
    return
        hasplaceholders(func_get_args()) ? call_user_func_array(partial, la(cons(call, al(func_get_args())))) :
        call_user_func_array($function, la($arguments));
}

/**
 * Reverse the arguments of $function
 *
 * @param callable $function
 * @return callable
 */
function reverseargs($function)
{
    return function(...$arguments) use($function) {
        return call($function, reverse(al($arguments)));
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
    return isfunction($x) ? $x() : $x;
}

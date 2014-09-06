<?php
atom(@isinstanceof);
atom(@add);
atom(@subtract);
atom(@multiply);
atom(@divide);
atom(@mod);
atom(@lt);
atom(@lteq);
atom(@gt);
atom(@gteq);
atom(@noteq);
atom(@not);
atom(@and_);
atom(@or_);
atom(@exponent);
atom(@negate);

/**
 * @partial
 * @param $object
 * @param $className
 * @return bool|callable
 */
function isinstanceof($object, $className)
{
    return
        hasplaceholders(func_get_args()) ? partial(isinstanceof, $object, $className) :
        $object instanceof $className;
}

/**
 * Returns - $x
 * @param $x
 * @return mixed
 */
function negate ($x) {
    return -$x;
};

/**
 * @partial
 * @param $x
 * @param $y
 * @return mixed|callable
 */
function add($x, $y)
{
    return
        hasplaceholders(func_get_args()) ? partial(add, $x, $y) :
        $x + $y;
}

/**
 * @partial
 * @param $x
 * @param $y
 * @return mixed|callable
 */
function subtract($x, $y)
{
    return
        hasplaceholders(func_get_args()) ? partial(subtract, $x, $y) :
        $x - $y;
}


/**
 * @partial
 * @param $x
 * @param $y
 * @return mixed|callable
 */
function multiply($x, $y)
{
    return
        hasplaceholders(func_get_args()) ? partial(multiply, $x, $y) :
        $x * $y;
}

/**
 * @partial
 * @param $x
 * @param $y
 * @return mixed|callable|float
 */
function divide($x, $y)
{
    return
        hasplaceholders(func_get_args()) ? partial(divide, $x, $y) :
        $x / $y;
}

/**
 * @partial
 * @param $x
 * @param $y
 * @return mixed|callable|int
 */
function mod($x, $y)
{
    return
        hasplaceholders(func_get_args()) ? partial(mod, $x, $y) :
        $x % $y;
}

/**
 * @partial
 * @param $x
 * @param $y
 * @return mixed|callable
 */
function exponent($x, $y)
{
    return
        hasplaceholders(func_get_args()) ? partial(exponent, $x, $y) :
        $x ** $y;
}

/**
 * @partial
 * @param $x
 * @param $y
 * @return bool|callable
 */
function lt($x, $y)
{
    return
        hasplaceholders(func_get_args()) ? partial(lt, $x, $y) :
        $x < $y;
}

/**
 * @partial
 * @param $x
 * @param $y
 * @return bool|callable
 */
function lteq($x, $y)
{
    return
        hasplaceholders(func_get_args()) ? partial(lteq, $x, $y) :
        $x <= $y;
}

/**
 * @partial
 * @param $x
 * @param $y
 * @return bool|callable
 */
function gt($x, $y)
{
    return
        hasplaceholders(func_get_args()) ? partial(gt, $x, $y) :
        $x > $y;
}

/**
 * @partial
 * @param $x
 * @param $y
 * @return bool|callable
 */
function gteq($x, $y)
{
    return
        hasplaceholders(func_get_args()) ? partial(gteq, $x, $y) :
        $x >= $y;
}

/**
 * @partial
 * @param $x
 * @param $y
 * @return bool|callable
 */
function noteq($x, $y)
{
    return
        hasplaceholders(func_get_args()) ? partial(noteq, $x, $y) :
        !isequal($x, $y);
}

/**
 * @todo maybe this should be a normal NOT, find something else for inverting predicates?
 * @param callable $function
 * @return bool|callable
 */
function not(callable $function)
{
    return function (...$arguments) use ($function) {
        return !call($function, $arguments);
    };
}

/**
 * @partial
 * @param $x
 * @param $y
 * @return bool|callable
 */
function and_($x, $y)
{
    return
        hasplaceholders(func_get_args()) ? partial(and_, $x, $y) :
        $x && $y;
}

/**
 * @partial
 * @param $x
 * @param $y
 * @return bool|callable
 */
function or_($x, $y)
{
    return
        hasplaceholders(func_get_args()) ? partial(or_, $x, $y) :
        $x || $y;
}


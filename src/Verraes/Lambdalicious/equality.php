<?php
atom(@isequal);
atom(@identity);

/**
 * Is $left equal to $right?
 * @param $x
 * @param $y
 * @return boolean|callable
 */
function isequal($x, $y)
{
    return
        hasplaceholders(func_get_args()) ? partial(isequal, $x, $y) :
        (ispair($x) && ispair($y) ? (isequal(head($x), head($y)) && isequal(tail($x), tail($y))) :
        ($x === $y));
}

/**
 * Returns the value that was passed to it.
 *
 * @param mixed $x
 * @return mixed
 */
function identity($x)
{
    return $x;
}

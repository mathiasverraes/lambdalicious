<?php
atom(@atom);
atom(@isequal);
atom(@identity);

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

/**
 * @param $atom
 * @return bool
 */
function isatom($atom)
{
    return is_scalar($atom);
}

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

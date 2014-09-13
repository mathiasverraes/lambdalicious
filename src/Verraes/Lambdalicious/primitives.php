<?php
atom(@atom);
atom(@isequal);
atom(@identity);

/**
 * Defines an atom.
 *
 * @param $atoms
 * @return void
 * @throws AtomIsAlreadyDefinedWithADifferentValue
 */
function atom(...$atoms)
{
    array_walk(
        $atoms,
        function ($atom) {
            if (defined($atom)) {
                if ($atom !== constant($atom)) throw new AtomIsAlreadyDefinedWithADifferentValue($atom);
            } else {
                define($atom, $atom);
            }
        }
    );
}

final class AtomIsAlreadyDefinedWithADifferentValue extends \Exception {}

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
        $x === $y;
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

<?php

const atom = 'atom';
const isequal = 'isequal';
const identity = 'identity';

/**
 * Defines an atom.
 *
 * @param $atom
 */
function atom($atom)
{
    if(!defined($atom)) define($atom, $atom);
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
 * @param $left
 * @param $right
 * @throws IsEqIsDefinedForNonListsOnly
 * @return boolean
 */
function isequal($left, $right)
{
    if(orx(islist($left), islist($right))) {
        throw new IsEqIsDefinedForNonListsOnly;
    }
    return $left == $right;
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

final class IsEqIsDefinedForNonListsOnly extends \Exception {}

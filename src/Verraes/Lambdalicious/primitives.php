<?php

/**
 *
 */
const atom = 'atom';
const iseq = 'iseq';
const isempty = 'isempty';
const cons = 'cons';
const car = 'car';
const cdr = 'cdr';
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
function iseq($left, $right)
{
    if(is_array($left) || is_array($right)) {
        throw new IsEqIsDefinedForNonListsOnly;
    }
    return $left == $right;
}

/**
 * Is the list empty?
 *
 * @param array $list
 * @throws IsEmptyIsDefinedOnlyForLists
 * @return boolean
 */
function isempty($list)
{
    if(!is_array($list)) {
        throw new IsEmptyIsDefinedOnlyForLists;
    }
    return [] === $list;
}


/**
 * Create a list from $element and $list
 *
 * @param $element
 * @param array $list
 * @return array
 */
function cons($element, array $list)
{
    return array_merge([$element], array_values($list));
}

/**
 * Get the first element off a list
 *
 * @param array $list
 * @return mixed
 * @throws CarIsDefinedOnlyForNonEmptyLists
 */
function car(array $list)
{
    if ([] === $list) {
        throw new CarIsDefinedOnlyForNonEmptyLists;
    }

    return reset($list);
}

/**
 * Get the list without the first element
 *
 * @param array $list
 * @throws CdrIsDefinedOnlyForNonEmptyLists
 * @return array
 */
function cdr(array $list)
{
    if ([] === $list) {
        throw new CdrIsDefinedOnlyForNonEmptyLists;
    }

    return array_slice($list, 1);
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
final class IsEmptyIsDefinedOnlyForLists extends \Exception {}
final class CarIsDefinedOnlyForNonEmptyLists extends \Exception {}
final class CdrIsDefinedOnlyForNonEmptyLists extends \Exception {}

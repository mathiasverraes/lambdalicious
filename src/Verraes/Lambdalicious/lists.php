<?php
atom('isempty');
atom('contains1');
atom('cons');
atom('car');
atom('cdr');
atom('reduce');
atom('map');
atom('filter');
atom('concat');
atom('reverse');
atom('islist');
atom('count');

/**
 * @param $list
 * @return bool
 */
function islist($list)
{
    return is_array($list);
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
    if(!islist($list)) throw new IsEmptyIsDefinedOnlyForLists;
    return [] === $list;
}
final class IsEmptyIsDefinedOnlyForLists extends \Exception {}

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
    if (isempty($list)) throw new CarIsDefinedOnlyForNonEmptyLists;
    return reset($list);
}
final class CarIsDefinedOnlyForNonEmptyLists extends \Exception {}

/**
 * Get the list without the first element
 *
 * @param array $list
 * @throws CdrIsDefinedOnlyForNonEmptyLists
 * @return array
 */
function cdr(array $list)
{
    if (isempty($list)) throw new CdrIsDefinedOnlyForNonEmptyLists;
    return array_slice($list, 1);
}
final class CdrIsDefinedOnlyForNonEmptyLists extends \Exception {}

/**
 * True if the list contains exactly one item
 * @param array $list
 * @return bool
 */
function contains1(array $list)
{
    return count($list) === 1;
}
/**
 * Applies $function to the elements of the given $list
 *
 * @partial
 * @param callable $function
 * @param array $list
 * @return array
 */
function map($function, $list)
{
    return
        hasplaceholders(func_get_args()) ? partial(map, $function, $list) :
        array_map($function, $list);
}

/**
 * Reduce $list to a single value using $function($carry, $item), starting by $initial
 *
 * @partial
 * @param callable $function
 * @param array $list
 * @param $initial
 * @return mixed|callable
 */
function reduce($function, $list, $initial)
{
    return
        hasplaceholders(func_get_args()) ? partial(reduce, $function, $list, $initial) :
        array_reduce($list, $function, $initial);
}

/**
 * Returns a list of items from $list for which $predicate is true
 *
 * @partial
 * @param callable $predicate
 * @param array $list
 * @return array|callable
 */
function filter($predicate, $list)
{
    return
        hasplaceholders(func_get_args()) ? partial(filter, $predicate, $list) :
        array_values(array_filter($list, $predicate));
}

/**
 * Make a new list of the elements of all the lists.
 *
 * @param $lists
 * @return array|mixed
 */
function concat(...$lists)
{
    if(isempty($lists)) return [];
    if(contains1($lists)) return car($lists);
    return array_merge(car($lists), call(concat, cdr($lists)));
}

/**
 * Reverse a list
 *
 * @param array $list
 * @return array
 */
function reverse(array $list)
{
    return array_reverse($list, false);
}
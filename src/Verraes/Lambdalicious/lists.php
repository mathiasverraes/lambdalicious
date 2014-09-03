<?php

const isempty = 'isempty';
const cons = 'cons';
const car = 'car';
const cdr = 'cdr';
const reduce = 'reduce';
const map = 'map';
const filter = 'filter';
const concat = 'concat';

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
    if ([] === $list) {
        throw new CarIsDefinedOnlyForNonEmptyLists;
    }

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
    if ([] === $list) {
        throw new CdrIsDefinedOnlyForNonEmptyLists;
    }

    return array_slice($list, 1);
}
final class CdrIsDefinedOnlyForNonEmptyLists extends \Exception {}

function map(callable $function, array $list)
{
    return array_map($function, $list);
}

/**
 * Reduce $list to a single value using $function($carry, $item), starting by $initial
 *
 * @param callable $function
 * @param array $list
 * @param $initial
 * @return mixed
 */
function reduce(callable $function, array $list, $initial)
{
    return array_reduce($list, $function, $initial);
}

function filter(callable $function, array $list)
{
    return array_values(array_filter($list, $function));
}

function concat(...$lists)
{
    if(isempty($lists)) return [];
    if(1 == count($lists)) return car($lists);
    return array_merge(car($lists), call(concat, cdr($lists)));
}
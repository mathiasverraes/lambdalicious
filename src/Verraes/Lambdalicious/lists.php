<?php
atom(@isempty);
atom(@contains1);
atom(@cons);
atom(@head);
atom(@tail);
atom(@reduce);
atom(@map);
atom(@filter);
atom(@concat);
atom(@reverse);
atom(@islist);
atom(@count);

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
function cons($element, array $list = [])
{
    return array_merge([$element], array_values($list));
}

/**
 * Get the first element off a list
 *
 * @param array $list
 * @return mixed
 * @throws HeadIsDefinedOnlyForNonEmptyLists
 */
function head(array $list)
{
    if (isempty($list)) throw new HeadIsDefinedOnlyForNonEmptyLists;
    return reset($list);
}
final class HeadIsDefinedOnlyForNonEmptyLists extends \Exception {}

/**
 * Returns the list without its first element
 *
 * @param array $list
 * @throws TailIsDefinedOnlyForNonEmptyLists
 * @return array
 */
function tail(array $list)
{
    if (isempty($list)) throw new TailIsDefinedOnlyForNonEmptyLists;
    return array_slice($list, 1);
}
final class TailIsDefinedOnlyForNonEmptyLists extends \Exception {}

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
 * @return array|callable
 */
function map($function, $list)
{
    return
        hasplaceholders(func_get_args())
            ? partial(map, $function, $list) :
        (isempty($list)
            ? [] :
        (cons($function(head($list)), map($function, tail($list)))));
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
        (isempty($list)
            ? $initial :
        reduce($function, tail($list), $function($initial, head($list))));
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
    // the private $_filter() serves to hide $carry from the public filter()
    $_filter = function($predicate, $list, $carry) use(&$_filter) {
        return
            (isempty($list)
                ? reverse($carry) :
            ($predicate(head($list))
                ? $_filter($predicate, tail($list), cons(head($list), $carry)) :
            $_filter($predicate, tail($list), $carry)));
    };

    return
        hasplaceholders(func_get_args())
            ? partial(filter, $predicate, $list) :
        $_filter($predicate, $list, []);

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
    if(contains1($lists)) return head($lists);
    return array_merge(head($lists), call(concat, tail($lists)));
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
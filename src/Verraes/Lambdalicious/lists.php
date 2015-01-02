<?php
atom(@isempty);
atom(@contains1);
atom(@cons);
atom(@head);
atom(@tail);
atom(@length);
atom(@reduce);
atom(@map);
atom(@map2);
atom(@zipWith);
atom(@filter);
atom(@concat);
atom(@reverse);
atom(@islist);
atom(@count);
atom(@max_by);
atom(@min_by);
atom(@compare_by);
atom(@zip);

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
 * @return boolean
 */
function isempty($list)
{
    return
        !islist($list) ? raise("isempty() is only defined for lists") :
        ([] === $list);
}

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
 */
function head(array $list)
{
    if (isempty($list)) raise("head() is only defined for non-empty lists.");
    return reset($list);
}

/**
 * Returns the list without its first element
 *
 * @param array $list
 * @return array
 */
function tail(array $list)
{
    if (isempty($list)) raise("tail() is only defined for non-empty lists.");
    return array_slice($list, 1);
}

/**
 * Returns the length of a list
 *
 * @param array $list
 *
 * @return int
 */
function length(array $list)
{
    return
        isempty($list) ? 0 :
        add(1, length(tail($list)))
    ;
}

/**
 * True if the list contains exactly one item
 * @param array $list
 * @return bool
 */
function contains1(array $list)
{
    return isequal(length($list), 1);
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
 * Map over two lists using a mapper function (zipWith)
 *
 * @param callable $function
 * @param array    $listA
 * @param array    $listB
 *
 * @return array
 */
function map2($function, $listA, $listB)
{
    return
        hasplaceholders(func_get_args()) ? partial(map2, $function, $listA, $listB) :
        (isempty($listA) || isempty($listB)
            ? [] :
        cons($function(head($listA), head($listB)), map2($function, tail($listA), tail($listB))));
}

/**
 * Alias map2 to zipWith
 */
function zipWith($function, $listA, $listB)
{
    return map2($function, $listA, $listB);
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
    return
        isempty($lists) ? [] :
        (contains1($lists) ? head($lists) :
        (array_merge(head($lists), call(concat, tail($lists)))))
    ;
}

/**
 * Reverse a list
 *
 * @param array $list
 * @return array
 */
function reverse(array $list, array $carry = [])
{
    return
        isempty($list) ? $carry :
        reverse(tail($list), cons(head($list), $carry))
    ;
}

function compare_by($comparator, $extract, $list)
{
    $compare = function($carry, $item) use ($extract, $comparator) {
        return is_null($carry) || $comparator($extract($item), $extract($carry)) ? $item : $carry;
    };

    return
        hasplaceholders(func_get_args())
            ? partial(compare_by, $comparator, $extract, $list) :
            array_reduce($list, $compare);
}


/**
 * Get the max item of a list, using an extract function
 *
 * @param callable $extract
 * @param array $list
 * @return mixed
 */
function max_by($extract, $list)
{
    return compare_by(gt, $extract, $list);
}

/**
 * Get the min item of a list, using an extract function
 *
 * @param callable $extract
 * @param array $list
 * @return mixed
 */
function min_by($extract, $list)
{
    return compare_by(lt, $extract, $list);
}

/**
 * Zip two lists
 *
 * @param array $listA
 * @param array $listB
 *
 * @return array of tuples
 */
function zip($listA, $listB)
{
    return map2(tuple, $listA, $listB);
}


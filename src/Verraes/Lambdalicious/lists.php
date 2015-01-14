<?php
atom(@_isempty);
atom(@isempty);
atom(@contains1);
atom(@cons);
atom(@length);
atom(@reduce);
atom(@map);
atom(@filter);
atom(@concat);
atom(@concat2);
atom(@reverse);
atom(@count);
atom(@max_by);
atom(@min_by);
atom(@compare_by);
atom(@zip);
atom(@zipWith);

/**
 * Is the list empty?
 *
 * @param callable $list
 * @return boolean
 */
function _isempty($list)
{
    return
        !is_array($list) ? raise('_isempty() is only defined for arrays') :
        ([] === $list);
}
function isempty($list)
{
    return
        !islist($list) ? raise("isempty() is only defined for lists") :
        (l() === $list);
}

/**
 * Create a list from $element and $list
 *
 * @param $element
 * @param array $list
 * @return array
 */
function cons($element, $list = 'λ_list')
{
    return
        is_array($list) ? array_merge(array($element), $list) : (
        !islist($list) ? raise("cons() is only defined for lists") :
        pair($element, $list));
}


/**
 * Returns the length of a list
 *
 * @param callable $list
 *
 * @return int
 */
function length($list)
{
    return
        ((is_array($list) && _isempty($list)) || (islist($list) && isempty($list))) ? 0 :
        add(1, length(tail($list)))
    ;
}

/**
 * True if the list contains exactly one item
 * @param list $list
 * @return bool
 */
function contains1($list)
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
        hasplaceholders(al(func_get_args()))
            ? partial(map, $function, $list) :
        (isempty($list)
            ? l() :
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
        hasplaceholders(al(func_get_args())) ? partial(reduce, $function, $list, $initial) :
        (((is_array($list) && _isempty($list)) || !is_array($list) && isempty($list))
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
        hasplaceholders(al(func_get_args()))
            ? partial(filter, $predicate, $list) :
        $_filter($predicate, $list, l());

}

/**
 * Make a new list of the elements of all the lists.
 *
 * @param $lists
 * @return array|mixed
 */
function concat(...$lists)
{
    $lists = al($lists);

    return
        isempty($lists) ? l() :
        (contains1($lists) ? head($lists) :
        (concat2(head($lists), call(concat, tail($lists)))))
    ;
}

/**
 * Make a new list of the elements of two lists
 *
 * @param $listA
 * @param $listB
 * @return list
 */
function concat2($listA, $listB)
{
    return
        ((is_array($listA) && _isempty($listA)) || (!is_array($listA) && isempty($listA))) ? $listB :
        cons(head($listA), concat2(tail($listA), $listB))
    ;
}

/**
 * Reverse a list
 *
 * @param array $list
 * @return array
 */
function _reverse(array $list, array $carry = [])
{
    return
        _isempty($list) ? $carry :
        _reverse(tail($list), cons(head($list), $carry))
    ;
}

/**
 * Reverse a list
 *
 * @param list $list
 * @return array
 */
function reverse($list, $carry = 'λ_list')
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
        hasplaceholders(al(func_get_args()))
            ? partial(compare_by, $comparator, $extract, $list) :
            reduce($compare, $list, null);
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
 * @return array of pairs
 */
function zip($listA, $listB)
{
    return zipWith(pair, $listA, $listB);
}

/**
 * Zip two lists using a zipper function
 *
 * @param callable $function
 * @param array    $listA
 * @param array    $listB
 *
 * @return array
 */
function zipWith($function, $listA, $listB)
{
    return
        hasplaceholders(al(func_get_args())) ? partial(zipWith, $function, $listA, $listB) :
        (isempty($listA) || isempty($listB)
            ? l() :
        cons($function(head($listA), head($listB)), zipWith($function, tail($listA), tail($listB))));
}

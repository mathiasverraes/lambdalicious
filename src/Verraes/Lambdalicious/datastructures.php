<?php

atom(@pair);
atom(@ispair);
atom(@head);
atom(@tail);
atom(@l);
atom(@islist);

/**
 * Construct a pair
 * @param $head
 * @param $tail
 * @return pair
 */
function pair($head, $tail) {
    return function($index) use($head, $tail) {
        return
            $index === head ? $head :
            ($index === tail ? $tail :
            ($index === ispair ? @λ_pair : // a bit hackish
            raise("A pair can only be deconstructed using head or tail")))
        ;
    };
};

/**
 * @param pair $pair
 * @return bool
 */
function ispair($pair)
{
    /** @var callable $pair */ // pleasing the IDE
    return is_callable($pair) && ($pair(ispair) === @λ_pair);
}

/**
 * Get the first element off a list
 *
 * @param pair|array
 * @return mixed|array
 */
function head($data)
{
    return
        // for compatibility with arrays (@TODO get rid of this later?)
        is_array($data) ?
            (_isempty($data) ? raise("head() is only defined for non-empty lists.") : reset($data)) :
            $data(head);
}

/**
 * Returns the second element of the pair, or returns the list without its first element
 *
 * @param pair|array
 * @return mixed|array
 */
function tail($data)
{
    return
        // for compatibility with arrays (@TODO get rid of this later?)
        is_array($data) ?
            (_isempty($data) ? raise("tail() is only defined for non-empty lists.") : array_slice($data, 1)) :
        $data(tail);
}

final class pair {} // for IDE's

/**
 * Creates a list
 */
function l(...$elements)
{
    $createList = function(array $elements, $list = 'λ_list') use (&$createList) {
        if (empty($elements)) {
            return $list;
        }

        $last = current(array_reverse($elements));

        $newList = pair($last, $list);

        return $createList(array_reverse(array_slice(array_reverse($elements), 1)), $newList);
    };

    return $createList($elements);
}

/**
 * @param list $list
 * @return bool
 */
function islist($list)
{
    return $list === l() || (ispair($list) && islist(tail($list)));
}

/**
 * Cast an array to a list
 *
 * @param array $array
 *
 * @return list
 */
function arrayl($array)
{
    return call_user_func_array(l, $array);
}

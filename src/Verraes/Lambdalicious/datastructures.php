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
 * Get the first element of a list
 *
 * @param pair|list
 * @return mixed|list
 */
function head($data)
{
    return $data(head);
}

/**
 * Returns the second element of the pair, or returns the list without its first element
 *
 * @param pair|list
 * @return mixed|list
 */
function tail($data)
{
    return $data(tail);
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

        $newList = pair(array_pop($elements), $list);

        return $createList($elements, $newList);
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
function al(array $array)
{
    return call_user_func_array(l, $array);
}

/**
 * Cast a list to an array
 *
 * @param list $list
 *
 * @return array
 */
function la($list)
{
    return
        !islist($list) ? raise("la() is only defined for lists") :
        (isempty($list) ? [] :
        array_merge([head($list)], la(tail($list))))
    ;
}

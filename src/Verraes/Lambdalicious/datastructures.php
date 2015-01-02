<?php

atom(@pair);
atom(@ispair);
atom(@head);
atom(@tail);

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
            (isempty($data) ? raise("head() is only defined for non-empty lists.") : reset($data)) :
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
            (isempty($data) ? raise("tail() is only defined for non-empty lists.") : array_slice($data, 1)) :
        $data(tail);
}

final class pair {} // for IDE's

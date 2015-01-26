<?php

atom(@pair);
atom(@ispair);
atom(@head);
atom(@tail);
atom(@l);
atom(@nil);
atom(@islist);

/**
 * Construct a pair
 * @param $head
 * @param $tail
 * @return pair
 */
function pair($head, $tail) {
    return
        dispatch(
            [
                head => $head,
                tail => $tail,
                ispair => @λ_pair
            ], "A pair can only be deconstructed using head or tail"
        );
};

/**
 * Returns a function that dispatches messages according to a map
 * @param array $map
 * @param string $error
 * @return callable
 */
function dispatch(array $map, $error = "Message could not be dispatched.")
{
   return function($message) use ($map, $error) {
        return
            array_key_exists($message, $map) ? $map[$message] :
            raise($error)
        ;
   };
}

/**
 * Check if a function accepts a message as the first argument
 * @param $function
 * @return bool
 * @throws λlicious_failed
 */
function acceptsmessage($function)
{
    return
        !is_callable($function) ? false :
        (new ReflectionFunction($function))->getParameters()[0]->name == 'message'
    ;
}

/**
 * @param pair $pair
 * @return bool
 */
function ispair($pair)
{
    /** @var callable $pair */ // pleasing the IDE
    return acceptsmessage($pair) && ($pair(ispair) === @λ_pair);
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



/**
 * Creates a list
 */
function l(...$elements)
{
    $createList = function(array $elements, $list = nil) use (&$createList) {
        if (empty($elements)) return $list;
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
    return
        $list === nil
        || (ispair($list) && islist(tail($list)))
    ;
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
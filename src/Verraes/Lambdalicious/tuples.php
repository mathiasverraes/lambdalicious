<?php

atom('tuple');
atom('get');
atom('istuple');
atom('pair');
atom('ispair');
atom('first');
atom('second');

/**
 * Build a tuple
 *
 * @param $elements
 * @return __Pair|__Tuple
 */
function tuple(...$elements)
{
    return count($elements) == 2
        ? new __Pair(car($elements), car(cdr($elements)))
        : new __Tuple($elements);
}

/**
 * @param $value
 * @return bool
 */
function istuple($value)
{
    return isinstanceof($value, __Tuple::class);
}

/**
 * Return the element of $tuple at position $index
 *
 * @param $index
 * @param __Tuple $tuple
 * @return mixed
 */
function get($index, __Tuple $tuple)
{
    return $tuple->get($index);
}


/**
 * Build a Pair
 *
 * @param $first
 * @param $second
 * @return __Pair
 */
function pair($first, $second)
{
    return new __Pair($first, $second);
}

/**
 * @param $value
 * @return bool
 */
function ispair($value)
{
    return isinstanceof($value, __Pair::class);
}

/**
 * Return the first element in a Pair
 * @param __Pair $pair
 * @return mixed
 */
function first(__Pair $pair)
{
    return $pair->first;
}

/**
 * Return the second element in a Pair
 *
 * @param __Pair $pair
 * @return mixed
 */
function second(__Pair $pair)
{
    return $pair->second;
}

/**
 * @internal
 */
class __Tuple
{
    private $elements;

    public function __construct(array $elements)
    {
        $this->elements = $elements;
    }

    public function get($index)
    {
        return $this->elements[$index-1] ;
    }
}

/**
 * @internal
 * @property $first
 * @property $second
 */
final class __Pair extends __Tuple
{
    private $first;
    private $second;

    public function __construct($first, $second)
    {
        $this->first = $first;
        $this->second = $second;
    }

    public function __get($name)
    {
        if($name === 'first') return $this->first;
        if($name === 'second') return $this->second;
        throw new BadMethodCallException;
    }
}

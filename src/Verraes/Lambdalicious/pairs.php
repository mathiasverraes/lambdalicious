<?php

atom('pair');
atom('ispair');
atom('first');
atom('second');

/**
 * Build a Pair
 *
 * @param $first
 * @param $second
 * @return Pair
 */
function pair($first, $second)
{
    return new Pair($first, $second);
}

/**
 * @param $item
 * @return bool
 */
function ispair($item)
{
    return isinstanceof($item, Pair::class);
}

/**
 * Return the first element in a Pair
 * @param Pair $pair
 * @return mixed
 */
function first(Pair $pair)
{
    return $pair->first;
}

/**
 * Return the second element in a Pair
 *
 * @param Pair $pair
 * @return mixed
 */
function second(Pair $pair)
{
    return $pair->second;
}

/**
 * @property $first
 * @property $second
 */
final class Pair
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

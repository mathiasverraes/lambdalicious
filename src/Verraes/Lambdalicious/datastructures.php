<?php


atom('pair');
atom('ispair');
atom('first');
atom('last');

/**
 * Build a Pair
 *
 * @param $first
 * @param $last
 * @return Pair
 */
function pair($first, $last)
{
    return new Pair($first, $last);
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
    return method(first, [], $pair);
}

/**
 * Return the last element in a Pair
 *
 * @param Pair $pair
 * @return mixed
 */
function last(Pair $pair)
{
    return method(last, [], $pair);
}

final class Pair
{
    private $first;
    private $last;

    public function __construct($first, $last)
    {
        $this->first = $first;
        $this->last = $last;
    }

    /**
     * @return mixed
     */
    public function first()
    {
        return $this->first;
    }

    /**
     * @return mixed
     */
    public function last()
    {
        return $this->last;
    }
}

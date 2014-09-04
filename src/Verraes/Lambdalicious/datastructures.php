<?php


atom('pair');
atom('ispair');

function pair($first, $second)
{
    return new Pair($first, $second);
}

function ispair($item)
{
    return isinstanceof($item, Pair::class);
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

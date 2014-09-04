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
    private $second;

    public function __construct($first, $second)
    {
        $this->first = $first;
        $this->second = $second;
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
    public function second()
    {
        return $this->second;
    }
}

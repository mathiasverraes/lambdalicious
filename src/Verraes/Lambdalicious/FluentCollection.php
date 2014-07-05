<?php

namespace Verraes\Lambdalicious;

use ArrayObject;
use BadMethodCallException;

/**
 * @property $§ Returns the Collection as an array
 */
final class FluentCollection extends ArrayObject
{
    public function __construct(array $input)
    {
        parent::__construct($input, $flags = 0, $iterator_class = 'ArrayIterator');
    }

    public function __get($name)
    {
        switch ($name) {
            case '§':
                return array_values($this->getArrayCopy());
                break;
            default:
                throw new BadMethodCallException;
        }
    }

    /**
     * @param callable $f
     * @return FluentCollection
     */
    public function map(callable $f)
    {
        return new FluentCollection(array_map($f, $this->§));
    }

    /**
     * @param callable $f
     * @return FluentCollection
     */
    public function filter(callable $f)
    {
        return new FluentCollection(array_filter($this->§, $f));
    }

    /**
     * @param callable $f
     * @param mixed $initial
     * @return mixed
     */
    public function fold(callable $f, $initial = null)
    {
        return array_reduce($this->§, $f, $initial);
    }
}

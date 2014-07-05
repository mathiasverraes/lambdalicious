<?php

namespace Verraes\Lambdalicious;

use ArrayObject;
use BadMethodCallException;

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

    public function map(callable $f)
    {
        return new FluentCollection(array_map($f, $this->§));
    }

    public function filter(callable $f)
    {
        return new FluentCollection(array_filter($this->§, $f));
    }

    public function fold(callable $f, $initial = 0)
    {
        return array_reduce($this->§, $f, $initial);
    }
}

<?php

use Verraes\Lambdalicious\FluentCollection;

function §(array $input)
{
    return new FluentCollection($input);
}

/**
 * Create an operator function, with optional partial application
 * Arity 1: Create the operator
 *          $sum = operator('+');
 *          $sum(1, 2) // 3
 *          Supports currying:
 *          $addOne = $sum(1);
 * Arity 2: Do a partial application
 *          $addOne = operator('1');
 *          $addOne(2); // 3
 * Arity 3: Returns the calculated value
 *          operator('+', 1, 2); // 3
 *
 * @license Forked from https://github.com/nikic/iter Copyright (c) 2013 by Nikita Popov
 * @param $operator
 * @param mixed $a
 * @param mixed $b
 * @return callable
 */
function operator($operator) {
    $functions = [
        'instanceof' => function($a, $b) { return $a instanceof $b; },
        '*'   => function($a, $b) { return $a *   $b; },
        '/'   => function($a, $b) { return $a /   $b; },
        '%'   => function($a, $b) { return $a %   $b; },
        '+'   => function($a, $b) { return $a +   $b; },
        '-'   => function($a, $b) { return $a -   $b; },
        '.'   => function($a, $b) { return $a .   $b; },
        '<<'  => function($a, $b) { return $a <<  $b; },
        '>>'  => function($a, $b) { return $a >>  $b; },
        '<'   => function($a, $b) { return $a <   $b; },
        '<='  => function($a, $b) { return $a <=  $b; },
        '>'   => function($a, $b) { return $a >   $b; },
        '>='  => function($a, $b) { return $a >=  $b; },
        '=='  => function($a, $b) { return $a ==  $b; },
        '!='  => function($a, $b) { return $a !=  $b; },
        '===' => function($a, $b) { return $a === $b; },
        '!==' => function($a, $b) { return $a !== $b; },
        '&'   => function($a, $b) { return $a &   $b; },
        '^'   => function($a, $b) { return $a ^   $b; },
        '|'   => function($a, $b) { return $a |   $b; },
        '&&'  => function($a, $b) { return $a &&  $b; },
        '||'  => function($a, $b) { return $a ||  $b; },
    ];

    if (!isset($functions[$operator])) {
        throw new \InvalidArgumentException("Unknown operator \"$operator\"");
    }

    $fn = $functions[$operator];
    $args = func_get_args();
    switch(func_num_args()) {
        case 1:
            return $fn;
        case 2:
            $a = $args[1];
            return function($x) use ($fn, $a) {
                return $fn($x, $a);
            };
        case 3:
            return $fn($args[1], $args[2]);
        default:
            throw new BadFunctionCallException;

    }
}
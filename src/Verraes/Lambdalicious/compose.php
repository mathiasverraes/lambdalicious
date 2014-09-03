<?php

const compose = 'compose';

/**
 * The compose function returns a closure that calls each of the functions from last to first, passing on the result of
 * each function call to the next.
 * @param $functions
 * @return callable
 */
function compose(...$functions)
{
    return reduce(
        function (callable $carry, $function) {
            return function ($argument) use ($carry, $function) {
                return $carry($function($argument));
            };
        },
        $functions,
        identity
    );

}

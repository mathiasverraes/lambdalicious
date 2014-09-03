<?php

const partial = 'partial';
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

function partial($function, ...$arguments)
{
    return function (...$moreArguments) use ($function, $arguments) {
        return call($function, concat($arguments, $moreArguments));
    };

}
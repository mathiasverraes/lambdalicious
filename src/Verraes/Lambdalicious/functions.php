<?php

const arity = 'arity';
const call = 'call';

/**
 * From http://jasonframe.co.uk/logfile/2009/05/finding-the-arity-of-a-closure-in-php-53/
 * @param $lambda
 * @return int
 */
function arity($lambda)
{
    $m = (new ReflectionObject($lambda))->getMethod('__invoke');
    return $m->getNumberOfParameters();
}

/**
 * Call a $function using $arguments
 * @param callable $function
 * @param array $arguments
 * @return mixed
 */
function call(callable $function, array $arguments)
{
    return call_user_func_array($function, $arguments);
}
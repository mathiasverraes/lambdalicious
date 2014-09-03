<?php

const method = 'method';

/**
 * Call a method on an object
 *
 * @param string $methodName
 * @param array $arguments
 * @param object $object
 * @return mixed
 */
function method($methodName, $arguments, $object)
{
    return call_user_func_array([$object, $methodName], $arguments);
}
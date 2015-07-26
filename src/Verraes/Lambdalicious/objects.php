<?php
atom(@method);

/**
 * Call a method on an object
 *
 * @partial
 * @param string $methodName
 * @param array $arguments
 * @param object $object
 * @return mixed
 */
function method($methodName, $arguments, $object)
{
    return
        hasplaceholders(func_get_args()) ? partial(method, $methodName, $arguments, $object) :
        call_user_func_array([$object, $methodName], $arguments);
}

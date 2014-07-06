<?php

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

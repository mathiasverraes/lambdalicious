<?php

function arity($lambda)
{
    $m = (new ReflectionObject($lambda))->getMethod('__invoke');
    return $m->getNumberOfParameters();
}

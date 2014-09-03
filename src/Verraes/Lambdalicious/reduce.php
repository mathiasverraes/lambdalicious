<?php

const reduce = 'reduce';
function reduce(callable $function, array $list, $initial)
{
    return array_reduce($list, $function, $initial);
}

<?php

/**
 * Return the time it takes to execute $function
 * @param callable $function
 * @param $arguments
 * @return mixed
 */
function profile(callable $function, ...$arguments)
{
    $start = microtime(true);
    call($function, al($arguments));
    return round(subtract(microtime(true), $start), 4);
}

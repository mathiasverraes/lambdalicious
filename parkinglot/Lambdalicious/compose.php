<?php

define('map', 'map');
function map($collection, $fn) { return array_map($fn, $collection); }
define('fold', 'fold');
function fold($collection, $fn, $initial) { return array_reduce($collection, $fn, $initial); }
define('filter', 'filter');
function filter($collection, $fn) { return array_filter($collection, $fn);}

function compose(array $collection, $fn, $args)
{
    $result = call_user_func_array($fn, array_merge([$collection], $args));

    $gotMore = func_num_args() > 3;
    if($gotMore) {
        $allArgs = func_get_args();
        array_shift($allArgs);
        array_shift($allArgs);
        array_shift($allArgs);
        $nextFn = array_shift($allArgs);
        $nextArgs = array_shift($allArgs);
        $rest = $allArgs;

        return call_user_func_array('compose', array_merge([$result, $nextFn, $nextArgs], $rest) );
    }

    return $result;
}

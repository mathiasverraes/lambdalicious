<?php

require_once __DIR__ . '/../src/Verraes/Lambdalicious/load.php';

// Quicksort is another obligated example to demonstrate
$quicksort = function(array $list) use (&$quicksort) {
    return
        isempty($list)
               ? [] :
        concat(
            $quicksort(filter(gteq(head($list), __), tail($list))),
            [head($list)],
            $quicksort(filter(lt(head($list), __), tail($list)))
        );
};

assert(
    isequal(
        $quicksort([5,2,4,1,6,5]),
        [1,2,4,5,5,6]
    )
);

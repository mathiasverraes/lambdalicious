<?php

require_once __DIR__ . '/../src/Verraes/Lambdalicious/preload.php';

$decrement = partial(reverseargs(subtract), 1); // smarter partial would be better
$fibonacci = function($n) use (&$fibonacci, $decrement) {
    return cond(
        pair(lt($n, 2), $n),
        pair(
            elsedo,
            function() use ($n, &$fibonacci, $decrement) {
                return add($fibonacci($decrement($n)), $fibonacci($decrement($decrement($n))));
            }
        )
    );
};

assert(
    $fibonacci(12) == 144,
    "It's is strictly forbidden to do functional programming without calculating fibonacci numbers"
);
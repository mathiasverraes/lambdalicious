<?php

require_once __DIR__ . '/../src/Verraes/Lambdalicious/preload.php';


$fib = function($n) use(&$fib) {
    return lt($n, 2) ? $n : add($fib($n-1), $fib($n-2));
};

// It's is strictly forbidden to do functional programming without calculating Fibonacci numbers
assert(
    $fib(12) == 144
);

$fastfib = memoize(function($n) use(&$fastfib) {
    return lt($n, 2) ? $n : add($fastfib($n-1), $fastfib($n-2));
});
assert(
    $fastfib(12) == 144
);
// Memoization can help with expensive recursive operations
// echo profile($fastfib, 100) . PHP_EOL;
// echo profile($fib, 100) . PHP_EOL;


// If we want to use cond, we need to wrap add(fib(n-1), fib(n-2)) in a closure. That makes the whole thing rather ugly.
// I'm using $decrement here for fun
$decrement = partial(subtract, __, 1);
$fib2 = memoize(function($n) use (&$fib2, $decrement) {
    return cond(
        pair(lt($n, 2), $n),
        pair(
            elsedo,
            function() use ($n, &$fib2, $decrement) {
                return add($fib2($decrement($n)), $fib2($decrement($decrement($n))));
            }
        )
    );
});
assert(
    $fib2(12) == 144
);
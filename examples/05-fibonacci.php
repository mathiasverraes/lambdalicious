<?php

require_once __DIR__ . '/../src/Verraes/Lambdalicious/load.php';


// It's is strictly forbidden to do functional programming without calculating Fibonacci numbers
$fib = function($n) use(&$fib) {
    return lt($n, 2) ? $n : add($fib($n-1), $fib($n-2));
};
assert(isequal(
    $fib(12), 144
));

// Memoization can help with expensive recursive operations
$fastfib = memoize(function($n) use(&$fastfib) {
    return lt($n, 2) ? $n : add($fastfib($n-1), $fastfib($n-2));
});
assert(isequal(
    $fastfib(12), 144
));

// You may need to increase "xdebug.max_nesting_level" in the php.ini for these.
// On my machine, for $n=28, $fastfib is more than 8600 times faster.
/*
 * $n = 28;
 * echo "fastfib($n) duration: " . profile($fastfib, $n) . PHP_EOL;
 * echo "fib($n) duration: " . profile($fib, $n) . PHP_EOL; // 3.4487s
 *  0.0004s on my machine
 */

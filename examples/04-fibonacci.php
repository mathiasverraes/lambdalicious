<?php

require_once __DIR__ . '/../src/Verraes/Lambdalicious/preload.php';


// It's is strictly forbidden to do functional programming without calculating Fibonacci numbers
$fib = function($n) use(&$fib) {
    return lt($n, 2) ? $n : add($fib($n-1), $fib($n-2));
};
assert(
    $fib(12) == 144
);

// Memoization can help with expensive recursive operations
$fastfib = memoize(function($n) use(&$fastfib) {
    return lt($n, 2) ? $n : add($fastfib($n-1), $fastfib($n-2));
});
assert(
    $fastfib(12) == 144
);
// You may need to increase "xdebug.max_nesting_level" in the php.ini for these:
// $n = 28;
// echo "fastfib($n) duration: " . profile($fastfib, $n) . PHP_EOL; // 0.0004s on my machine
// echo "fib($n) duration: " . profile($fib, $n) . PHP_EOL; // 3.4487s


// If we want to use cond, we need to wrap add(fib(n-1), fib(n-2)) in a closure. That makes the whole thing rather ugly,
// so in practice, ifs or ternaries are still recommend. If the second expression in a pair is a nullary function, it
// will be evaluated lazily by cond.
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
<?php

require_once __DIR__ . '/../src/Verraes/Lambdalicious/preload.php';

// How much money are we waiting for?

$accounts = [
    pair('Jim', 100),
    pair('Jenny', 30),
    pair('Jack', -50),
    pair('Jules', -43),
];

$negate = function($n) { return -$n; };
$getAmount = partial(method, 'last', [], __);
$isNegative = partial(lt, __, 0);

$totalOutstanding = pipe(
    partial(map, $getAmount),
    partial(filter, $isNegative),
    partial(map, $negate),
    partial(reduce, add, __, 0)
);

assert( $totalOutstanding($accounts) == 93 );


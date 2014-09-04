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
$getAmount = second; // returns the last item in a Pair
$isNegative = partial(lt, __, 0);

$totalOutstanding = pipe(
    partial(map, $getAmount, __),
    partial(filter, $isNegative, __),
    partial(map, $negate, __),
    partial(reduce, add, __, 0)
);

assert( $totalOutstanding($accounts) == 93 );

// @TODO Automatic partials perhaps?
/*
 $totalOutstanding = pipe(
    map(last, __),
    filter(lt(__, 0), __),
    map($negate, __),
    reduce(add, __, 0)
);
 */
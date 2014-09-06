<?php

require_once __DIR__ . '/../src/Verraes/Lambdalicious/preload.php';

$sumOfHalves = pipe(
    map(divide(__, 2), __),
    reduce(add, __, 0)
);
assert(isequal(
    $sumOfHalves([2, 4, 6]), 6
));

// How much money is still unpaid?
$accounts = [
    pair('Jim', 100),
    pair('Jenny', 30),
    pair('Jack', -50),
    pair('Jill', -43),
];

$getAmount = second; // returns the last item in a Pair
$isNegative = lt(__, 0);
$totalOutstanding = pipe(
    map($getAmount, __),
    filter($isNegative, __),
    map(negate, __),
    reduce(add, __, 0)
);
assert(isequal(
    $totalOutstanding($accounts), 93
));

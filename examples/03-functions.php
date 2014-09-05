<?php

require_once __DIR__.'/../src/Verraes/Lambdalicious/preload.php';

// $second returns the second element of a list. We made it by composing cdr and car
$second = compose(car, cdr);
assert(
    $second([a, b, c])
);

// isempty is a predicate (a function that returns a boolean)
// not(isempty) returns a function. You could write it as $not = function($x) { return !isempty($x); } but not(isempty)
// is more readable. Now let's take a list and return a list without the empty elements.
$listOfLists = [[a, b], [], [c, d], []];
assert(
    filter(not(isempty), $listOfLists) === [[a, b], [c, d]]
);

// partial fixes a number of arguments of a function. eg add(x, y) takes two arguments, partial(add, 1, __) creates a
// function add1(x) with the y already filled in as 1.
$add1 = partial(add, 1, __);
assert(
    $add1(2) === 3
    && $add1(5) === 6
);

$half = partial(divide, __, 2);
// The short notation works for all functions that are annotated with @partial:
$halfAgain = divide(__, 2);
assert(
    $half(10) == 5
    && $halfAgain(10) == 5
);

// Remember our filter? If we wanted to make it reusable, we could do this:
// $removeEmptyLists = function($list) { return filter(not(isempty), $list)); }
// We can use partials now!

$notMEpty = not(isempty);
filter(__, __);
$removeEmptyLists = filter(not(isempty), __);
assert(
    $removeEmptyLists($listOfLists)  === [[a, b], [c, d]]
);

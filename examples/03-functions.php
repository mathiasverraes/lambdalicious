<?php

require_once __DIR__.'/../src/Verraes/Lambdalicious/preload.php';

// second returns the second element of a list. We made it by composing cdr and car
$second = compose(car, cdr);
assert(
    $second([a, b, c])
);

// Filter a list using a predicate (a function that returns a boolean)
$listOfLists = [[a, b], [], [c, d], []];
assert(
    filter(not(isempty), $listOfLists) === [[a, b], [c, d]]
);

// partial fixes a number of arguments of a function. eg add(x, y) takes two arguments, partial(add, 1) creates a function add1(y)
$add1 = partial(add, 1);
assert(
    $add1(2) === 3
);

// Another example of partial function application
$removeEmptyLists = partial(filter, not(isempty));
assert(
    $removeEmptyLists($listOfLists)  === [[a, b], [c, d]]
);

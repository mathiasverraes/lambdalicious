<?php

require_once __DIR__.'/../src/Verraes/Lambdalicious/load.php';

// $third returns the third element of a list. We made it by composing tail and head
$third = compose(head, tail, tail);

assert(isequal(
    $third([a, b, c, d, e]),
    c
));

// _isempty is a predicate (a function that returns a boolean)
// not(_isempty) returns a function. You could write it as $not = function($x) { return !_isempty($x); } but not(_isempty)
// is more readable. Now let's take a list and return a list without the empty elements.
$listOfLists = [[a, b], [], [c, d], []];
assert(isequal(
    filter(not(_isempty), $listOfLists),
    [[a, b], [c, d]]
));

// partial fixes a number of arguments of a function. eg add(x, y) takes two arguments, partial(add, 1, __) creates a
// function add1(x) with the y already filled in as 1.
$add1 = partial(add, 1, __);
assert(isequal(
    $add1(5), 6
));

// The short notation works for all functions that are annotated with @partial:
$half = divide(__, 2);
assert(isequal(
    $half(10), 5
));

// Remember our filter? If we wanted to make it reusable, we could do this:
// $removeEmptyLists = function($list) { return filter(not(_isempty), $list)); }
// We can make it shorter using partials now:
$removeEmptyLists = filter(not(_isempty), __);
assert(isequal(
    $removeEmptyLists($listOfLists),
    [[a, b], [c, d]]
));

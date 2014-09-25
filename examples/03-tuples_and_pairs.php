<?php

require_once __DIR__.'/../src/Verraes/Lambdalicious/preload.php';

// A tuple is a way of storing multiple values in a single value.
assert(
    istuple(tuple(a, b, c))
);

// A pair has two elements
assert(
    ispair(pair(a, b))
);

// A par is in fact nothing but a tuple that happens to have two elements
assert(
    ispair(tuple(a, b))
);

// Tuple elements can be accessed by index
assert(isequal(
    get(2, tuple(a, b, c)),
    b
));

// Pairs have special first and second functions
assert(isequal(
    first(pair(a, b)),
    a
));
assert(isequal(
    second(pair(a, b)),
    b
));
<?php

require_once __DIR__.'/../src/Verraes/Lambdalicious/preload.php';

// A tuple is a way of storing multiple values in a single value.
assert(
    istuple(tuple(a, b, c))
);

// A pair is a special tuple of two elements
assert(
    ispair(pair(a, b))
    && ispair(tuple(a, b))
);

// Tuple elements can be accessed by index
assert(
    b === get(2, tuple(a, b, c))
);

// Pairs have special first and second functions
assert(
    a === first(pair(a, b))
    && b === second(pair(a, b))
);
<?php

require_once __DIR__.'/../src/Verraes/Lambdalicious/load.php';

// A pair has two elements
assert(isequal(
        pair(a, b),
        pair(a, b)
));

// Pairs can be deconstructed using head and tail
assert(isequal(
    head(pair(a, b)),
    a
));
assert(isequal(
    tail(pair(a, b)),
    b
));
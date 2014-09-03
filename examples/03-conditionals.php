<?php

require_once __DIR__ . '/../src/Verraes/Lambdalicious/preload.php';

// A cond expression evaluates to the second item of the first pair that returns true, in this case b
assert(
    b === cond(
        pair(1 + 1 == 3, a),
        pair(1 + 1 == 2, b),
        pair(elsedo, c)
    )
);

// The last element should always be an elsedo
assert(
    c === cond(
        pair(1 + 1 == 3, a),
        pair(1 + 1 == 4, b),
        pair(elsedo, c)
    )
);

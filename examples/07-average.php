<?php
require_once __DIR__ . '/../src/Verraes/Lambdalicious/load.php';


$addScore = function ($carry, $score) {
    return [
        add($score, head($carry)),
        add(1, head(tail($carry)))
    ];
};


/**
 * @var callable $average
 */
$average = pipe(
    reduce($addScore, __, [0, 0]),
    call(divide, __)
);

assert(isequal(
    $average(l(5, 7, 12)),
    8
));

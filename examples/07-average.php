<?php
require_once __DIR__ . '/../src/Verraes/Lambdalicious/load.php';


$addScore = function ($carry, $score) {
    return [
        add($score, $carry[0]),
        add(1, $carry[1])
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
    $average([5, 7, 12]),
    8
));
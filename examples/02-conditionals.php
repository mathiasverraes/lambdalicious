<?php
require_once __DIR__.'/../src/Verraes/Lambdalicious/preload.php';

// Let's play a game where you grab a ball from a bag, and win if it's green.
// First we need some atoms
atom(@green, @orange, @red, @blue, @win, @lose, @error, @retry);

// We define functions that determine the color of a ball
$green = isequal(green, __); $orange = isequal(orange, __); $red = isequal(red, __);

// Our game uses the conditional to make the decisions. The format of a conditional is:
//
// (expression_1 ? result_1 :
// (expression_2 ? result_2 :
// ...
// (expression_n ? result_n :
// default)));
//
// You can chain as many expression/result pairs as you like. The first expression to be true will stop the chain and
// return the matching result. A conditional always ends with a default result.
$game = function($ball) use($green, $orange, $red) {
    return
        ($green($ball) ? win :
        ($red($ball) ? lose :
        ($orange($ball) ? retry :
        error))); // there is an unknown color in the bag!
};

assert(isequal(
    $game(red), lose
));
assert(isequal(
    $game(@blue), error
));
assert(isequal(
    $game(green), win
));
assert(isequal(
    $game(orange), retry
));

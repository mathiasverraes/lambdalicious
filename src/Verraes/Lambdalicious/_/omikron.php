<?php

function toBeEqualTo($expected) {
    return function($actual) use($expected) {
        return isequal($actual, $expected)
            ? true
            : "Expected values to be equal, instead got:".diff(show($actual), show($expected))
        ;
    };
}


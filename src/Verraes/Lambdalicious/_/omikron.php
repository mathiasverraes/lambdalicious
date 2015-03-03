<?php

atom(@a);
atom(@b);
atom(@c);
atom(@d);
atom(@e);
atom(@f);
atom(@g);

function toBeEqualTo($expected) {
    return function($actual) use($expected) {
        return isequal($actual, $expected)
            ? true
            : "Expected values to be equal, instead got:".diff(show($actual), show($expected))
        ;
    };
}


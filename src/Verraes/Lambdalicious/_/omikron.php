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
            : "Expected values to be equal, instead got:".diff(pretty($actual), pretty($expected))
        ;
    };
}

function assertCallback($file, $line, $code) {
    throw new _λlicious_failed('Assertion failed in ' . $file . ', line ' . $line);
}

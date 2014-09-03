<?php

require_once __DIR__.'/../src/Verraes/Lambdalicious/preload.php';

assert(
    isatom(atom),
    "atom is an atom"
);

assert(
    isatom(1),
    "All scalars are atoms"
);

atom('custom_atom');
assert(
    isatom(custom_atom),
    "You can define your own atoms, or use const, or just use plain strings"
);

assert(
    !isatom([a, b, c]),
    "Lists of atoms are not atoms"
);

assert(
    cons(a, []) === [a],
    "The cons of an element and an empty list is a list with that element"
);

assert(
    [a, b, c, d] === cons(a, cons(b, cons(c, cons(d, [])))),
    "Square brackets are an easier way to make lists"
);

assert(
    car([a, b, c]) === a,
    "car takes the first element of a list"
);

assert(
    cdr([a, b, c]) === [b, c],
    "cdr returns a list of all but the first element of a list"
);

$second = compose(car, cdr);
assert(
    $second([a, b, c]),
    "second returns the second element of a list. We made it by composing cdr and car"
);

$add1 = partial(add, 1);
assert(
    $add1(2) === 3,
    "partial fixes a number of arguments of a function. eg add(x, y) takes two arguments, partial(add, 1) creates a function add1(y)"
);
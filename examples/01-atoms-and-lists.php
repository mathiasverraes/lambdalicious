<?php

require_once __DIR__.'/../src/Verraes/Lambdalicious/preload.php';

// atom is an atom
assert(
    isatom(atom)
);

// All scalars are atoms
assert(
    isatom(1)
);

// You can define your own atoms, or use const, or just use plain strings
atom('custom_atom');
assert(
    isatom(custom_atom)
);

// Lists of atoms are not atoms
assert(
    !isatom([a, b, c])
);

// The cons of an element and an empty list is a list with that element
assert(
    cons(a, []) === [a]
);

// Square brackets are an easier way to make lists
assert(
    [a, b, c, d]
    === cons(a, cons(b, cons(c, cons(d, []))))
);

// car takes the first element of a list
assert(
    car([a, b, c]) === a
);

// cdr returns a list of all but the first element of a list
assert(
    cdr([a, b, c]) === [b, c]
);

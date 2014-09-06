<?php

require_once __DIR__.'/../src/Verraes/Lambdalicious/preload.php';

// An atom is like a constant that has itself as a value. Atoms start with @.
assert(
    isatom(@my_atom)
);
assert(isequal(
    @my_atom, 'my_atom'
));

// You can fix an atom using atom(@name). After that, you don't have to prefix them with @ anymore. Fixed atoms are forever.
atom(@my_atom);
assert(
    isatom(my_atom)
);

// Lists of atoms are not atoms
assert(
    !isatom([a, b, c])
);

// The cons of an element and an empty list is a list with that element
assert(isequal(
    cons(a, []),
    [a]
));

// Square brackets are an easier way to make lists
assert(isequal(
    [a, b, c, d],
    cons(a, cons(b, cons(c, cons(d, []))))
));

// car takes the first element of a list
assert(isequal(
    car([a, b, c]),
    a
));

// cdr returns a list of all but the first element of a list
assert(isequal(
    cdr([a, b, c]),
    [b, c]
));

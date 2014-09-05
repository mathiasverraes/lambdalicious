<?php

require_once __DIR__.'/../src/Verraes/Lambdalicious/preload.php';

// An atom is like a constant that has itself as a value. Define them using atom().
atom('my_atom');
assert(
    isatom(my_atom)
);
assert(isequal(
    my_atom, 'my_atom'
));

// Atoms defined with atom() are forever. You can also define a temporary atom using @. It will be discarded right
// after it was used.
assert(isequal(
    @my_temporary_atom, 'my_temporary_atom'
));

// All scalars are atoms
assert(
    isatom(1)
);

// Lists are not atoms
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

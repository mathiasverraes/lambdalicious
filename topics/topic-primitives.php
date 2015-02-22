<?php return

within("primitives",

    describe("atom",
        it("defines multiple atoms", function() {
            atom(@a, @b, @c, @d, @e, @f);
            return 'f' === f;
        }),

        it("is idempotent", function() {
            atom(@__my_test_atom__);
            atom(@__my_test_atom__);

            return '__my_test_atom__' ===__my_test_atom__;
        })
    ),

    describe("isatom",

        it("knows what an atom is", function () {
            return
                isatom(a)
                && isatom(b)
                && isatom(1)
                && isatom(atom);

        }),

        it("recognizes that some things are not atoms", function () {
            return
                !isatom([])
                && !isatom(cons(a, l(b, c)));
        })
    ),

    describe("isequal",
        it("returns true when equal", function(){
            return isequal(a, a);
        }),
        it("returns false when not equal", function(){
            return !isequal(a, b);
        }),
        it("fails on purpose to test travis", function() { return false;})
    )



);
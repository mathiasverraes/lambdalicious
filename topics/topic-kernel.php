<?php return

within('partials',

    describe('raise',
        it('throws a λlicious exception', function() { return
            expectToThrow(
                function() { raise(@error); },
                _λlicious_failed::class
            );
        })
    ),

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

    describe('private function hasplaceholders',
        it('returns true when placeholders are found in a list', function() { return
            expect(hasplaceholders([a, __, c]), toBeTrue());
        }),

        it('returns false when no placeholders are found in a list', function() { return
            expect(hasplaceholders([a, b, c]), toBeFalse());
        })
    )
);

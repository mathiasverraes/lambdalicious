<?php return

within('lists',
    describe('empty list',
        it('equals itself', function() { return
            expect(l(), toBe(l()));
        })
    ),

    describe('isempty',
        it('returns true for empty lists', function() { return
            expect(isempty(l()), toBeTrue());
        }),
        it('returns false for non-empty lists', function() { return
            expect(isempty(l(@a, @b, @c)), toBeFalse());
        })
    ),

    describe('cons',
        it('builds lists', function() { return
            expect(
                cons(@a, l(@b, @c)),
                toBeEqualTo(l(@a, @b, @c))
            );
        })
    ),

    describe('head',
        it('returns the first S-expression', function() { return
            expect(head(l(@a, @b, @c)), toBe(@a));
        })
    ),

    describe('tail',
        it('returns the list without its first element', function() { return
            expect(
                tail(l(@a, @b, @c)),
                toBeEqualTo(l(@b, @c))
            );
        }),
        it('returns an empty list for a list with one element', function() { return
            expect(
                tail(l(@a)),
                toBeEqualTo(l())
            );
        })
    ),

    describe('length',
        it('returns 0 for an empty list', function() { return
            expect(length(l()), toBe(0));
        }),
        it('returns returns the number of list elements for non-empty lists', function() { return
            expect(length(l(@a, @b, @c, @d)), toBe(4));
        })
    ),

    describe('concat',
        it('returns an emtpy list, without arguments', function() { return
            expect(
                concat(),
                toBeEqualTo(l())
            );
        }),
        it('returns the list, when given a single list', function() { return
            expect(
                concat(l(@a, @b, @c)),
                toBeEqualTo(l(@a, @b, @c))
            );
        }),
        it('returns a list, when given 2 lists', function() { return
            expect(
                concat(l(@a, @b, @c), l(@d, @e, @f, @g)),
                toBeEqualTo(l(@a, @b, @c, @d, @e, @f, @g))
            );
        }),
        it('returns a list, when given multiple lists', function() { return
            expect(
                concat(l(@a, @b), l(@c, @d), l(@e, @f)),
                toBeEqualTo(l(@a, @b, @c, @d, @e, @f))
            );
        })
    )
);

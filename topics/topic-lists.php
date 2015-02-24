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
                isequal(
                    cons(@a, l(@b, @c)),
                    l(@a, @b, @c)
                ),
                toBeTrue()
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
                isequal(
                    tail(l(@a, @b, @c)),
                    l(@b, @c)
                ),
                toBeTrue()
            );
        }),
        it('returns an empty list for a list with one element', function() { return
            expect(
                isequal(
                    tail(l(@a)),
                    l()
                ),
                toBeTrue()
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
                isequal(
                    concat(),
                    l()
                ),
                toBeTrue()
            );
        }),
        it('returns the list, when given a single list', function() { return
            expect(
                isequal(
                    concat(l(@a, @b, @c)),
                    l(@a, @b, @c)
                ),
                toBeTrue()
            );
        }),
        it('returns a list, when given 2 lists', function() { return
            expect(
                isequal(
                    concat(l(@a, @b, @c), l(@d, @e, @f, @g)),
                    l(@a, @b, @c, @d, @e, @f, @g)
                ),
                toBeTrue()
            );
        }),
        it('returns a list, when given multiple lists', function() { return
            expect(
                isequal(
                    concat(l(@a, @b), l(@c, @d), l(@e, @f)),
                    l(@a, @b, @c, @d, @e, @f)
                ),
                toBeTrue()
            );
        })
    )
);

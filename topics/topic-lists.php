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
            expect(isempty(l(a, b, c)), toBeFalse());
        })
    ),

    describe('cons',
        it('builds lists', function() { return
            expect(
                cons(a, l(b, c)),
                toBeEqualTo(l(a, b, c))
            );
        })
    ),

    describe('head',
        it('returns the first S-expression', function() { return
            expect(head(l(a, b, c)), toBe(a));
        })
    ),

    describe('tail',
        it('returns the list without its first element', function() { return
            expect(
                tail(l(a, b, c)),
                toBeEqualTo(l(b, c))
            );
        }),
        it('returns an empty list for a list with one element', function() { return
            expect(
                tail(l(a)),
                toBeEqualTo(l())
            );
        })
    ),

    describe('length',
        it('returns 0 for an empty list', function() { return
            expect(length(l()), toBe(0));
        }),
        it('returns returns the number of list elements for non-empty lists', function() { return
            expect(length(l(a, b, c, d)), toBe(4));
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
                concat(l(a, b, c)),
                toBeEqualTo(l(a, b, c))
            );
        }),
        it('returns a list, when given 2 lists', function() { return
            expect(
                concat(l(a, b, c), l(d, e, f, g)),
                toBeEqualTo(l(a, b, c, d, e, f, g))
            );
        }),
        it('returns a list, when given multiple lists', function() { return
            expect(
                concat(l(a, b), l(c, d), l(e, f)),
                toBeEqualTo(l(a, b, c, d, e, f))
            );
        })
    ),

    describe('contains1',
        it('returns true, when given a list with one element', function() { return
            expect(contains1(l(a)), toBeTrue());
        }),
        it('returns false, when given a list with more than two elements', function() { return
            expect(contains1(l(a, b, c)), toBeFalse());
        }),
        it('returns false, when given an empty list', function() { return
            expect(contains1(l()), toBeFalse());
        })
    ),

    describe('reverse',
        it('reverses an empty list', function() { return
            expect(reverse(l()), toBeEqualTo(l()));
        }),
        it('reverses a list with one element', function() { return
            expect(reverse(l(a)), toBeEqualTo(l(a)));
        }),
        it('reverses a list with more than one element', function() { return
            expect(reverse(l(a, b, c, d)), toBeEqualTo(l(d, c, b, a)));
        })
    ),

    describe('max_by',
        it('uses a callback to determine the max element of a list', function() { return
            expect(
                max_by(@strlen, l('lambda', 'calculus', 'rocks')),
                toBe('calculus')
            );
        }),
        it('supports partial application', function() {
            $longestString = max_by(@strlen, __);

            return expect(
                $longestString(l('lambda', 'calculus', 'rocks')),
                toBe('calculus')
            );
        })
    ),

    describe('min_by',
        it('uses a callback to determine the min element of a list', function() { return
            expect(
                min_by(@strlen, l('lambda', 'calculus', 'rocks')),
                toBe('rocks')
            );
        }),
        it('supports partial application', function() {
            $shortestString = min_by(@strlen, __);

            return expect(
                $shortestString(l('lambda', 'calculus', 'rocks')),
                toBe('rocks')
            );
        })
    ),

    describe('zip',
        it('creates a list of pairs from a pair of lists', function() {
            $list1 = l(@keep, @lambda);
            $list2 = l(@calm, @on, @that, @whisky, @bottle);

            return expect(
                zip($list1, $list2),
                toBeEqualTo(l(pair(@keep, @calm), pair(@lambda, @on)))
            );
        })
    ),

    describe('zipWith',
        it('creates a list by calling a callback with parameters from two lists', function() {
            $list1 = l(1, 2, 3, 4);
            $list2 = l(4, 3, 2);

            return expect(
                zipWith(add, $list1, $list2),
                toBeEqualTo(l(5, 5, 5))
            );
        })
    ),

    describe('map',
        it('returns an empty list when given an empty list', function() { return
            expect(
                map(add(1, __), l()),
                toBeEqualTo(l())
            );
        }),
        it('applies a function to every element of a list', function() { return
            expect(
                map(add(1, __), l(1, 2, 3, 4)),
                toBeEqualTo(l(2, 3, 4, 5))
            );
        })
    ),

    describe('filter',
        it('returns an empty list when given an empty list', function() { return
            expect(
                filter(isequal(2, __), l()),
                toBeEqualTo(l())
            );
        }),
        it('filters a list using a predicate', function() { return
            expect(
                filter(isequal(2, __), l(1, 2, 3, 2, 1, 2, 3)),
                toBeEqualTo(l(2, 2, 2))
            );
        })
    ),

    describe('pick',
        it('returns the first element of a list, for index 0', function() { return
            expect(
                pick(l(a, b, c, d), 0),
                toBe(a)
            );
        }),
        it('returns the n+1th element of a list, for index n', function() { return
            expect(
                pick(l(a, b, c, d), 2),
                toBe(c)
            );
        }),
        it('throws an exception when index is not found', function() {
            try {
                pick(l(a, b, c, d), 5);
            } catch (Exception $e) {
                return true;
            }

            return false;
        })
    )
);

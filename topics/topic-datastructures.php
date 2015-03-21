<?php return

within('datastructures',
    describe('pair',
        it('can be compared for equality', function() { return
            expect(pair(a, b), toBeEqualTo(pair(a, b)));
        }),

        it('can be deconstructed using head', function() { return
            expect(head(pair(a, b)), toBe(a));
        }),

        it('can be deconstructed using tail', function() { return
            expect(tail(pair(a, b)), toBe(b));
        })
    ),

    describe('ispair',
        it('recognises a pair', function() { return
            expect(ispair(pair(a, b)), toBeTrue());
        }),

        it('does not accuse atoms of being a pair', function() { return
            expect(ispair(a), toBeFalse());
        })
    ),

    describe('list',
        it('starts with a list constructor', function() { return
            expect(l(), toBe(nil));
        }),

        it('has its element as head of the outer pair, as a singleton', function() { return
            expect(head(l(a)), toBe(a));
        }),

        it('has the list constructor as tail of the outer pair, as a singleton', function() { return
            expect(tail(l(a)), toBe(nil));
        }),

        it('has the second element as head of the first inner pair', function() { return
            expect(head(tail(l(a, b))), toBe(b));
        }),

        it('has the list constructor as tail of the innermost pair', function() { return
            expect(tail(tail(l(a, b))), toBe(nil));
        })
    ),

    describe('islist',
        it('recognises empty lists as lists', function() { return
            expect(islist(l()), toBeTrue());
        }),

        it('recognises non-empty lists as lists', function() { return
            expect(islist(l(a, b, c)), toBeTrue());
        }),

        it('does not accuse atoms of being a list', function() { return
            expect(islist(a), toBeFalse());
        }),

        it('does not recognise arrays as lists', function() { return
            expect(islist([a, b]), toBeFalse());
        })
    ),

    describe('al',
        it('returns an empty list when given an empty array', function() { return
            expect(al([]), toBeEqualTo(l()));
        }),

        it('returns a list, created from an array', function() { return
            expect(al([a, b, c]), toBeEqualTo(l(a, b, c)));
        })
    ),

    describe('la',
        it('returns an empty array when given an empty list', function() { return
            expect(la(l()), toBeEqualTo([]));
        }),

        it('returns an array, created from a list', function() { return
            expect(la(l(a, b, c)), toBeEqualTo([a, b, c]));
        })
    )
);

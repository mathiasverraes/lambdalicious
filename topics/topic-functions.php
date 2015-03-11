<?php return

within('functions',
    describe('reverseargs',
        it('takes a function and returns that function with reversed args', function() {
            $subtractRev = reverseargs(subtract);

            return expect($subtractRev(1, 5), toBe(4));
        })
    ),

    describe('isfunction',
        it('recognises a closure as a function', function() { return
            expect(isfunction(function() {}), toBeTrue());
        }),

        it('recognises a method as a function', function() { return
            expect(isfunction(['Closure', 'bind']), toBeTrue());
        }),

        it('recognises a string representation as a function', function() { return
            expect(isfunction('strlen'), toBeTrue());
        }),

        it('rejects an atom as a function', function() { return
            expect(isfunction(42), toBeFalse());
        })
    ),

    describe('evaluate',
        it('returns a value when given a value', function() { return
            expect(evaluate(42), toBe(42));
        }),

        it('returns a value when given a function', function() { return
            expect(evaluate(function() { return 42; }), toBe(42));
        })
    )
);

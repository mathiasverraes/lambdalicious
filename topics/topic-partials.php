<?php return

within('partials',
    describe('partial',
        it('returns the same function, when not binding arguments', function() {
            $newAdd = partial(add);

            return expect($newAdd(1, 5), toBe(6));
        }),

        it('returns a function taking remaining arguments, when binding some arguments', function() {
            $addOne = partial(add, 1);

            return expect($addOne(5), toBe(6));
        }),

        it('returns a nullary function, when binding all arguments', function() {
            $addOneAndFive = partial(add, 1, 5);

            return expect($addOneAndFive(), toBe(6));
        }),

        it('accepts placeholders as first bound argument', function() {
            $subtractSixFrom = partial(subtract, __, 6);

            return expect($subtractSixFrom(10), toBe(4));
        }),

        it('accepts placeholders as second bound argument', function() {
            $subtractFromSix = partial(subtract, 6, __);

            return expect($subtractFromSix(10), toBe(-4));
        }),

        it('accepts multiple placeholders as bound arguments', function() {
            atom(@substr);
            $firstNChars = partial(substr, __, 0, __);

            return expect($firstNChars('abcde', 2), toBe('ab'));
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

<?php return

within('higher order',
    describe('compose',
        it('yields identity when composing nothing', function() {
            $identity = compose();

            return expect($identity(5), toBe(5));
        }),

        it('composes a single function', function() {
            $double = partial(multiply, 2);
            $composed = compose($double);

            return expect($composed(5), toBe(10));
        }),

        it('composes two functions', function() {
            $add1 = partial(add, 1);
            $double = partial(multiply, 2);
            $doubleThenAdd1 = compose($add1, $double);

            return expect($doubleThenAdd1(5), toBe(11));
        })
    ),

    describe('memoize',
        it('does not recalculate for known arguments', function() {
            $counter = new _TestCounter;
            $f = memoize(function($x, $y) use($counter) { $counter->count++; });

            $f(a, b);
            $f(c, d);
            $f(a, b);

            return expect($counter->count, toBe(2));
        })
    ),

    describe('recurse',
        it('makes closure recursion possible, without use statements (1)', function() {
            $quicksort = recurse(function($quicksort, $list) {
                return
                    isempty($list) ? l() :
                    concat(
                        $quicksort($quicksort, filter(gteq(head($list), __), tail($list))),
                        l(head($list)),
                        $quicksort($quicksort, filter(lt(head($list), __), tail($list)))
                    );
            });

            return expect($quicksort(l(5, 2, 4, 1, 6, 5)),
                   toBeEqualTo(l(1, 2, 4, 5, 5, 6)));
        }),

        it('makes closure recursion possible, without use statements (2)', function() {
            $fib = recurse(function($fib, $n) {
                return $n > 1
                    ? $fib($fib, $n - 1) + $fib($fib, $n - 2)
                    : $n;
            });

            return expect($fib(7), toBe(13));
        })
    )
);

final class _TestCounter
{
    public $count;
}

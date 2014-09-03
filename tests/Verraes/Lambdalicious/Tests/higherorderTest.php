<?php

namespace Verraes\Lambdalicious\Tests;

final class higherorderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function composing_nothing_yields_an_identity()
    {
        $identity = compose();
        $this->assertEquals(
            5,
            $identity(5)
        );
    }

    /**
     * @test
     */
    public function composing_a_single_function()
    {
        $double = partial(multiply, 2);
        $composed = compose($double);

        $this->assertEquals(
            10,
            $composed(5)
        );
    }

    /**
     * @test
     */
    public function composing_two_functions()
    {
        $add1 = partial(add, 1);
        $double = partial(multiply, 2);
        $doubleThenAdd1 = compose($add1, $double);

        $this->assertEquals(
            11,
            $doubleThenAdd1(5)
        );
    }

    /**
     * @test
     */
    public function composing_two_functions2()
    {
        $secondElement = compose(car, cdr);
        $this->assertEquals(
            b,
            $secondElement([a, b, c])
        );
    }

    /**
     * @test
     */
    public function partial()
    {
        $add1 = partial(add, 1);
        $this->assertEquals(
            3,
            $add1(2)
        );
    }

    /**
     * @test
     */
    public function memoize()
    {
        $counter = new _TestCounter;
        $f = memoize(function($x, $y) use($counter) { $counter->count++; });
        $g = memoize(function($x, $y) use($counter) { $counter->count++; });

        $f(a, b);
        $f(a, b);
        $this->assertEquals(1, $counter->count);
        $f(c, d);
        $f(c, d);
        $this->assertEquals(2, $counter->count);
        $g(a, b);
        $g(a, b);
        $this->assertEquals(3, $counter->count);
    }
}

final class _TestCounter
{
    public $count;
}
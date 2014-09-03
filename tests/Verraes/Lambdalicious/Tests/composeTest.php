<?php

namespace Verraes\Lambdalicious\Tests\Pure;

final class composeTest extends \PHPUnit_Framework_TestCase
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
    public function composes_functions()
    {
        $add1 = partial(add, 1);
        $double = partial(multiply, 2);
        $add1AndDouble = compose($add1, $double);

        $this->assertEquals(
            12,
            $add1AndDouble(5)
        );
    }
}
 
<?php

namespace Verraes\Lambdalicious\Tests;

final class functionsTest extends LambdaliciousTestCase
{

    /**
     * @test
     */
    public function define_functions()
    {
        atom(@half);
        $half = def(half, function($x) { var_dump($x);return $x / 2;});
        $this->assertEquals(3, $half(6));

        $halves = map(half, __);
        $this->assertEquals([3, 4], $half([6, 8]));

    }

    /**
     * @test
     */
    public function reverseargs()
    {
        $subtractRev = reverseargs(subtract);
        $this->assertEquals(
            4,
            $subtractRev(1, 5)
        );
    }
}
 
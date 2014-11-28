<?php

namespace Verraes\Lambdalicious\Tests;

final class functionsTest extends LambdaliciousTestCase
{
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

    /**
     * @test
     */
    public function isfunction()
    {
        $this->assertTrue(isfunction(function() {}));
        $this->assertTrue(isfunction([$this, 'isfunction']));
        $this->assertTrue(isfunction('strlen'));

        $this->assertFalse(isfunction(42));
    }

    /**
     * @test
     */
    public function evaluate()
    {
        $this->assertEquals(42, evaluate(function() { return 42;}));
        $this->assertEquals(42, evaluate(42));
    }
}
 
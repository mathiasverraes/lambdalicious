<?php

namespace Verraes\Lambdalicious\Tests;

final class pairsTest extends LambdaliciousTestCase
{
    /**
     * @test
     */
    public function a_pair_is_a_pair()
    {
        $this->assertTrue(ispair(pair(a, b)));
    }

    /**
     * @test
     */
    public function anything_else_is_not_a_pair()
    {
        $this->assertFalse(ispair([a, b, c]));
        $this->assertFalse(ispair('hello'));
    }

    /**
     * @test
     */
    public function first_and_second()
    {
        $this->assertEquals(a, first(pair(a, b)));
        $this->assertEquals(b, second(pair(a, b)));
    }
}
 
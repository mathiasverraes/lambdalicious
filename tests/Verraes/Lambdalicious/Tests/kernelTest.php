<?php

namespace Verraes\Lambdalicious\Tests;

final class kernelTest extends LambdaliciousTestCase
{
    /**
     * @test
     */
    public function __hasPlaceholders()
    {
        $this->assertTrue(hasplaceholders([a, __, c]));
        $this->assertFalse(hasplaceholders([a, b, c]));
    }
}

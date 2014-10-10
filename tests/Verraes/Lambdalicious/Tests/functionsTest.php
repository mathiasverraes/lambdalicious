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
}
 
<?php

namespace Verraes\Lambdalicious\Tests\Pure;

final class consTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function cons_prefixes_lists()
    {
        $this->assertEquals(
            [a, b, c],
            cons(a, [b, c])
        );
    }
}
 
<?php

namespace Verraes\Lambdalicious\Tests\Pure;

final class partialTest extends \PHPUnit_Framework_TestCase
{
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
}
 
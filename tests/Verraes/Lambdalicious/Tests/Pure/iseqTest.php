<?php


namespace Verraes\Lambdalicious\Tests\Pure;

use IsEqIsDefinedForNonListsOnly;

final class iseqTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function does()
    {
        $this->setExpectedException(IsEqIsDefinedForNonListsOnly::class);
        iseq([a, b], c);
    }

    /**
     * @test
     */
    public function true_when_equal()
    {
        $this->assertTrue(iseq(a, a));
    }

    /**
     * @test
     */
    public function false_when_not_equal()
    {
        $this->assertFalse(iseq(a, b));
    }
}
 
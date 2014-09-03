<?php

namespace Verraes\Lambdalicious\Tests;

final class arityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function arity()
    {
        $this->assertEquals(0,  arity(function(){}));
        $this->assertEquals(1,  arity(function($a){}));
        $this->assertEquals(2,  arity(function($a, $b){}));
        $this->assertEquals(3,  arity(function($a, $b, $c){}));
        $this->assertEquals(4,  arity(function($a, $b, $c, $d){}));
    }
}
 
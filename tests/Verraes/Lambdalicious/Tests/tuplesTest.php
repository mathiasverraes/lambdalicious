<?php

namespace Verraes\Lambdalicious\Tests;

final class tuplesTest extends LambdaliciousTestCase
{
    /**
     * @test
     */
    public function a_tuple_is_a_tuple()
    {
        $this->assertTrue(istuple(tuple(a, b, c)));
    }

    /**
     * @test
     */
    public function a_list_is_not_tuple()
    {
        $this->assertFalse(istuple([a, b, c]));
    }

    /**
     * @test
     */
    public function tuple_element_can_be_accessed_by_index()
    {
        $this->assertEquals(a, get(1, tuple(a, b, c)));
        $this->assertEquals(b, get(2, tuple(a, b, c)));
        $this->assertEquals(c, get(3, tuple(a, b, c)));

    }

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
    public function a_tuple_of_two_elements_is_a_pair()
    {
        $this->assertTrue(ispair(tuple(a, b)));
    }

    /**
     * @test
     */
    public function anything_else_is_not_a_pair()
    {
        $this->assertFalse(ispair([a, b, c]));
        $this->assertFalse(ispair(tuple(a, b, c)));
        $this->assertFalse(ispair('hello'));
    }

    /**
     * @test
     */
    public function pairs_have_a_first_and_second()
    {
        $this->assertEquals(a, first(pair(a, b)));
        $this->assertEquals(b, second(pair(a, b)));
    }
}
 
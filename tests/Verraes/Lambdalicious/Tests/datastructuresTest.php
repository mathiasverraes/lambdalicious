<?php

namespace Verraes\Lambdalicious\Tests;

final class datastructuresTest extends LambdaliciousTestCase
{
    /**
     * @test
     */
    public function pairs_equality()
    {
        $this->assertTrue(
            isequal(
                pair(a, b),
                pair(a, b)
            )
        );
    }
    /**
     * @test
     */
    public function ispair()
    {

        $this->assertTrue(
            ispair(pair(a, b))
        );
    }

    /**
     * @test
     */
    public function deconstruct_pairs()
    {
        $this->assertTrue(isequal(
            head(pair(a, b)),
            a
        ));
        $this->assertTrue(isequal(
            tail(pair(a, b)),
            b
        ));
    }

    /**
     * @test
     */
    public function lists_start_with_a_list_constructor()
    {
        $this->assertEquals(
            l(),
            @λ_list
        );
    }

    /**
     * @test
     */
    public function lists_are_nested_pairs()
    {
        $this->assertEquals(
            head(l(a)),
            a
        );
        $this->assertEquals(
            tail(l(a)),
            @λ_list
        );

        $this->assertEquals(
            head(l(a, b)),
            a
        );
        $this->assertEquals(
            head(tail(l(a, b))),
            b
        );
        $this->assertEquals(
            tail(tail(l(a, b))),
            @λ_list
        );
    }

    /**
     * @test
     */
    public function islist()
    {
        $this->assertTrue(
            islist(l())
        );
        $this->assertTrue(
            islist(l(a))
        );
        $this->assertTrue(
            islist(l(a, b, c))
        );
        $this->assertFalse(
            islist(a)
        );
        $this->assertFalse(
            islist([a])
        );
    }

    /**
     * @test
     */
    public function al()
    {
        $this->assertTrue(
            isequal(l(), al([]))
        );
        $this->assertTrue(
            isequal(l(a, b, c), al([a, b, c]))
        );
    }

    /**
     * @test
     */
    public function la()
    {
        $this->assertEquals([], la(l()));
        $this->assertEquals([a], la(l(a)));
        $this->assertEquals([a, b, c], la(l(a, b, c)));
    }
}

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

}
 
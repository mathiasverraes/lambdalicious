<?php

namespace Verraes\Lambdalicious\Tests;

use IsEqIsDefinedForNonListsOnly;

final class primitivesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isatom()
    {
        $this->assertTrue(isatom(a));
        $this->assertTrue(isatom(b));
        $this->assertTrue(isatom(1));
        $this->assertTrue(isatom(atom));
        $this->assertTrue(isatom("All hail the atom"));

        $this->assertFalse(isatom([]));
        $this->assertFalse(isatom(cons(a, [b, c])));
    }

    /**
     * @test
     */
    public function iseq_is_defined_for_non_lists_only()
    {
        $this->setExpectedException(IsEqIsDefinedForNonListsOnly::class);
        isequal([a, b], c);
    }

    /**
     * @test
     */
    public function iseq_returns_true_when_equal()
    {
        $this->assertTrue(isequal(a, a));
    }

    /**
     * @test
     */
    public function iseq_returns_false_when_not_equal()
    {
        $this->assertFalse(isequal(a, b));
    }

}
 
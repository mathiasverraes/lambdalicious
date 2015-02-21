<?php

namespace Verraes\Lambdalicious\Tests;

use AtomIsAlreadyDefinedWithADifferentValue;

final class primitivesTest extends LambdaliciousTestCase
{
    /**
     * @test
     */
    public function isatom()
    {
        $this->markTestSkipped("moved to omikron");
        // These atoms are defined elsewhere
        $this->assertTrue(isatom(a));
        $this->assertTrue(isatom(b));
        $this->assertTrue(isatom(1));
        $this->assertTrue(isatom(atom));
        //$this->assertTrue(isatom("All hail the atom"));

        $this->assertFalse(isatom([]));
        $this->assertFalse(isatom(cons(a, l(b, c))));
    }

    /**
     * @test
     */
    public function defining_atoms_is_idempotent()
    {
        $this->markTestSkipped("moved to omikron");

        atom(@__my_test_atom__);
        atom(@__my_test_atom__);

        $this->assertEquals('__my_test_atom__', __my_test_atom__);
    }

    /**
     * @test
     */
    public function define_multiple_atoms()
    {
        $this->markTestSkipped("moved to omikron");

        atom(@a, @b, @c, @d, @e, @f);
        $this->assertEquals('f', f);
    }

    /**
     * @test
     */
    public function defining_atoms_differently_fails()
    {
        $this->markTestSkipped("Name clashing doesn't work with @atom definitions.");

        define('__my_test_atom__2', 'other value');
        $this->setExpectedException(AtomIsAlreadyDefinedWithADifferentValue::class);
        atom(@__my_test_atom__2);
    }

    /**
     * @test
     */
    public function isequal_returns_true_when_equal()
    {
        $this->markTestSkipped("Name clashing doesn't work with @atom definitions.");
        $this->assertTrue(isequal(a, a));
    }

    /**
     * @test
     */
    public function isequal_returns_false_when_not_equal()
    {
        $this->markTestSkipped("Name clashing doesn't work with @atom definitions.");
        $this->assertFalse(isequal(a, b));
    }

}
 
<?php

namespace Verraes\Lambdalicious\Tests;

use CarIsDefinedOnlyForNonEmptyLists;
use CdrIsDefinedOnlyForNonEmptyLists;
use IsEmptyIsDefinedOnlyForLists;

final class listsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function isempty_is_defined_only_for_lists()
    {
        $this->setExpectedException(IsEmptyIsDefinedOnlyForLists::class);
        isempty(null);
    }

    /**
     * @test
     */
    public function isemtpy_is_true_for_empty_lists()
    {
        $this->assertTrue(isempty([]));
    }

    /**
     * @test
     */
    public function isemtpy_is_false_for_non_empty_lists()
    {
        $this->assertFalse(isempty([a]));
    }

    /**
     * @test
     */
    public function cons_builds_lists()
    {
        $this->assertEquals(
            [a, b, c],
            cons(a, [b, c])
        );
    }

    /**
     * @test
     */
    public function car_is_defined_only_for_non_empty_lists()
    {
        $this->setExpectedException(CarIsDefinedOnlyForNonEmptyLists::class);
        car([]);
    }

    /**
     * @test
     */
    public function car_returns_the_first_S_expression()
    {
        $this->assertEquals(
            a,
            car([a, b, c])
        );
    }

    /**
     * @test
     */
    public function cdr_is_defined_only_for_non_empty_lists()
    {
        $this->setExpectedException(CdrIsDefinedOnlyForNonEmptyLists::class);
        cdr([]);
    }

    /**
     * @test
     */
    public function cdr_returns_the_list_without_the_first_element()
    {
        $this->assertEquals(
            [b, c],
            cdr([a, b, c])
        );
    }

    /**
     * @test
     */
    public function cdr_returns_an_empty_list_for_a_list_with_one_element()
    {
        $this->assertEquals(
            [],
            cdr([a])
        );
    }
}
 
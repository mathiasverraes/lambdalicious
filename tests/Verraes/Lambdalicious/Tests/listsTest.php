<?php

namespace Verraes\Lambdalicious\Tests;

use HeadIsDefinedOnlyForNonEmptyLists;
use TailIsDefinedOnlyForNonEmptyLists;
use IsEmptyIsDefinedOnlyForLists;

final class listsTest extends LambdaliciousTestCase
{
    /**
     * @test
     */
    public function a_list_is_a_list()
    {
        $this->assertTrue(islist([a, b, c]));
    }

    /**
     * @test
     */
    public function an_atom_is_not_a_list()
    {
        $this->assertFalse(islist(a));
    }

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
    public function head_is_defined_only_for_non_empty_lists()
    {
        $this->setExpectedException(HeadIsDefinedOnlyForNonEmptyLists::class);
        head([]);
    }

    /**
     * @test
     */
    public function head_returns_the_first_S_expression()
    {
        $this->assertEquals(
            a,
            head([a, b, c])
        );
    }

    /**
     * @test
     */
    public function tail_is_defined_only_for_non_empty_lists()
    {
        $this->setExpectedException(TailIsDefinedOnlyForNonEmptyLists::class);
        tail([]);
    }

    /**
     * @test
     */
    public function tail_returns_the_list_without_the_first_element()
    {
        $this->assertEquals(
            [b, c],
            tail([a, b, c])
        );
    }

    /**
     * @test
     */
    public function tail_returns_an_empty_list_for_a_list_with_one_element()
    {
        $this->assertEquals(
            [],
            tail([a])
        );
    }

    /**
     * @test
     */
    public function concat_empty()
    {
        $this->assertEquals(
            [],
            concat()
        );
    }

    /**
     * @test
     */
    public function concat_1_element()
    {
        $this->assertEquals(
            [a, b],
            concat([a, b])
        );
    }

    /**
     * @test
     */
    public function concat_multiple()
    {
        $list1 = [a, b];
        $list2 = [c, d];
        $list3 = [e, f];

        $this->assertEquals(
            [a, b, c, d, e, f],
            concat($list1, $list2, $list3)
        );
    }

    /**
     * @test
     */
    public function contains1()
    {
        $this->assertFalse(contains1([]));
        $this->assertTrue(contains1([a]));
        $this->assertFalse(contains1([a, b]));
    }

    /**
     * @test
     */
    public function reverse()
    {
        $this->assertEquals([], reverse([]));
        $this->assertEquals([a], reverse([a]));
        $this->assertEquals(
            [c, b, a],
            reverse([a, b, c])
        );
    }

    /**
     * @test
     */
    public function max_by()
    {
        $list = ['lambda', 'calculus', 'rocks'];
        $this->assertEquals('calculus', max_by(@strlen, $list));

        $longestString = max_by(@strlen, __);
        $this->assertEquals('calculus', $longestString($list));
    }

    /**
     * @test
     */
    public function min_by()
    {
        $list = ['lambda', 'calculus', 'rocks'];

        $this->assertEquals('rocks', min_by(@strlen, $list));

        $shortestString = min_by(@strlen, __);
        $this->assertEquals('rocks', $shortestString($list));
    }
}

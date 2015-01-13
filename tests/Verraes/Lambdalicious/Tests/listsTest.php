<?php

namespace Verraes\Lambdalicious\Tests;

final class listsTest extends LambdaliciousTestCase
{
    /**
     * @test
     */
    public function isemtpy_is_true_for_empty_lists()
    {
        $this->assertTrue(isempty(l()));
    }

    /**
     * @test
     */
    public function isemtpy_is_false_for_non_empty_lists()
    {
        $this->assertFalse(isempty(l(a)));
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
    public function length_returns_0_for_an_empty_list()
    {
        $this->assertEquals(
            0,
            length(l())
        );
    }

    /**
     * @test
     */
    public function length_returns_the_number_of_list_elements_for_non_empty_lists()
    {
        $this->assertEquals(1, length(l(1)));
        $this->assertEquals(2, length(l(@foo, @bar)));
        $this->assertEquals(3, length(l(l(), l(), l())));
        $this->assertEquals(4, length(l(@foo, @bar, @baz, @qux)));
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
        $this->assertFalse(contains1(l()));
        $this->assertTrue(contains1(l(a)));
        $this->assertFalse(contains1(l(a, b)));
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

    /**
     * @test
     */
    public function zip()
    {
        $list1 = [@keep, @lambda];
        $list2 = [@calm, @on, @that, @whisky, @bottle];

        $zipped = zip($list1, $list2);
        $this->assertTrue(isequal(
            head($zipped),
            pair(@keep, @calm)
        ));

        $this->assertTrue(isequal(
            head(tail($zipped)),
            pair(@lambda, @on)
        ));

    }

    /**
     * @test
     */
    public function zipWith()
    {
        $list1 = [1, 2, 3, 4];
        $list2 = [4, 3, 2];

        $this->assertEquals(
            [5, 5, 5],
            zipWith(add, $list1, $list2)
        );
    }
}

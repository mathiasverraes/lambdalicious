<?php

namespace Verraes\Lambdalicious\Tests;

final class partialTest extends LambdaliciousTestCase
{
    /**
     * @test
     */
    public function without_arguments_returns_the_same_function()
    {
        $newAdd = partial(add);
        $this->assertEquals(6, $newAdd(1, 5));
    }

    /**
     * @test
     */
    public function with_one_argument()
    {
        $addOne = partial(add, 1);
        $this->assertEquals(6, $addOne(5));
    }

    /**
     * @test
     */
    public function with_all_arguments_returns_a_nullary_function()
    {
        $addOneAndFive = partial(add, 1, 5);
        $this->assertEquals(6, $addOneAndFive());
    }

    /**
     * @test
     */
    public function with_placeholder_as_first_argument()
    {
        $subtractSixFrom = partial(subtract, __, 6);
        $this->assertEquals(4, $subtractSixFrom(10));
    }


    /**
     * @test
     */
    public function with_placeholder_as_second_argument()
    {
        $subtractFromSix = partial(subtract, 6, __);
        $this->assertEquals(-4, $subtractFromSix(10));
    }


    public function more_placeholders()
    {
        atom('substr');
        $thirdChar = partial(substr, __, 3, 1);
        $this->assertEquals('c', $thirdChar('abcde'));
    }

    /**
     * @test
     */
    public function with_two_placeholders()
    {
        atom('substr');
        $firstNChars = partial(substr, __, 0, __);
        $this->assertEquals('abc', $firstNChars('abcde', 3));
        $this->assertEquals('ab', $firstNChars('abcde', 2));
    }
}
 
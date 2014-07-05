<?php

namespace Verraes\Tests\Lambdalicious;

use InvalidArgumentException;
use PHPUnit_Framework_TestCase;

final class operatorTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @dataProvider provideOperators
     * @param $symbol
     * @param $a
     * @param $b
     * @param $result
     */
    public function it_should_create_operator_functions($symbol, $a, $b, $result)
    {
        $operator = operator($symbol);
        $this->assertSame($result, $operator($a, $b));
    }

    /**
     * @test
     * @dataProvider provideOperators
     * @param $symbol
     * @param $a
     * @param $b
     * @param $expectedResult
     */
    public function it_should_create_partially_applied_operators($symbol, $a, $b, $expectedResult)
    {
        $partialOperator = operator($symbol, $b);
        $this->assertSame($expectedResult, $partialOperator($a));

    }

    /**
     * @test
     * @dataProvider provideOperators
     * @param $symbol
     * @param $a
     * @param $b
     * @param $expectedResult
     */
    public function it_should_resolve_to_value($symbol, $a, $b, $expectedResult)
    {
        $identity = operator($symbol, $a, $b);
        $this->assertSame($expectedResult, $identity);

    }

    public function provideOperators()
    {
        return [
            ['instanceof', new \stdClass, 'stdClass', true],
            ['*', 3, 2, 6],
            ['/', 3, 2, 1.5],
            ['%', 3, 2, 1],
            ['+', 3, 2, 5],
            ['-', 3, 2, 1],
            ['.', 'foo', 'bar', 'foobar'],
            ['<<', 1, 8, 256],
            ['>>', 256, 8, 1],
            ['<', 3, 5, true],
            ['<=', 5, 5, true],
            ['>', 3, 5, false],
            ['>=', 3, 5, false],
            ['==', 0, 'foo', true],
            ['!=', 1, 'foo', true],
            ['===', 0, 'foo', false],
            ['!==', 0, 'foo', true],
            ['&', 3, 1, 1],
            ['|', 3, 1, 3],
            ['^', 3, 1, 2],
            ['&&', true, false, false],
            ['||', true, false, true],
        ];
    }

    /**
     * @test
     */
    public function it_should_throw_for_unknown_operators()
    {
        $this->setExpectedException(InvalidArgumentException::class,'Unknown operator "**"');
        operator('**');
    }


    /**
     * @test
     */
    public function it_should_throw_for_too_many_args()
    {
        $this->setExpectedException(\BadFunctionCallException::class);
        operator('*', 1, 2, 3);
    }
}
 
<?php

namespace Verraes\Lambdalicious\Tests;

use CondExpectsAtLeastOneCondition;
use CondExpectsPairsAsArguments;
use CondExpectsTheFinalExpressionToBeElsedo;

final class operatorsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function cond1()
    {
        $result = cond(
            pair(1 + 1 == 3, a),
            pair(1 + 1 == 4, b),
            pair(elsedo, c)
        );

        $this->assertEquals(c, $result);
    }

    /**
     * @test
     */
    public function cond2()
    {
        $result = cond(
            pair(1 + 1 == 3, a),
            pair(1 + 1 == 2, b),
            pair(elsedo, c)
        );

        $this->assertEquals(b, $result);
    }

    /**
     * @test
     */
    public function cond_expects_at_least_one_condition()
    {
        $this->setExpectedException(CondExpectsAtLeastOneCondition::class);
        cond();
    }

    /**
     * @test
     */
    public function cond_expects_pairs_as_arguments()
    {
        $this->setExpectedException(CondExpectsPairsAsArguments::class);
        cond(a, b);
    }

    /**
     * @test
     */
    public function cond_expects_the_final_expression_to_be_elsedo()
    {
        $this->setExpectedException(CondExpectsTheFinalExpressionToBeElsedo::class);
        cond(
            pair(false, a),
            pair(false, b)
        );
    }

    /**
     * @test
     */
    public function cond_evaluates_functions()
    {
        $result = cond(
            pair(false, function() { return 'fail'; }),
            pair(elsedo, function() { return 'success'; })
        );

        $this->assertEquals('success', $result);
    }
}
 
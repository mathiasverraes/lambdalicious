<?php

namespace Verraes\Lambdalicious\Tests\Pure;

use CarIsDefinedOnlyForNonEmptyLists;

final class carTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function is_defined_only_for_non_empty_lists()
    {
        $this->setExpectedException(CarIsDefinedOnlyForNonEmptyLists::class);
        car([]);
    }

    /**
     * @test
     */
    public function returns_the_first_S_expression()
    {
        $this->assertEquals(
            a,
            car([a, b, c])
        );
    }
}

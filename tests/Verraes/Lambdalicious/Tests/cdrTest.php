<?php

namespace Verraes\Lambdalicious\Tests\Pure;

use CdrIsDefinedOnlyForNonEmptyLists;

final class cdrTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function is_defined_only_for_non_empty_lists()
    {
        $this->setExpectedException(CdrIsDefinedOnlyForNonEmptyLists::class);
        cdr([]);
    }

    /**
     * @test
     */
    public function returns_the_list_without_the_first_element()
    {
        $this->assertEquals(
            [b, c],
            cdr([a, b, c])
        );
    }

    /**
     * @test
     */
    public function returns_an_empty_list_for_a_list_with_one_element()
    {
        $this->assertEquals(
            [],
            cdr([a])
        );
    }
}

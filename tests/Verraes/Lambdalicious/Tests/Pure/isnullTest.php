<?php


namespace Verraes\Lambdalicious\Tests\Pure;

use NullIsDefinedOnlyForLists;

final class isnullTest extends \PHPUnit_Framework_TestCase {
    /**
     * @test
     */
    public function null_is_defined_only_for_non_lists()
    {
        // not to be confused with php's null!
        $this->setExpectedException(NullIsDefinedOnlyForLists::class);
        isnull(null);
    }

    /**
     * @test
     */
    public function true_for_empty_lists()
    {
        $this->assertTrue(isnull([]));
    }

    /**
     * @test
     */
    public function false_for_non_empty_lists()
    {
        $this->assertFalse(isnull([a]));
    }
}
 
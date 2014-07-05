<?php

namespace Verraes\Tests\Lambdalicious;

use PHPUnit_Framework_TestCase;

final class FluentCollectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function §_opens_and_closes_a_collections()
    {
        $this->assertEquals(
            [1, 2],
            §([1, 2])->§
        );
    }
}
 
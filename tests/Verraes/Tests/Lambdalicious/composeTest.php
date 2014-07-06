<?php


namespace Verraes\Tests\Lambdalicious;

final class composeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_should_()
    {

        $this->assertEquals(
            [2, 4, 6],
            compose(
                [1, 2, 3],
                map, [operator('*', 2)]
            )
        );


        $this->assertEquals(
            12,
            compose(
                [1, 2, 3],
                map, [operator('*', 2)],
                fold, [operator('+'), 0]
            )
        );


        $this->assertEquals(
            10,
            compose(
                [1, 2, 3],
                map, [operator('*', 2)],
                filter, [operator('>', 3)],
                fold, [operator('+'), 0]
            )
        );

    }
}
 
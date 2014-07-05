<?php


namespace Verraes\Tests\Lambdalicious;


final class ExamplesFromReadmeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function map_and_filter()
    {
        $this->assertEquals(
            [4, 5],
            §([1, 2, 3])
                ->map(operator('+', 2))
                ->filter(operator('>=', 4))
                ->§
        );
    }

    /**
     * @test
     */
    public function map_and_fold()
    {
        $this->assertEquals(
            'HelloWorld',
            §(['hello', 'world'])
                ->map('ucfirst')
                ->fold(operator('.'), '')

        );
    }
}
 
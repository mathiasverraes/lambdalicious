<?php

namespace Verraes\Lambdalicious\Tests;

final class examplesTest extends LambdaliciousTestCase
{
    /**
     * @test
     */
    public function atoms_and_lists()
    {
        include __DIR__ . '/../../../../examples/01-atoms-and-lists.php';
    }

    /**
     * @test
     */
    public function conditionals()
    {
        include __DIR__ . '/../../../../examples/02-conditionals.php';
    }

    /**
     * @test
     */
    public function tuples_and_pairs()
    {
        include __DIR__ . '/../../../../examples/03-tuples_and_pairs.php';
    }

    /**
     * @test
     */
    public function functions()
    {
        include __DIR__ . '/../../../../examples/04-functions.php';
    }

    /**
     * @test
     */
    public function fibonacci()
    {
        include __DIR__ . '/../../../../examples/05-fibonacci.php';
    }

    /**
     * @test
     */
    public function pipes_and_filters()
    {
        include __DIR__ . '/../../../../examples/06-pipes-and-filters.php';
    }

    /**
     * @test
     */
    public function average()
    {
        include __DIR__ . '/../../../../examples/07-average.php';
    }
}
 
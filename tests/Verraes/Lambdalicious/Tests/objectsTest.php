<?php

namespace Verraes\Lambdalicious\Tests;

final class objectsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function method()
    {
        $object = new _MethodTestDummy;

        $this->assertEquals(
            [],
            method('myMethod', [], $object)
        );
        $this->assertEquals(
            [a, b],
            method('myMethod', [a, b], $object)
        );
    }
}

final class _MethodTestDummy
{
    public function myMethod()
    {
        return func_get_args();
    }
}
 
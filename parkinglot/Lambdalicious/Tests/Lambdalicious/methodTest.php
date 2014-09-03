<?php

namespace Verraes\Tests\Lambdalicious;

final class methodTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function method() {
        $callMethod1 = method('test');
        $callMethod2 = method('test', []);
        $callMethod3 = method('test', ['a', 'b']);

        $obj = new _MethodTestDummy;

        $this->assertSame([], $callMethod1($obj));
        $this->assertSame([], $callMethod2($obj));
        $this->assertSame(['a', 'b'], $callMethod3($obj));
    }
}

final class _MethodTestDummy {
    public function test() {
        return func_get_args();
    }
}
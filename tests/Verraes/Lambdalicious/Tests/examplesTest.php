<?php

namespace Verraes\Lambdalicious\Tests;

final class examplesTest extends LambdaliciousTestCase
{

    const DIR = __DIR__ . '/../../../../examples/';

    public static function provideExamples()
    {
        $files = array_diff(scandir(self::DIR), ['..', '.', '_']);
        $data = array_combine($files, array_map(function($file) { return [$file]; }, $files));
        return $data;
    }

    /**
     * @test
     * @dataProvider provideExamples
     *
     * @param $file
     */
    public function examples($file)
    {
        include self::DIR.$file;
    }
}
 
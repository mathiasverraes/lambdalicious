<?php

namespace Verraes\Lambdalicious\Tests;

use PHPUnit_Framework_TestCase;

abstract class LambdaliciousTestCase extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        parent::setUp();
        atom(@a);
        atom(@b);
        atom(@c);
        atom(@d);
        atom(@e);
        atom(@f);
    }


}
 
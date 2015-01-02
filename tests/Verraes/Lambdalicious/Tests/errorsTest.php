<?php

namespace Verraes\Lambdalicious\Tests;

use λlicious_failed;

final class errorsTest extends LambdaliciousTestCase
{
    /**
     * @test
     */
    public function raise_is_actually_a_λlicious_exceptions()
    {
        $this->setExpectedException(λlicious_failed::class, @hello);
        raise(@hello);
    }
}
 
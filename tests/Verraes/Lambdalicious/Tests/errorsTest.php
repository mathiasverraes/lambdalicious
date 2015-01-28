<?php

namespace Verraes\Lambdalicious\Tests;

use _λlicious_failed;

final class errorsTest extends LambdaliciousTestCase
{
    /**
     * @test
     */
    public function raise_is_actually_a_λlicious_exceptions()
    {
        $this->setExpectedException(_λlicious_failed::class, @hello);
        raise(@hello);
    }
}
 
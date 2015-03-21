<?php

assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_CALLBACK, 'assertCallback');

return within('lambdalicious',
    describe('example',
        it('serves as a test', function() {
            $dir = __DIR__ . '/../examples/';
            $files = array_diff(scandir($dir), ['..', '.', '_']);

            return expectNotToThrow(function() use ($files, $dir) {
                array_walk(
                    $files,
                    function($file) use ($dir) {
                        include($dir.$file);
                    }
                );
            });
        })
    )
);

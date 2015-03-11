<?php return

within('errors',
    describe('raise',
        it('throws a λlicious exception', function() { return
            expectToThrow(
                function() { raise(@error); },
                _λlicious_failed::class
            );
        })
    )
);

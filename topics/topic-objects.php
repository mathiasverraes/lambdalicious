<?php return

within('objects',
    describe('method',
        it('calls a method with params on an object', function() {
            $object = new _MethodTestDummy;

            return expect(method('myMethod', [a, b], $object), toBe([a, b]));
        })
    )
);

final class _MethodTestDummy
{
    public function myMethod()
    {
        return func_get_args();
    }
}

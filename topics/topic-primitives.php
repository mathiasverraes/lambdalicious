<?php return

within("primitives",

    describe("isequal",
        it("returns true when equal", function(){
            return isequal(a, a);
        }),
        it("returns false when not equal", function(){
            return !isequal(a, b);
        })
    )

);
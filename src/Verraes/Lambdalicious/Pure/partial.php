<?php

const partial = 'partial';

function partial($function, ...$arguments)
{
    return function (...$moreArguments) use ($function, $arguments) {
        return call_user_func_array($function, array_merge($arguments, $moreArguments));
    };

}
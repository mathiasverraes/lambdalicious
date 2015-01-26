<?php
atom(@dump);

function dump($arg)
{
    call(@var_dump, l($arg));
    return $arg;
}

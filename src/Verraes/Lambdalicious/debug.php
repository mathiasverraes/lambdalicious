<?php
atom(@dump);

function dump($arg)
{
    call(@var_dump, [$arg]);
    return $arg;
}
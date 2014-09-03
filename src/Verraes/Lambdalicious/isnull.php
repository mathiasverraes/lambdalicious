<?php

const isnull = 'isnull';

/**
 * Is the list empty? Not to be confused with php's null!
 *
 * @primitive
 *
 * @param array $list
 * @throws NullIsDefinedOnlyForLists
 * @return boolean
 */
function isnull($list)
{
    if(!is_array($list)) {
        throw new NullIsDefinedOnlyForLists;
    }
    return [] === $list;
}

final class NullIsDefinedOnlyForLists extends \Exception
{
}
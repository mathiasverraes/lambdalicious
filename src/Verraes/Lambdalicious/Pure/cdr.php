<?php

const cdr = 'cdr';

/**
 * @primitive
 *
 * @param array $list
 * @throws CdrIsDefinedOnlyForNonEmptyLists
 * @return array
 */
function cdr(array $list)
{
    if ([] === $list) {
        throw new CdrIsDefinedOnlyForNonEmptyLists;
    }

    return array_slice($list, 1);
}

final class CdrIsDefinedOnlyForNonEmptyLists extends \Exception
{
}
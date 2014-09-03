<?php

const car = 'car';

/**
 * @primitive
 *
 * @param array $list
 * @return mixed
 * @throws CarIsDefinedOnlyForNonEmptyLists
 */
function car(array $list)
{
    if ([] === $list) {
        throw new CarIsDefinedOnlyForNonEmptyLists;
    }

    return reset($list);
}

final class CarIsDefinedOnlyForNonEmptyLists extends \Exception
{
}
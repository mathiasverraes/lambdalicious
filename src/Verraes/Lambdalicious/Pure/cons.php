<?php

const cons = 'cons';

/**
 * @primitive
 *
 * @param $sExpression
 * @param array $list
 *
 * @return array
 */
function cons($sExpression, array $list)
{
    return array_merge([$sExpression], array_values($list));
}
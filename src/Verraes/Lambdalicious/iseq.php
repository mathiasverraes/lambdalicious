<?php

const iseq = 'iseq';

/**
 * @primitive
 *
 * @param $leftSExpression
 * @param $rightSExpression
 * @throws IsEqIsDefinedForNonListsOnly
 * @return boolean
 */
function iseq($leftSExpression, $rightSExpression)
{
    if(is_array($leftSExpression) || is_array($rightSExpression)) {
        throw new IsEqIsDefinedForNonListsOnly;
    }
    return $leftSExpression == $rightSExpression;
}

final class IsEqIsDefinedForNonListsOnly extends \Exception
{
}
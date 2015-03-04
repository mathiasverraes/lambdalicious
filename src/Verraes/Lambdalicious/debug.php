<?php
atom(@dump);
atom(@pretty);

/**
 * Dump a pretty representation of a datastructure to stdout
 *
 * @param mixed $args
 *
 * @IO This function has side effects
 */
function dump(...$args)
{
    print(_prettyList(al($args), "\n"));
}

/**
 * Return a string representation of a list
 *
 * @param list   $list
 * @param string $delimiter
 *
 * @return string
 */
function _prettyList($list, $delimiter = ', ')
{
    return implode($delimiter, la(map(pretty, $list)));
}

/**
 * Return a string representation of a datastructure
 *
 * @param mixed $data
 *
 * @return string
 */
function pretty($data)
{
    return
        islist($data) ? '(' . _prettyList($data) . ')' :
        (ispair($data) ? '(' . pretty(head($data)) . ' . ' . pretty(tail($data)) . ')':
        print_r($data, true))
    ;
}

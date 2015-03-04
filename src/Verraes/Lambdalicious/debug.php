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
    print(implode("\n", la(map(pretty, al($args)))));
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
        islist($data) ? '(' . implode(', ', la(map(pretty, $data))) . ')' :
        (ispair($data) ? '(' . pretty(head($data)) . ' . ' . pretty(tail($data)) . ')':
        print_r($data, true))
    ;
}

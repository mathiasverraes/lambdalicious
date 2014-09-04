<?php
atom('cond');
atom('elsedo');
atom('isinstanceof');
atom('add');
atom('subtract');
atom('multiply');
atom('divide');
atom('mod');
atom('lt');
atom('lteq');
atom('gt');
atom('gteq');
atom('noteq');
atom('not');
atom('andx');
atom('orx');
atom('exponent');

function isinstanceof($object, $classname) { return $object instanceof $classname; }
function add($x, $y) { return $x + $y; }
function subtract($a, $b) { return $a -   $b; };
function multiply($x, $y) { return $x * $y; }
function divide ($a, $b) { return $a /   $b; };
function mod($a, $b) { return $a %   $b; };
function exponent($a, $b) { return $a ** $b; };
function lt($a, $b) { return $a <   $b; };
function lteq($a, $b) { return $a <=  $b; };
function gt($a, $b) { return $a >   $b; };
function gteq($a, $b) { return $a >=  $b; };
function noteq($a, $b) { return !isequal($a, $b); };
function not(callable $function) { return function(...$arguments) use($function) { return !call($function, $arguments);}; }
function andx($a, $b) { return $a &&  $b; };
function orx($a, $b) { return $a ||  $b; };

<?php

const isinstanceof = 'isinstanceof';
function isinstanceof($a, $b) { return $a instanceof $b; }

const add = 'add';
function add($x, $y) { return $x + $y; }

const subtract = 'subtract';
function subtract($a, $b) { return $a -   $b; };

const multiply = 'multiply';
function multiply($x, $y) { return $x * $y; }

const divide = 'divide';
function divide ($a, $b) { return $a /   $b; };

const mod = 'mod';
function mod($a, $b) { return $a %   $b; };

const exp = 'exp';
function exp($a, $b) { return $a ** $b; };

const concat = 'concat';
function concat($a, $b) { return $a .   $b; };

const lt = 'lt';
function lt($a, $b) { return $a <   $b; };

const lteq = 'lteq';
function lteq($a, $b) { return $a <=  $b; };

const gt = 'gt';
function gt($a, $b) { return $a >   $b; };

const gteq = 'gteq';
function gteq($a, $b) { return $a >=  $b; };

const noteq = 'noteq';
function noteq($a, $b) { return !iseq($a, $b); };

const andx = 'andx';
function andx($a, $b) { return $a &&  $b; };

const orx = 'orx';
function orx($a, $b) { return $a ||  $b; };
<?php

$a = 10;
var_dump($a);
echo "\n";

// $a++;
var_dump($a);
echo "\n";

$c = $a++;
var_dump($c);
var_dump($a);
echo "\n";
// b = a
// a = a + 1

$b = ++$a;
var_dump($b);
// a = a + 1
// b = a
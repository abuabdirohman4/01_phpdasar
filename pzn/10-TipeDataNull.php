<?php

$name = "Eko";
$name = null;

$age = null;

echo "Name : ";
echo $name;
echo "\n";

echo "Age : ";
echo $age;
echo "\n";

echo "Is Name Null? : ";
var_dump(is_null($name));
echo "\n";

is_null($tidakada);
echo "\n";

$contoh = "Eko";
unset($contoh);

var_dump(is_null($contoh));
var_dump(isset($contoh));
echo "\n";

$contoh = "Kurniawan";
$contoh = null;

var_dump(is_null($contoh));
var_dump(isset($contoh));
echo "\n";
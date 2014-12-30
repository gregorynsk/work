<?php

$date = array (1,2,3,4,5);

$date[0]= mktime(mt_rand(0, 23),mt_rand(0, 59),mt_rand(0, 59),mt_rand(1, 12),mt_rand(1, 31),mt_rand(1970, 2015));
$date[1]= mktime(mt_rand(0, 23),mt_rand(0, 59),mt_rand(0, 59),mt_rand(1, 12),mt_rand(1, 31),mt_rand(1970, 2015));
$date[2]= mktime(mt_rand(0, 23),mt_rand(0, 59),mt_rand(0, 59),mt_rand(1, 12),mt_rand(1, 31),mt_rand(1970, 2015));
$date[3]= mktime(mt_rand(0, 23),mt_rand(0, 59),mt_rand(0, 59),mt_rand(1, 12),mt_rand(1, 31),mt_rand(1970, 2015));
$date[4]= mktime(mt_rand(0, 23),mt_rand(0, 59),mt_rand(0, 59),mt_rand(1, 12),mt_rand(1, 31),mt_rand(1970, 2015));

var_dump($date);
echo "<br>";
echo date('d.m.Y H:m:s',$date[0]);
echo "<br>";
echo date('d.m.Y H:m:s',$date[1]);
echo "<br>";
echo date('d.m.Y H:m:s',$date[2]);
echo "<br>";
echo date('d.m.Y H:m:s',$date[3]);
echo "<br>";
echo date('d.m.Y H:m:s',$date[4]);
echo "<br>";

$date2[0]=date('d.m.Y H:m:s',$date[0]);
$date2[1]=date('d.m.Y H:m:s',$date[1]);
$date2[2]=date('d.m.Y H:m:s',$date[2]);
$date2[3]=date('d.m.Y H:m:s',$date[3]);
$date2[4]=date('d.m.Y H:m:s',$date[4]);

var_dump($date2);

$date3[0]=  substr($date2[0], 0, 2);
$date3[1]=  substr($date2[1], 0, 2);
$date3[2]=  substr($date2[2], 0, 2);
$date3[3]=  substr($date2[3], 0, 2);
$date3[4]=  substr($date2[4], 0, 2);

var_dump($date3);

$date4[0]=  substr($date2[0], 3, 2);
$date4[1]=  substr($date2[1], 3, 2);
$date4[2]=  substr($date2[2], 3, 2);
$date4[3]=  substr($date2[3], 3, 2);
$date4[4]=  substr($date2[4], 3, 2);

var_dump($date4);

echo "min day ".min ($date3);
echo "<br>";
echo "max month ".max ($date4);
echo "<br>";

array_multisort($date2, SORT_ASC);
var_dump ($date2);

$selected= array_pop($date);
var_dump($selected);

echo date('d.m.Y H:m:s', $selected);
echo "<br>";

date_default_timezone_set('America/New_York');
echo date('d.m.Y H:m:s', $selected);



?>

<?php

$date = array (1,2,3,4,5);

$date[0]= mt_rand(0,time());
$date[1]= mt_rand(0,time());
$date[2]= mt_rand(0,time());
$date[3]= mt_rand(0,time());
$date[4]= mt_rand(0,time());


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
echo "<br>";


echo "min day ".min(date('d',$date[0]),date('d',$date[1]),date('d',$date[2]),date('d',$date[3]),date('d',$date[4]));
echo "<br>";
echo "max month ".max(date('m',$date[0]),date('m',$date[1]),date('m',$date[2]),date('m',$date[3]),date('m',$date[4]));
echo "<br>";
day_of_week($date);


function day_of_week ($date){
   $dayofweek = array(date('w',$date[0]),date('w',$date[1]),date('w',$date[2]),date('w',$date[3]),date('w',$date[4])); 
   array_multisort($dayofweek, SORT_DESC);
   $day = array_pop($dayofweek);
   if ($day == 0){
       echo 'min day of week - Sun';
   }elseif ($day == 1) {
       echo 'min day of week - Mon';
   }elseif ($day == 2) {
       echo 'min day of week - Tue';
    }elseif ($day == 3) {
       echo 'min day of week - Wed';
    }elseif ($day == 4) {
       echo 'min day of week - Thu';
    }elseif ($day == 5) {
       echo 'min day of week - Fri';
    }else {
       echo 'min day of week - Sat';
    }
   }
//$date2[0]=date('d.m.Y H:m:s',$date[0]);
//$date2[1]=date('d.m.Y H:m:s',$date[1]);
//$date2[2]=date('d.m.Y H:m:s',$date[2]);
//$date2[3]=date('d.m.Y H:m:s',$date[3]);
//$date2[4]=date('d.m.Y H:m:s',$date[4]);
//
//
//$date3[0]=  substr($date2[0], 0, 2);
//$date3[1]=  substr($date2[1], 0, 2);
//$date3[2]=  substr($date2[2], 0, 2);
//$date3[3]=  substr($date2[3], 0, 2);
//$date3[4]=  substr($date2[4], 0, 2);
//
//
//$date4[0]=  substr($date2[0], 3, 2);
//$date4[1]=  substr($date2[1], 3, 2);
//$date4[2]=  substr($date2[2], 3, 2);
//$date4[3]=  substr($date2[3], 3, 2);
//$date4[4]=  substr($date2[4], 3, 2);
//
//
//echo "min day ".min ($date3);
//echo "<br>";
//echo "max month ".max ($date4);
//echo "<br>";

array_multisort($date, SORT_ASC);
var_dump ($date);

$selected= array_pop($date);
var_dump($selected);

echo 'Nsk: '.date('d.m.Y H:m:s', $selected);
echo "<br>";

date_default_timezone_set('America/New_York');
echo 'New-York: '.date('d.m.Y H:m:s', $selected);



?>

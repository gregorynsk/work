<?php

$ini_string='
[игрушка мягкая мишка белый]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
    
[одежда детская куртка синяя синтепон]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
    
[игрушка детская велосипед]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';

';
$bd=  parse_ini_string($ini_string, true);

//Перевод в менее раздражающий вид

$bd_s=array(
'bear'=>array(
    'price'=>$bd["игрушка мягкая мишка белый"]["цена"],
    'number'=>$bd["игрушка мягкая мишка белый"]["количество заказано"],
    'sclad'=>$bd["игрушка мягкая мишка белый"]["осталось на складе"],
    'diskont'=>$bd["игрушка мягкая мишка белый"]["diskont"]),
'jacket'=>array(
    'price'=>$bd["одежда детская куртка синяя синтепон"]["цена"],
    'number'=>$bd["одежда детская куртка синяя синтепон"]["количество заказано"],
    'sclad'=>$bd["одежда детская куртка синяя синтепон"]["осталось на складе"],
    'diskont'=>$bd["одежда детская куртка синяя синтепон"]["diskont"]),
'bike'=>array(
    'price'=>$bd["игрушка детская велосипед"]["цена"],
    'number'=>$bd["игрушка детская велосипед"]["количество заказано"],
    'sclad'=>$bd["игрушка детская велосипед"]["осталось на складе"],
    'diskont'=>$bd["игрушка детская велосипед"]["diskont"]));
      
echo '<h2>Корзина товаров</h2>';
echo '<h3>Ваш заказ:</h3>';

//Мишки

echo 'Товар: Игрушка мягкая мишка белый<br>';
echo 'Цена за штуку: '.$bd_s["bear"]["price"].' руб.<br>';
if ($bd_s["bear"]["number"]<=$bd_s["bear"]["sclad"]){
    echo 'Количество: '.$bd_s["bear"]["number"].' шт.<br>';
    $bear_n = $bd_s["bear"]["number"];
}else {
    echo '<font color="red">Количество: '.$bd_s["bear"]["number"].' шт. (есть '
            .$bd_s["bear"]["sclad"].' шт.)</font><br>';
    $bear_n = $bd_s["bear"]["sclad"];
}
echo 'Остаток на складе: '.$bd_s["bear"]["sclad"].' шт.<br><br>';

//Куртки

echo 'Товар: Одежда детская куртка синяя синтепон<br>';
echo 'Цена за штуку: '.$bd_s["jacket"]["price"].' руб.<br>';
if ($bd_s["jacket"]["number"]<=$bd_s["jacket"]["sclad"]){
    echo 'Количество: '.$bd_s["jacket"]["number"].' шт.<br>';
    $jacket_n = $bd_s["jacket"]["number"];
}else {
    echo '<font color="red">Количество: '.$bd_s["jacket"]["number"].' шт. (есть '
            .$bd_s["jacket"]["sclad"].' шт.)</font><br>';
    $jacket_n = $bd_s["jacket"]["sclad"];
}
echo 'Остаток на складе: '.$bd_s["jacket"]["sclad"].' шт.<br><br>';

//Велики

echo 'Товар: Игрушка детская велосипед<br>';
echo 'Цена за штуку: '.$bd_s["bike"]["price"].' руб.<br>';
if ($bd_s["bike"]["number"]<=$bd_s["bike"]["sclad"]){
    echo 'Количество: '.$bd_s["bike"]["number"].' шт.<br>';
    $bike_n = $bd_s["bike"]["number"];
}else {
    echo '<font color="red">Количество: '.$bd_s["bike"]["number"].' шт. (есть '
            .$bd_s["bike"]["sclad"].' шт.)</font><br>';
    $bike_n = $bd_s["bike"]["sclad"];
}
echo 'Остаток на складе: '.$bd_s["bike"]["sclad"].' шт.<br><br>';

//Функции

function sum_n($bd_s) { 
    global $bear_n, $jacket_n, $bike_n;
    return $bear_n + $jacket_n + $bike_n;
}

function sum_p($bd_s) {
    global $bear_n, $jacket_n, $bike_n, $con_b, $con_j, $con_v;
    $a=($bear_n*$bd_s["bear"]["price"]*$con_b);
    $b=($jacket_n*$bd_s["jacket"]["price"]*$con_j);
    if ($bd_s["bike"]["number"]>=3 && $bd_s["bike"]["sclad"]>=3){
        $c=($bike_n*($bd_s["bike"]["price"]*(0.7+$con_v-1)));
    }
    else {
        $c=($bike_n*$bd_s["bike"]["price"]*$con_v);
    }
        return $a+$b+$c;
    
}

function diskont0($param) {
    global $con_b, $con_j, $con_v;
    if ($param == 'bear'){
        echo 'У вас нет скидки по купону на мишек';
        $con_b = 1;
}   elseif ($param == 'jacket'){
        echo 'У вас нет скидки по купону на куртки';
        $con_j = 1;
}   else {
        echo 'У вас нет скидки по купону на велики';
        $con_v = 1;
}
}
function diskont1($param) {
    global $con_b, $con_j, $con_v;
    if ($param == 'bear'){
        echo 'У вас cкидка по купону - 10% на мишек';
        $con_b = 0.9;
}   elseif ($param == 'jacket'){
        echo 'У вас cкидка по купону - 10% на куртки';
        $con_j = 0.9;
}   else {
        echo 'У вас cкидка по купону - 10% на велики';
        $con_v = 0.9;
}
}
function diskont2($param) {
    global $con_b, $con_j, $con_v;
    if ($param == 'bear'){
        echo 'У вас cкидка по купону - 20% на мишек';
        $con_b = 0.8;
}   elseif ($param == 'jacket'){
        echo 'У вас cкидка по купону - 20% на куртки';
        $con_j = 0.8;
}   else {
        echo 'У вас cкидка по купону - 20% на велики';
        $con_v = 0.8;
}
}

//Скидки

echo '<h3>Скидки:</h3>';
if ($bd_s["bike"]["number"]>=3 && $bd_s["bike"]["sclad"]>=3){
    echo 'Вы заказали более двух велосипедов, поэтому получаете скидку 30% на эту позицию<br>';
}
 else {
    echo 'Закажите более двух велосипедов, чтобы получить скидку 30% на эту позицию<br>';
}
$func = $bd_s["bear"]["diskont"];
$func('bear');
echo '<br>';
$func = $bd_s["jacket"]["diskont"];
$func('jacket');
echo '<br>';
$func = $bd_s["bike"]["diskont"];
$func('bike');
echo '<br>';

//Итого

echo '<h3>Итого:</h3>';

if ($bd_s["bear"]&&$bd_s["jacket"]&&$bd_s["bike"]){
    echo 'Количество наименований: 3<br>';
} 

echo 'Общее количество заказанных товаров: '.sum_n($bd_s).' шт.<br>';
echo 'Общая сумма заказа: '.sum_p($bd_s).' руб.<br>';

//Уведомления

echo '<h3>Уведомления:</h3>';
 

echo ($bd_s["bear"]["number"]<=$bd_s["bear"]["sclad"]
    && $bd_s["jacket"]["number"]<=$bd_s["jacket"]["sclad"]
    && $bd_s["bike"]["number"]<=$bd_s["bike"]["sclad"]) ? 
'<font color="blue">Все ок, всего хватает!</font><br>' :
'<font color="red">Вы заказали слишком большое количество товаров:</font>';
echo '<br>';
if ($bd_s["bear"]["number"]>$bd_s["bear"]["sclad"]){
    echo '<font color="red">-Мишек столько нет в наличии!</font><br>';
}
if ($bd_s["jacket"]["number"]>$bd_s["jacket"]["sclad"]){
    echo '<font color="red">-Курток столько нет в наличии!</font><br>';
}
if ($bd_s["bike"]["number"]>$bd_s["bike"]["sclad"]){
    echo '<font color="red">-Великов столько нет в наличии!</font><br>';
}
echo '<br>';

//ниже использую switch, если требуется по ТЗ, можно раскомментить

//switch ($bd_s["bear"]["sclad"]) {
//    case 0:
//        echo 'Мишек нет на складе, закрытая позиция';
//
//break;
//
//    default:
//        echo 'Мишки есть на складе, открытая позиция';
//        break;
//}
//echo '<br>';
//switch ($bd_s["jacket"]["sclad"]) {
//    case 0:
//        echo 'Курток нет на складе, закрытая позиция';
//
//break;
//
//    default:
//        echo 'Куртки есть на складе, открытая позиция';
//        break;
//}
//echo '<br>';
//switch ($bd_s["bike"]["sclad"]) {
//    case 0:
//        echo 'Великов нет на складе, закрытая позиция';
//
//break;
//
//    default:
//        echo 'Велики есть на складе, открытая позиция';
//        break;
//}



?>
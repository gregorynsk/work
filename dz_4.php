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

$bd_simple=array(
'bear'=>array(
    'price'=>$bd["игрушка мягкая мишка белый"]["цена"],
    'number'=>$bd["игрушка мягкая мишка белый"]["количество заказано"],
    'storage'=>$bd["игрушка мягкая мишка белый"]["осталось на складе"],
    'diskont'=>$bd["игрушка мягкая мишка белый"]["diskont"]),
'jacket'=>array(
    'price'=>$bd["одежда детская куртка синяя синтепон"]["цена"],
    'number'=>$bd["одежда детская куртка синяя синтепон"]["количество заказано"],
    'storage'=>$bd["одежда детская куртка синяя синтепон"]["осталось на складе"],
    'diskont'=>$bd["одежда детская куртка синяя синтепон"]["diskont"]),
'bike'=>array(
    'price'=>$bd["игрушка детская велосипед"]["цена"],
    'number'=>$bd["игрушка детская велосипед"]["количество заказано"],
    'storage'=>$bd["игрушка детская велосипед"]["осталось на складе"],
    'diskont'=>$bd["игрушка детская велосипед"]["diskont"]));
      
echo '<h2>Корзина товаров</h2>';
echo '<h3>Ваш заказ:</h3>';

//Мишки

echo 'Товар: Игрушка мягкая мишка белый<br>';
echo 'Цена за штуку: '.$bd_simple["bear"]["price"].' руб.<br>';
if ($bd_simple["bear"]["number"]<=$bd_simple["bear"]["storage"]){
    echo 'Количество: '.$bd_simple["bear"]["number"].' шт.<br>';
    $bear__real_number = $bd_simple["bear"]["number"];
}else {
    echo '<font color="red">Количество: '.$bd_simple["bear"]["number"].' шт. (есть '
            .$bd_simple["bear"]["storage"].' шт.)</font><br>';
    $bear__real_number = $bd_simple["bear"]["storage"];
}
echo 'Остаток на складе: '.$bd_simple["bear"]["storage"].' шт.<br><br>';

//Куртки

echo 'Товар: Одежда детская куртка синяя синтепон<br>';
echo 'Цена за штуку: '.$bd_simple["jacket"]["price"].' руб.<br>';
if ($bd_simple["jacket"]["number"]<=$bd_simple["jacket"]["storage"]){
    echo 'Количество: '.$bd_simple["jacket"]["number"].' шт.<br>';
    $jacket__real_number = $bd_simple["jacket"]["number"];
}else {
    echo '<font color="red">Количество: '.$bd_simple["jacket"]["number"].' шт. (есть '
            .$bd_simple["jacket"]["storage"].' шт.)</font><br>';
    $jacket__real_number = $bd_simple["jacket"]["storage"];
}
echo 'Остаток на складе: '.$bd_simple["jacket"]["storage"].' шт.<br><br>';

//Велики

echo 'Товар: Игрушка детская велосипед<br>';
echo 'Цена за штуку: '.$bd_simple["bike"]["price"].' руб.<br>';
if ($bd_simple["bike"]["number"]<=$bd_simple["bike"]["storage"]){
    echo 'Количество: '.$bd_simple["bike"]["number"].' шт.<br>';
    $bike__real_number = $bd_simple["bike"]["number"];
}else {
    echo '<font color="red">Количество: '.$bd_simple["bike"]["number"].' шт. (есть '
            .$bd_simple["bike"]["storage"].' шт.)</font><br>';
    $bike__real_number = $bd_simple["bike"]["storage"];
}
echo 'Остаток на складе: '.$bd_simple["bike"]["storage"].' шт.<br><br>';

//Функции

function sum_n() { 
    global $bear__real_number, $jacket__real_number, $bike__real_number;
    return $bear__real_number + $jacket__real_number + $bike__real_number;
}

function sum_p($bd_simple) {
    global $bear__real_number, $jacket__real_number, $bike__real_number, $con_b, $con_j, $con_v;
    $bear_price=($bear__real_number*$bd_simple["bear"]["price"]*$con_b);
    $jacket_price=($jacket__real_number*$bd_simple["jacket"]["price"]*$con_j);
    if ($bd_simple["bike"]["number"]>=3 && $bd_simple["bike"]["storage"]>=3){
        $bike_price=($bike__real_number*($bd_simple["bike"]["price"]*(0.7+$con_v-1)));
    }
    else {
        $bike_price=($bike__real_number*$bd_simple["bike"]["price"]*$con_v);
    }
        return $bear_price+$jacket_price+$bike_price;
    
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
if ($bd_simple["bike"]["number"]>=3 && $bd_simple["bike"]["storage"]>=3){
    echo 'Вы заказали более двух велосипедов, поэтому получаете скидку 30% на эту позицию<br>';
}
 else {
    echo 'Закажите более двух велосипедов, чтобы получить скидку 30% на эту позицию<br>';
}
$func = $bd_simple["bear"]["diskont"];
$func('bear');
echo '<br>';
$func = $bd_simple["jacket"]["diskont"];
$func('jacket');
echo '<br>';
$func = $bd_simple["bike"]["diskont"];
$func('bike');
echo '<br>';

//Итого

echo '<h3>Итого:</h3>';

if ($bd_simple["bear"]&&$bd_simple["jacket"]&&$bd_simple["bike"]){
    echo 'Количество наименований: 3<br>';
} 

echo 'Общее количество заказанных товаров: '.sum_n().' шт.<br>';
echo 'Общая сумма заказа: '.sum_p($bd_simple).' руб.<br>';

//Уведомления

echo '<h3>Уведомления:</h3>';
 

echo ($bd_simple["bear"]["number"]<=$bd_simple["bear"]["storage"]
    && $bd_simple["jacket"]["number"]<=$bd_simple["jacket"]["storage"]
    && $bd_simple["bike"]["number"]<=$bd_simple["bike"]["storage"]) ? 
'<font color="blue">Все ок, всего хватает!</font><br>' :
'<font color="red">Вы заказали слишком большое количество товаров:</font>';
echo '<br>';
if ($bd_simple["bear"]["number"]>$bd_simple["bear"]["storage"]){
    echo '<font color="red">-Мишек столько нет в наличии!</font><br>';
}
if ($bd_simple["jacket"]["number"]>$bd_simple["jacket"]["storage"]){
    echo '<font color="red">-Курток столько нет в наличии!</font><br>';
}
if ($bd_simple["bike"]["number"]>$bd_simple["bike"]["storage"]){
    echo '<font color="red">-Великов столько нет в наличии!</font><br>';
}
echo '<br>';

//ниже использую switch, если требуется по ТЗ, можно раскомментить

//switch ($bd_simple["bear"]["storage"]) {
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
//switch ($bd_simple["jacket"]["storage"]) {
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
//switch ($bd_simple["bike"]["storage"]) {
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
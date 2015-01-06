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

//Парсинг

parser($bd);


function parser($bd) {
    foreach ($bd as $key => $params) {
        
        $discount = discount($params['цена'],$params['количество заказано'],$params['diskont'],$params['осталось на складе']);
        
        echo($key);
        echo'<br>';
    
        echo 'Цена за штуку: '.$params['цена'].' руб.';
        echo'<br>';
        echo 'Скидка: '.$discount['skidka'];
        echo'<br>';
        echo 'Цена со скидкой: '.$discount['price'].' руб.';
        echo'<br>';
        echo'Количество заказано: '.$params['количество заказано'].' шт.';
        echo'<br>';
        echo'Количество на складе: '.$params['осталось на складе'].' шт.';
        echo'<br>';
        if ($params['количество заказано']<=$params['осталось на складе']){
            echo 'Заказ по наличию: '.$params['количество заказано'].' шт.';
        }else{
            echo '<font color="red">Заказ по наличию: '.$params['осталось на складе'].' шт.</font>';
        }
        echo'<br>';
        echo 'Сумма по наименованию: '.$discount['all_price'].' руб.';
        
    echo'<br><br>';
    }
}

function discount($price,$number,$diskont,$storage) {
    switch ($diskont) {
        case 'diskont0' :
            $skidka = '0';
            break;
        case 'diskont1' :
            $skidka = '10';
            break;
        default:
            $skidka = '20';
            break;
    }
    $price_with_discount_per_item= $price-($price*($skidka/100));
    if ($number<=$storage){
        $price_with_discount_for_all=$number*$price_with_discount_per_item;
    }  
    else {
        $price_with_discount_for_all=$storage*$price_with_discount_per_item;
    }
    return array('skidka'=>$skidka.'%', 
        'price'=>$price_with_discount_per_item,
        'all_price'=>$price_with_discount_for_all);
    }


?>
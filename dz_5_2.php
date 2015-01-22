<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
  
$news='Четыре новосибирские компании вошли в сотню лучших работодателей
Выставка университетов США: открой новые горизонты
Оценку «неудовлетворительно» по качеству получает каждая 5-я квартира в новостройке
Студент-изобретатель раскрыл запутанное преступление
Хоккей: «Сибирь» выстояла против «Ак Барса» в пятом матче плей-офф
Здоровое питание: вегетарианская кулинария
День святого Патрика: угощения, пивной теннис и уличные гуляния с огнем
«Красный факел» пустит публику на ночные экскурсии за кулисы и по закоулкам столетнего здания
Звезды телешоу «Голос» Наргиз Закирова и Гела Гуралиа споют в «Маяковском»';
$news=  explode("\n", $news);

input_func($news);

function input_func($news) {
    if (!isset($_POST) OR !isset($_POST['id'])){
        echo '<font color="red">Не введен номер новости</font><br><br>';        
    } elseif ($_POST['id'] < count($news)){
        echo 'Новость: '.$news[$_POST['id']].'<br>';
    } else {
        foreach($news as $value) {
        echo $value.'<br>';
    }
    }
}
?>

<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Форма</title>
 </head>
 <body>
  <form method="POST">
  <p><b>Введите номер новости</b></p>
  <p><input type="text" name="id" value=""></p>
  <p><input type="submit"></p>
 </form>

 </body>
</html>
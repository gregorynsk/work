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

get_news($news);

function get_news($news) {
if (!isset($_GET['id']) OR !is_numeric($_GET['id'])){
        header("HTTP/1.x 404 Not Found");
        header("Status: 404 Not Found");
        require_once($_SERVER['DOCUMENT_ROOT'].'/404.php');
        exit();
    }
      elseif ($_GET['id'] < count($news)){
        echo 'Новость: '.$news[$_GET['id']];
    } else {
        foreach($news as $value) {
        echo $value.'<br>';
    }
    }
}


?>

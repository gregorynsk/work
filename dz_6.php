<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start();


?>

<form  method="post">


    <div class="form-row-indented"> 
        <label class="form-label-radio">
            <input type="radio" checked="" value="1" name="private">Частное лицо</label> 
        <label class="form-label-radio">
            <input type="radio" value="0" name="private" 
                   <?php
               if (isset($_GET['num']) && $_GET['do']=='cart'){
                    if (isset($_SESSION['ad'][$_GET['num']]['private']) && $_SESSION['ad'][$_GET['num']]['private']==0) {
                    echo 'checked';
                    }
               }
               ?>
                   >Компания</label> 
    </div>
    <br>
    <div class="form-row"> 
        <label for="fld_seller_name" class="form-label">
            <b id="your-name">Ваше имя</b>
            <span style="color: #BA0000; font-family: Verdana; font-size: 16px; font-weight: bold;"> *</span></label>
        <input type="text" maxlength="40" class="form-input-text" 
               <?php
               if (isset($_GET['num']) && $_GET['do']=='cart'){
                    if (isset($_SESSION['ad'][$_GET['num']]['seller_name'])) {
                    echo 'value="'.$_SESSION['ad'][$_GET['num']]['seller_name'].'" ';
                    }
               }
               ?>
               name="seller_name" id="fld_seller_name">
    </div>
    <br>
    <div class="form-row"> 
        <label for="fld_email" class="form-label">Электронная почта</label>
        <input type="text" class="form-input-text" 
               <?php
               if (isset($_GET['num']) && $_GET['do']=='cart'){
                    if (isset($_SESSION['ad'][$_GET['num']]['email'])) {
                    echo 'value="'.$_SESSION['ad'][$_GET['num']]['email'].'" ';
                    }
               }
               ?>
               name="email" id="fld_email">
    </div>
    <br>
    <div class="form-row-indented"> 
        <label class="form-label-checkbox" for="allow_mails"> 
            <input type="checkbox" value="1" name="allow_mails" id="allow_mails" class="form-input-checkbox" 
                <?php
               if (isset($_GET['num']) && $_GET['do']=='cart'){
                    if (isset($_SESSION['ad'][$_GET['num']]['allow_mails'])) {
                    echo 'checked';
                    }
               }
               ?>
                   >
            <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span>
        </label> 
    </div>
    <br>
    <div class="form-row"> 
        <label id="fld_phone_label" for="fld_phone" class="form-label">Номер телефона</label> 
        <input type="text" class="form-input-text" 
               <?php
               if (isset($_GET['num']) && $_GET['do']=='cart'){
                    if (isset($_SESSION['ad'][$_GET['num']]['phone'])) {
                    echo 'value="'.$_SESSION['ad'][$_GET['num']]['phone'].'"';
                    }
               }
               ?>
               name="phone" id="fld_phone">
    </div>
    <br>
    <div id="f_location_id" class="form-row form-row-required"> 
        <label for="region" class="form-label">Город</label> 
        <?php if(isset($_GET['num']) && $_GET['do']=='cart'){
        city($_SESSION['ad'][$_GET['num']]['location_id']);
        }else {
            echo '<select title="Выберите Ваш город" name="location_id" id="region" class="form-input-select"> 
            <option value="">-- Выберите город --</option>
            <option class="opt-group" disabled="disabled">-- Города --</option>
            <option selected="" data-coords=",," value="641780">Новосибирск</option>   
            <option data-coords=",," value="641490">Барабинск</option>  
            <option data-coords=",," value="641510">Бердск</option>   
            <option data-coords=",," value="641600">Искитим</option>  
            <option data-coords=",," value="641630">Колывань</option>   
            <option data-coords=",," value="641680">Краснообск</option>  
            <option data-coords=",," value="641710">Куйбышев</option>   
            <option data-coords=",," value="641760">Мошково</option>   
            <option data-coords=",," value="641790">Обь</option>  
            <option data-coords=",," value="641800">Ордынское</option> 
            <option data-coords=",," value="641970">Черепаново</option> 
        </select>';
        }
        ?>
    </div>
        <br><br>
    <div class="form-row"> 
            <label for="fld_category_id" class="form-label">Категория</label>
    <?php if(isset($_GET['num']) && $_GET['do']=='cart' && isset($_SESSION['ad'][$_GET['num']]['category_id'])){
        cat($_SESSION['ad'][$_GET['num']]['category_id']);
        }else {
            echo '<select title="Выберите категорию объявления" name="category_id" id="fld_category_id" class="form-input-select">
                <option value="">-- Выберите категорию --</option>
                <optgroup label="Транспорт">
                    <option value="9">Автомобили с пробегом</option>
                    <option value="109">Новые автомобили</option>
                    <option value="14">Мотоциклы и мототехника</option>
                    <option value="81">Грузовики и спецтехника</option>
                    <option value="11">Водный транспорт</option>
                    <option value="10">Запчасти и аксессуары</option>
                </optgroup>
                <optgroup label="Недвижимость">
                    <option value="24">Квартиры</option>
                    <option value="23">Комнаты</option>
                    <option value="25">Дома, дачи, коттеджи</option>
                    <option value="26">Земельные участки</option>
                    <option value="85">Гаражи и машиноместа</option>
                    <option value="42">Коммерческая недвижимость</option>
                    <option value="86">Недвижимость за рубежом</option>
                </optgroup><optgroup label="Работа">
                    <option value="111">Вакансии (поиск сотрудников)</option>
                    <option value="112">Резюме (поиск работы)</option>
                </optgroup>
                <optgroup label="Услуги">
                    <option value="114">Предложения услуг</option>
                    <option value="115">Запросы на услуги</option>
                </optgroup>
                <optgroup label="Личные вещи">
                    <option value="27">Одежда, обувь, аксессуары</option>
                    <option value="29">Детская одежда и обувь</option>
                    <option value="30">Товары для детей и игрушки</option>
                    <option value="28">Часы и украшения</option>
                    <option value="88">Красота и здоровье</option>
                </optgroup>
                <optgroup label="Для дома и дачи">
                    <option value="21">Бытовая техника</option>
                    <option value="20">Мебель и интерьер</option>
                    <option value="87">Посуда и товары для кухни</option>
                    <option value="82">Продукты питания</option>
                    <option value="19">Ремонт и строительство</option>
                    <option value="106">Растения</option></optgroup>
                <optgroup label="Бытовая электроника">
                    <option value="32">Аудио и видео</option>
                    <option value="97">Игры, приставки и программы</option>
                    <option value="31">Настольные компьютеры</option>
                    <option value="98">Ноутбуки</option>
                    <option value="99">Оргтехника и расходники</option>
                    <option value="96">Планшеты и электронные книги</option>
                    <option value="84">Телефоны</option>
                    <option value="101">Товары для компьютера</option>
                    <option value="105">Фототехника</option>
                </optgroup>
                <optgroup label="Хобби и отдых">
                    <option value="33">Билеты и путешествия</option>
                    <option value="34">Велосипеды</option>
                    <option value="83">Книги и журналы</option>
                    <option value="36">Коллекционирование</option>
                    <option value="38">Музыкальные инструменты</option>
                    <option value="102">Охота и рыбалка</option>
                    <option value="39">Спорт и отдых</option>
                    <option value="103">Знакомства</option>
                </optgroup>
                <optgroup label="Животные">
                    <option value="89">Собаки</option>
                    <option value="90">Кошки</option>
                    <option value="91">Птицы</option>
                    <option value="92">Аквариум</option>
                    <option value="93">Другие животные</option>
                    <option value="94">Товары для животных</option>
                </optgroup>
                <optgroup label="Для бизнеса">
                    <option value="116">Готовый бизнес</option>
                    <option value="40">Оборудование для бизнеса</option>
                </optgroup>
            </select>'; 
        }
    ?>
        </div>
        <br>
        <div style="display: none;" id="params" class="form-row form-row-required"> 
            <label class="form-label ">
                Выберите параметры
            </label> 
            <div class="form-params params" id="filters">
            </div> 
        </div>
        <br>
        <div id="f_title" class="form-row f_title">
            <label for="fld_title" class="form-label">Название объявления
            <span style="color: #BA0000; font-family: Verdana; font-size: 16px; font-weight: bold;"> *</span></label> 
            <input type="text" maxlength="50" class="form-input-text-long" 
                   <?php
               if (isset($_GET['num']) && $_GET['do']=='cart'){
                    if (isset($_SESSION['ad'][$_GET['num']]['title'])) {
                    echo 'value="'.$_SESSION['ad'][$_GET['num']]['title'].'"';
                    }
               }
               ?>
                   name="title" id="fld_title">
        </div>
        <br>
        <div class="form-row">
            <label for="fld_description" class="form-label" id="js-description-label">Описание объявления</label>
            <textarea maxlength="3000" name="description" id="fld_description" class="form-input-textarea">
                      <?php
               if (isset($_GET['num']) && $_GET['do']=='cart'){
                    if (isset($_SESSION['ad'][$_GET['num']]['description'])) {
                    echo $_SESSION['ad'][$_GET['num']]['description'];
                    }
               }
               ?>
               </textarea>
        </div>
        <br>
        <div id="price_rw" class="form-row rl"> 
            <label id="price_lbl" for="fld_price" class="form-label">Цена
            <span style="color: #BA0000; font-family: Verdana; font-size: 16px; font-weight: bold;"> *</span>
            </label> 
            <input type="text" pattern="\-?\d+(,\d{0,})?" maxlength="9" class="form-input-text-short"
                   <?php
               if (isset($_GET['num']) && $_GET['do']=='cart'){
                    if (isset($_SESSION['ad'][$_GET['num']]['price'])) {
                    echo 'value="'.$_SESSION['ad'][$_GET['num']]['price'].'"';
                    }
               }
               ?>
                   name="price" id="fld_price">&nbsp;
            <span id="fld_price_title">руб.</span>
        </div>
        <br>
        <div class="form-row-indented form-row-submit b-vas-submit" id="js_additem_form_submit">
            <div class="vas-submit-button pull-left">
                <span class="vas-submit-border"></span>
                <span class="vas-submit-triangle"></span> 
                <input type="submit" value="Далее" id="form_submit" name="main_form_submit" class="vas-submit-input"> 
            </div>
        </div>
</form>

<?php

//FUNCTIONS

function head_and_shoulders() {
    echo '<br><table border="1" cellpadding="0" cellspacing="0" width="500">
    <tr>
    <td width="125">Название</td>
    <td width="125">Цена</td>
    <td width="125">Имя</td>
    <td width="125">Удалить</td>
    </tr>';
    foreach ($_SESSION['ad'] as $num => $value) {
        if (isset($_SESSION['ad'])) {
            echo '<table border="1" cellpadding="0" cellspacing="0" width="500">
    <tr>
    <td width="125"><a href=?do=cart&num='.$num.'>'.$value['title'].'</a></td>
    <td width="125">'.$value['price'].'</td>
    <td width="125">'.$value['seller_name'].'</td>
    <td width="125"><a href=?do=del&num='.$num.'>Удалить</a></td>
    </tr>
    </table>';
        } 
    }
}
function city($ad_city_code) {
    $city_all = array('641780' => 'Новосибирск', '641490' => 'Барабинск', '641510' => 'Бердск', '641600' => 'Искитим', '641630' => 'Колывань', '641680' => 'Краснообск',
        '641710' => 'Куйбышев', '641760' => 'Мошково', '641790' => 'Обь', '641800' => 'Ордынское', '641970' => 'Черепаново');
    echo '<select title="Выберите Ваш город" name="location_id" id="region" class="form-input-select"> 
                <option value="">-- Выберите город --</option>
                <option class="opt-group" disabled="disabled">-- Города --</option>';
    foreach ($city_all as $code => $city) {
        if ($code == $ad_city_code) {
            $sel = 'selected=""';
        } else {
            $sel = '';
        }
        echo '<option data-coords=",," ' . $sel . ' value="' . $code . '">' . $city . '</option>';
    }

    echo '</select>';
}

function cat($ad_cat_code) {
    $cat_all = array('9' => 'Автомобили с пробегом',
        '109' => 'Новые автомобили',
        '14' => 'Мотоциклы и мототехника',
        '81' => 'Грузовики и спецтехника',
        '11' => 'Водный транспорт',
        '10' => 'Запчасти и аксессуары',
        '24' => 'Квартиры',
        '23' => 'Комнаты',
        '25' => 'Дома, дачи, коттеджи',
        '26' => 'Земельные участки',
        '85' => 'Гаражи и машиноместа',
        '42' => 'Коммерческая недвижимость',
        '86' => 'Недвижимость за рубежом',
        '111' => 'Вакансии (поиск сотрудников)',
        '112' => 'Резюме (поиск работы)',
        '114' => 'Предложения услуг',
        '115' => 'Запросы на услуги',
        '27' => 'Одежда, обувь, аксессуары',
        '29' => 'Детская одежда и обувь',
        '30' => 'Товары для детей и игрушки',
        '28' => 'Часы и украшения',
        '88' => 'Красота и здоровье',
        '21' => 'Бытовая техника',
        '20' => 'Мебель и интерьер',
        '87' => 'Посуда и товары для кухни',
        '82' => 'Продукты питания',
        '19' => 'Ремонт и строительство',
        '106' => 'Растения',
        '32' => 'Аудио и видео',
        '97' => 'Игры, приставки и программы',
        '31' => 'Настольные компьютеры',
        '98' => 'Ноутбуки',
        '99' => 'Оргтехника и расходники',
        '96' => 'Планшеты и электронные книги',
        '84' => 'Телефоны',
        '101' => 'Товары для компьютера',
        '105' => 'Фототехника',
        '33' => 'Билеты и путешествия',
        '34' => 'Велосипеды',
        '83' => 'Книги и журналы',
        '36' => 'Коллекционирование',
        '38' => 'Музыкальные инструменты',
        '102' => 'Охота и рыбалка',
        '39' => 'Спорт и отдых',
        '103' => 'Знакомства',
        '89' => 'Собаки',
        '90' => 'Кошки',
        '91' => 'Птицы',
        '92' => 'Аквариум',
        '93' => 'Другие животные',
        '94' => 'Товары для животных',
        '116' => 'Готовый бизнес',
        '40' => 'Оборудование для бизнеса');
    echo '<select title="Выберите категорию объявления" name="category_id" id="fld_category_id" class="form-input-select">
                <option value="">-- Выберите категорию --</option>';
    foreach ($cat_all as $code => $cat) {
        if ($code == $ad_cat_code) {
            $sel = 'selected=""';
        } else {
            $sel = '';
        }
        echo '<option ' . $sel . ' value="' . $code . '">' . $cat . '</option>';
    }
    echo '</select>';
}

//BODY

if (isset($_POST['main_form_submit'])) {
    if ($_POST['title'] != '' && $_POST['price'] != '' && $_POST['seller_name'] != '') {
        $_SESSION['ad'][] = $_POST;
    } else {
        echo '<font color="red">Заполнены не все обязательные поля!</font><br>';
    }
}



if (isset($_GET['do'])) {
    if ($_GET['do'] == 'del') {
        if (isset($_SESSION['ad'][$_GET['num']])) {
            unset($_SESSION['ad'][$_GET['num']]);
        }
    }
}

head_and_shoulders();

?>


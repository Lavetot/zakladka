<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "6797892976:AAGEkXRrSToNC4mMBrvjBtouIvmhYz1E_wA";

//Сюда вставляем chat_id
$chat_id = "-4048917067";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $surname = ($_POST['surname']);
    $cabinet = ($_POST['cabinet']);
	$name = ($_POST['name']);
    $number = ($_POST['number']);

//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Имя:' => $name,
        'Фамилия:' => $surname,
		'Кабинет:' => $cabinet,
		'Описание:' => $number,
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
        alert('Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.');
    }

//А здесь сообщение об ошибке при отправке
    else {
        alert('Что-то пошло не так. ПОпробуйте отправить форму ещё раз.');
    }
}

?>
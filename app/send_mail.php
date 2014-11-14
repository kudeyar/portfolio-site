<?php
// Открываем сессию
session_start();

// Получаем данные из формы
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$message = htmlspecialchars(strip_tags(trim($_POST['message'])), ENT_QUOTES);
$captcha_code = $_POST['captcha'];
$sess_captcha = $_SESSION['randStrn'];

// Если капча введена не верно
if($sess_captcha != $captcha_code){

    echo "Код с картинки введен не верно";
    exit;

}
// Если капча введена верно
else {
    // Проверяем email
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        // Конфигурируем результат
        require_once 'libs/autoload.php';
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.yandex.ru';
        $mail->SMTPAuth = true;
        $mail->Username = 'email';
        $mail->Password = 'пароль';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->CharSet = 'UTF-8';

        $mail->From = 'email';
        $mail->FromName = 'Сообщение с сайта';
        $mail->addAddress('email', $name);

        $mail->WordWrap = 80;
        $mail->Subject = 'Сообщение с сайта портфолио';
        $mail->Body    = $message;

        if($mail->send()){
            echo "OK";
            exit;
        } else {
            echo "Ошибка при отправке сообщения";
            exit;
        }

    } else {

        echo "Не валидный e-mail";
        exit;

    }

}

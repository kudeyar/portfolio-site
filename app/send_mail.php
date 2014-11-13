<?php
session_start();
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$message = htmlspecialchars(strip_tags(trim($_POST['message'])), ENT_QUOTES);
$captcha_code = $_POST['captcha'];
$sess_captcha = $_SESSION['randStrn'];

if($sess_captcha != $captcha_code){

    echo "Код с картинки введен не верно";
    exit;

} else {

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        require_once 'libs/autoload.php';
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.yandex.ru';
        $mail->SMTPAuth = true;
        $mail->Username = 'golomazov-tosha2012@yandex.ru';
        $mail->Password = '6008252913cesar';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->CharSet = 'UTF-8';

        $mail->From = 'golomazov-tosha2012@yandex.ru';
        $mail->FromName = 'Сообщение с сайта';
        $mail->addAddress('golomazov-tosha2012@yandex.ru', $name);

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

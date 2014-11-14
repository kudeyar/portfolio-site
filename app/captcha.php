<?php
// открытие сессии
session_start();
// создаем ресурс из изображения
$img_captcha = imagecreatefromjpeg('images/bg_captcha.jpg');
// создаем объект цвета
$color = imagecolorallocate($img_captcha, 64, 64, 64);
// сглаживания
imageantialias($img_captcha, true);
// устанавливаем количество символов в капче
$numChars = 5;
// гененрируем случайную строку
$randStr = substr(md5(uniqid()), 0 , $numChars);
// занесение случайной строки в сессию
$_SESSION['randStrn'] = $randStr;

// установка позиций, откуда будет начинать рисоваться текст
$x = 20;
$y = 50;
$deltax = 30;
// начинаем отрисовывать картинку
for($i = 0; $i < $numChars; $i++)
{
    // получаем случайный размер текста
    $size = rand(20, 40);
    // получаем случайный угол поворота текста
    $angle = rand(-25, 25);
    // отрисовка картинки
    imagettftext($img_captcha, $size, $angle, $x, $y, $color, 'fonts/bellb.TTF', $randStr[$i]);
    // сдвигаем курсор по координате X
    $x += $deltax;
}
// Выводим изображение на экран и удаляем его из памяти
header('Content-Type: image/jpeg');
imagejpeg($img_captcha, null, 90);
imagedestroy($img_captcha);
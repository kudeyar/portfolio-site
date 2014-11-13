<?php
session_start();
$img_captcha = imagecreatefromjpeg('images/bg_captcha.jpg');
$color = imagecolorallocate($img_captcha, 64, 64, 64);
imageantialias($img_captcha, true); // сглаживания
$numChars = 5;
$randStr = substr(md5(uniqid()), 0 , $numChars);
$_SESSION['randStrn'] = $randStr;

$x = 20;
$y = 50;
$deltax = 30;
for($i = 0; $i < $numChars; $i++)
{
    $size = rand(20, 40);
    $angle = rand(-25, 25);
    imagettftext($img_captcha, $size, $angle, $x, $y, $color, 'fonts/bellb.TTF', $randStr[$i]);
    $x += $deltax;
}
header('Content-Type: image/jpeg');
imagejpeg($img_captcha, null, 70);
imagedestroy($img_captcha);
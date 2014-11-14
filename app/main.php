<?php
// Открываем сессию
session_start();
ob_start();
require_once 'config.php';

// Получаем значение адресной строки
$page = $_GET['page'];
// подключение к БД
$pdo = connectToDB();
$data = array();
switch($page){
    // выводим страницу портфолио
    case 'my-work':
        $data['portfolio'] = getDataAsArray($pdo, $data_sql['getPortfolio']);
        require_once 'my-work.php';
        break;
    // выводим страницу с контактной формой
    case 'contact':
        require_once 'contact-me.php';
        break;
    // выводим страницу админки
    case 'admin':
        require_once 'login.php';
        break;
    // выводим главную страницу
    default:
        $data['title'] = "Сайт веб-дизайнера";
        $data['page'] = "about-me";
        require_once 'index.php';
        break;

}

echo ob_get_clean();
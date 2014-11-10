<?php
session_start();
require_once 'config.php';

$page = $_GET['page'];
$pdo = connectToDB();
switch($page){
    case 'my-work':
        require_once 'my-work.php';
        break;

    default:
        $data['title'] = "Сайт веб-дизайнера";
        $data['page'] = "about-me";
        require_once 'index.php';
        break;

}
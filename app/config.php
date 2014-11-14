<?php
// константы для хранения подключения к БД
define('HOST', 'localhost');
define('USER', 'root');
define('DBNAME', 'portfoliolight');
define('PASSWORD', '');

// массив запросов к БД
$data_sql = array(
    'getPortfolio' => 'SELECT portfolio.id, portfolio.title, portfolio.img, portfolio.url, portfolio.description FROM portfolio'
);

// функция для  получения объекта подключения к БД
function connectToDB(){
    setlocale(LC_CTYPE, array('ru_RU.utf8', 'ru_RU.utf8'));
    setlocale(LC_ALL, array('ru_RU.utf8', 'ru_RU.utf8'));
    $pdo = new PDO("mysql:dbname=".DBNAME.";host=".HOST.";", USER, PASSWORD);
    return $pdo;
}

// универсальная функция для получения данных из БД
function getDataAsArray(PDO $pdo, $sql){
    $result = $pdo->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}
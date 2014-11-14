<?php
require_once 'config.php';

// Название проекта
$projectName = htmlspecialchars(strip_tags(trim($_POST['projectName'])), ENT_QUOTES);
// URL проекта
$projectUrl = trim($_POST['projectUrl']);
// Описание проекта
$projectDesc = $_POST['text'];
// Файл с картинкой
$fileurl = $_POST['fileurl'];

$pdo = connectToDB();
$sql = "INSERT INTO portfolio VALUES(NULL, '$projectName', '$fileurl', '$projectUrl', '$projectDesc')";
// Если все нормально доабвлено в БД
if($pdo->exec($sql)){
    $data = array();
    $data['title'] = $projectName;
    $data['url'] = $projectUrl;
    $data['img'] = $fileurl;
    $data['desc'] = $projectDesc;
    $data['message'] = "ОК";
} else {
    $data['message'] = "Неизвестная ошибка при добавлении проекта в БД";
}
// выводим результат в JSON
json_encode($data);
exit;
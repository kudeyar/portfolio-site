<?php
session_start();
require_once 'config.php';
$pdo = connectToDB();

$login = htmlspecialchars(strip_tags(trim($_POST['login'])), ENT_QUOTES);
$password = md5($_POST['password']);
$sql = "SELECT COUNT(users.id) as cnt FROM users WHERE users.login = '{$login}' AND users.`password` = '{$password}'";
$result = $pdo->query($sql);
$res = $result->fetch(PDO::FETCH_ASSOC);

if($res['cnt'] == 1) {
    $_SESSION['auth'] = true;
    echo "OK";
    exit;
} else {
    echo "NO";
    exit;
}

<?php
session_start();
$_SESSION = array();
unset($_SESSION['auth']);
session_destroy();
header('Location: /');
exit;
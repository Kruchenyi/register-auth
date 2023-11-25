<?php

require dirname(__DIR__) . '/config/config.php';
require CONFIG . '/funcs.php';
require VENDOR . '/autoload.php';
session_start();

use myfrm\Db;

$db = (Db::getInstance())->getConnection();

if (isset($_GET['do']) && $_GET['do'] == 'exit') {
    unset($_SESSION['user']);
    header('Location: register');
}



require INCS . '/router.php';

<?php
session_start();
require_once(__DIR__ . '/../helpers/flash.php');
if (!empty($_GET) && $_GET['register'] == 'ok') {
    flash('register');
}
$jsName = 'homeCtrl';
include_once(__DIR__ . '/../views/templates/headerHome.php');
include(__DIR__ . '/../views/home.php');
include_once(__DIR__ . '/../views/templates/footer.php');

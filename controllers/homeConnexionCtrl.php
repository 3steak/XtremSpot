<?php
session_start();
require_once(__DIR__ . '/../helpers/flash.php');

include_once(__DIR__ . '/../views/templates/header.php');
if (!empty($_GET) && $_GET['register'] == 'ok') {
    flash('register');
}

include(__DIR__ . '/../views/homeConnexion.php');
include_once(__DIR__ . '/../views/templates/footer.php');

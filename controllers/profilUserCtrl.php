<?php
session_start();
require_once(__DIR__ . '/../helpers/flash.php');
require_once(__DIR__ . '/../views/templates/header.php');

if (!empty($_GET) && $_GET['isSent'] == 'ok') {
    flash('formNewContentOk');
}

require(__DIR__ . '/../views/profilUser.php');
require_once(__DIR__ . '/../views/templates/footer.php');

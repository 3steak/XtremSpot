<?php
session_start();
require_once(__DIR__ . '/../helpers/flash.php');
include_once(__DIR__ . '/../views/templates/header.php');
require_once(__DIR__ . '/../session.php');
if (!empty($_GET) && $_GET['update'] == 'ok') {
    flash('updateOk');
}
include(__DIR__ . '/../views/settings.php');
include_once(__DIR__ . '/../views/templates/footer.php');

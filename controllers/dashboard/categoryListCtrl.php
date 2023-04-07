<?php
session_start();
//  if not connected
if ($_SESSION['loggedIn'] != true && $_SESSION['admin'] != true) {
    header('location: /../controllers/homeCtrl.php');
}
$jsName = 'categoryList';
require_once(__DIR__ . '/../../models/category.php');
require_once(__DIR__ . '/../../helpers/flash.php');

try {
    $category = Category::get();
} catch (\Throwable $th) {
    //throw $th;
    $errorMsg = $th->getMessage();
    include_once(__DIR__ . '/../../views/templates/header.php');
    include(__DIR__ . '/../../views/errors.php');
    include_once(__DIR__ . '/../../views/templates/footer.php');
    die;
}
include_once(__DIR__ . '/../../views/templates/header.php');
flash('admin');
include(__DIR__ . '/../../views/dashboard/categoryList.php');
include_once(__DIR__ . '/../../views/templates/footer.php');

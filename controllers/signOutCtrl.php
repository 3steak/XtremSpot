<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['admin']);
unset($_SESSION['loggedIn']);

session_destroy();
header('location: /controllers/homeCtrl.php');

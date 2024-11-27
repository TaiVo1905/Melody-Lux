<?php 
session_start();
require_once './config/config.php';
require_once './config/app.php';
require_once './config/routes.php';
require_once './app/controllers/App.php';
$app = new App();
?>
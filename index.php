<?php 
session_start();

require_once './config/config.php';
require_once './config/routes.php';
header('location: /melody-lux/app/controllers/discoverController.php');
$app = new App();
?>

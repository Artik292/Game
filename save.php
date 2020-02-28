<?php
session_start();
require 'vendor/autoload.php';
require 'connection.php';
$save = new User($db);
$save->load($_SESSION['user_id']);
$a = $_GET['val'];
$save->save();
echo "<script>window.close();</script>";

<?php
session_start();
require 'vendor/autoload.php';
$app = new \atk4\ui\App ('Bank');
$app->initLayout('Centered');
echo $_SESSION["i"];
$modal = $app ->add(['Modal','title'=>'figna']);
$modal -> add(['Text','You lost! Good luck next time']);

if (($_SESSION['t'] <= 10) and ($_SESSION['i'] >= 20)) {
  //$_SESSION['t'] = 0;
  new \atk4\ui\jsExpression('document.location="prize.php"');
//  header('location:prize.php');
}
if ($_SESSION['t'] > 10) {
//  $_SESSION['t'] = 0;
  $_SESSION['i'] = 0;
  $modal -> show();
//  $vp = $app->add('VirtualPage');
//  $vp->add('Text','You lost! Good luck next time');
}

$now = time();

if (!isset($_SESSION['flag'])){
  $_SESSION['timer'] = time();
}

$_SESSION['t'] = $now -$_SESSION['timer'];


 $button = $app ->add(['Button','Touch me','big red']);
//if ($_SESSION['i'] < 20) {
 $button->on('click', function($action) use($button){
   if ($_SESSION['i'] < 20) {

   $_SESSION['i']=$_SESSION['i']+1;
   $_SESSION['flag'] = true;
   $button->set($_SESSION["i"]);
   $button->js()->reload();
   return $action->text($_SESSION['i']);
 }
 });
//}
/*
 $button2 = $app->add('Button');

 $button2->on('click', function ($action){
   $_SESSION['flag'] = true;
   return $action ->text($_SESSION['t']);
 }); */

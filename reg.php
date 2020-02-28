<?php

session_start();

require 'vendor/autoload.php';
require 'connection.php';

$app = new \atk4\ui\App('Artur');
$app->initLayout('Centered');

$form = $app->layout->add('Form');
$form->setModel(new User($db),['nickname','name','surname','email','password']);
$form->buttonSave->set("Создать аккаунт");
$model = new User($db);

$form->onSubmit(function($form) use($model) {
  $nickname = $form->model['nickname'];
  $model->tryLoadby("nickname",$nickname);
  if (isset($model->id)) {
    return new atk4\ui\jsNotify(['content'=>'Nickname already in use.','color'=>'red']);
  } else {
    $form->model->save();
    $model->unload();
    $model->tryLoadBy('nickname',$nickname);
    $_SESSION["user_id"] = $model->id;
    return new \atk4\ui\jsExpression('document.location = "main.php" ');
  }

});

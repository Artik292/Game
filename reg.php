<?php

session_start();

require 'vendor/autoload.php';
require 'connection.php';

$app = new \atk4\ui\App('Artur');
$app->initLayout('Centered');

$form = $app->layout->add('Form');
$form->setModel(new User($db));
$form->buttonSave->set("Создать аккаунт");
$model = new User($db);

$form->onSubmit(function($form) use($model) {
  $nickname = $form->model['nickname'];
  $form->model->save();
  $model->tryLoadBy('nickname',$nickname);
  $_SESSION['nickname'] = $model["nickname"];
  $_SESSION["user_id"] = $model->id;
  $_SESSION['clicker_count'] = 0;
  return new \atk4\ui\jsExpression('document.location = "main.php" ');
});

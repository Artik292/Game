<?php

require 'vendor/autoload.php';
require 'connection.php';

$app = new \atk4\ui\App('Artur');
$app->initLayout('Centered');

$model = new User($db);

$form = $app->add(['Form']);
$form->addField('nickname');
$form->addField('password');
$form->buttonSave->set("Войти");

$form->onSubmit(function($form) use($model) {
  $model->tryLoadby('nickname',$form->model['nickname']);
    if (isset($model->id)) {
      if ($model["password"] == $form->model['password']) {

      } else {
        return new atk4\ui\jsNotify(['content' => 'Wrong input', 'color' => 'red']);
      }
    } else {
      return new atk4\ui\jsNotify(['content' => 'Wrong input', 'color' => 'red']);
    }
});

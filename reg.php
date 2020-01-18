<?php

require 'vendor/autoload.php';
require 'connection.php';

$app = new \atk4\ui\App('Artur');
$app->initLayout('Centered');

$form = $app->layout->add('Form');
$form->setModel(new User($db));
$form->buttonSave->set("Создать аккаунт");

$form->onSubmit(function($form) {
  return new \atk4\ui\jsExpression('document.location = "main.php" ');
});

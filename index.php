<?php

require 'vendor/autoload.php';

$app = new \atk4\ui\App('Artur');
$app->initLayout('Centered');

$clicker_name = $app->add(["Header","Colibri Clicker","huge centered"]);

$button_login = $app->add(["Button","Log in","circular icon blue","icon"=>"power off"]);

$button_login->on('click',  function() {
      return new \atk4\ui\jsExpression("document.location = 'login.php' ");
  });

$button_reg = $app->add(["Button","Registration","green","iconRight"=>"arrow circle right"]);
$button_reg->link('reg.php');

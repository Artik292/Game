<?php
session_start();
require 'vendor/autoload.php';
require 'connection.php';
$app = new \atk4\ui\App('Artur');
$app->initLayout('Centered');

$model = new User($db);
$model->load($_SESSION['user_id']);
$n = $model['clicker_count'];
$model->unload();
$m = 1;

  $columns = $app->add('Columns');
  $col_1 = $columns->addColumn(3);
  $col_2 = $columns->addColumn(10);
  $col_3 = $columns->addColumn(3);

  $clicker = $col_2->add(["Button",$_SESSION["i"],"green fluid big"]);
  $clicker->on('click', function ($m) {
    $_SESSION["i"] = $_SESSION["i"] + 1;
    return $m;
  });










  function Plus($clicker,$model)
  {


    $model->load($_SESSION['user_id']);
    $n = $model['clicker_count'];
    //$n = $n + 1;
    $model['clicker_count'] =  $n;
    $_SESSION['clicker_count'] = $n;
    $model->save();
    return $clicker->js()->text(new \atk4\ui\jsExpression('parseInt([])+1', [$clicker->js()->text()]));

  }

  $label = $col_2->add(["Button",$_SESSION['user_id']]);

  $save = $col_2->add(["Button","Save","blue big"]);

  $save->on('click', function ($m) {
    $_SESSION["i"] = $_SESSION["i"] + 1;
    return $m;
  });

$exit = $app->add(['Button',"Exit","red"]);
$exit->link(["exit"]);

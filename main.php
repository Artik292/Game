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
$a = 10;

  $columns = $app->add('Columns');
  $col_1 = $columns->addColumn(3);
  $col_2 = $columns->addColumn(10);
  $col_3 = $columns->addColumn(3);


    $val = $col_2->add(['FormField/Line', '45']);
    //$val->addAction('Set Custom Value')->js('click', new \atk4\ui\jsReload($val, ['val' => $val->jsInput()->val(new \atk4\ui\jsExpression('parseInt([])+1', [$val->jsInput()->val()]), $val->jsInput()->focus())]));


  $clicker = $col_2->add(["Button","Click!!!","green fluid big"]);
  $clicker->js('click', new \atk4\ui\jsReload($val, ['val' => $val->jsInput()->val(new \atk4\ui\jsExpression('parseInt([])+1234', [$val->jsInput()->val()]), $val->jsInput()->focus())]));


/*
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
  */

  //$label = $col_2->add(["Button",$_SESSION['user_id']]);

  $save = $col_2->add(["Button","Save","blue big"]);



  $save->on('click', function ($m) use($val){
    $_SESSION["i"] = $val->jsInput()->get();
    return $m;
  });

$exit = $app->add(['Button',"Exit","red"]);
$exit->link(["exit"]);














$x2 = $col_3->add(["Button","click x2","massive inverted yellow","icon"=>"france flag"]);

$pus = $col_3->add(["Button","+0.5 cli/sek",]);

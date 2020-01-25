<?php
session_start();
require 'vendor/autoload.php';
$n = 9090;
$app = new \atk4\ui\App('Artur');
$app->initLayout('Centered');

//  $image = $app->add(["Image","https://cs-justplay.com/templates/united/img/vak_ban_v_ks_go_2.png","centered"]);

  $columns = $app->add('Columns');
  $col_1 = $columns->addColumn(3);
  $col_2 = $columns->addColumn(10);
  $col_3 = $columns->addColumn(3);

  $clicker = $col_2->add(["Button","25","green fluid big"]);
  $label = $col_2->add(["Button",$_SESSION['user_id']]);

  $save = $col_2->add(["Button","Save","blue big"]);


  // $b = $app->add(["Button","0"]);
  // $clicker->on('click', function ($b) {
  //     $GLOBALS['n'] = $GLOBALS['n']+1;
  //     return $b->text($GLOBALS['n']);
  // });

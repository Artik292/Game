<?php

require 'vendor/autoload.php';

$app = new \atk4\ui\App('Artur');
$app->initLayout('Centered');

//  $image = $app->add(["Image","https://cs-justplay.com/templates/united/img/vak_ban_v_ks_go_2.png","centered"]);

  $columns = $app->add('Columns');
  $col_1 = $columns->addColumn(3);
  $col_2 = $columns->addColumn(10);
  $col_3 = $columns->addColumn(3);

  $clicker = $col_2->add(["Button","25","green fluid big"]);
  $clicker->on('click', function($clicker) {
    //$clicker->set("Test");
    $reload = new \atk4\ui\jsReload($clicker, [$clicker->name => 'ok']);
    return $clicker->js(true, $reload);
    //$clicker->js()->reload();
    //return new \atk4\ui\jsReload($clicker);
  });

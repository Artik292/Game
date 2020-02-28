<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <script>
    window.onload = function() {
        var click = document.getElementById("clicke");
        var a = "<?=session_start() ?>"
        var val = "<?= $_SESSION['cookie']; ?>";
        console.log(val);
        click.value = val;
    }
    </script>

  </head>
  <body>

  </body>
</html>

<?php
require 'vendor/autoload.php';
require 'connection.php';
$app = new \atk4\ui\App('Artur');
$app->initLayout('Centered');
$user = new User($db);
$user->load($_SESSION['user_id']);
//$user->load(1);
$_SESSION['cookie'] = $user['clicker_count'];
$user->unload();


//$model = new User($db);
//$model->load($_SESSION['user_id']);
//$n = $model['clicker_count'];
//$model->unload();
$m = 1;
$a = 10;

  $columns = $app->add('Columns');
  $col_1 = $columns->addColumn(3);
  $col_2 = $columns->addColumn(10);
  $col_3 = $columns->addColumn(3);


    //$val = $col_2->add(['FormField/Line', '45']);
    //$val->addAction('Set Custom Value')->js('click', new \atk4\ui\jsReload($val, ['val' => $val->jsInput()->val(new \atk4\ui\jsExpression('parseInt([])+1', [$val->jsInput()->val()]), $val->jsInput()->focus())]));


  //$clicker = $col_2->add(["Button","Click!!!","green fluid big"]);
  //$clicker->js('click', new \atk4\ui\jsReload($val, ['val' => $val->jsInput()->val(new \atk4\ui\jsExpression('parseInt([])+1234', [$val->jsInput()->val()]), $val->jsInput()->focus())]));
  $slicer = $col_2->add(['View','template' => new \atk4\ui\Template('
<div id="{$_id}" class="ui statistic">
  <input type="button" id="clicke" value=0 onclick=Clicker() style="width:500px;height:100px;background-color:green;color:white;font-size:35px;">
</div>
<script>
  function Clicker() {
    var click = document.getElementById("clicke");
    click.value = parseInt(click.value) + 1;
  }
</script>')]);
$col_2->add(['ui'=>'hidden divider']);

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

  $save = $col_2->add(['View','template' => new \atk4\ui\Template('
<div id="{$_id}" class="ui statistic">
  <input type="button" value="Save" onclick=Save() style="width:500px;height:100px;background-color:green;color:white;font-size:35px;">
</div>
<script>
  function Save() {
    var click = document.getElementById("clicke");
    var link = \'save.php?val=\'+click.value;
    window.open(link);
  }
</script>')]);
  /*$save->on('click', function ($m) {
    $_SESSION['tmp'] = $
      //['val' => $val->jsInput()->val(new \atk4\ui\jsExpression('parseInt([])+1234', [$val->jsInput()->val()]), $val->jsInput()->focus())]);
  });*/

  /*$save->on('click', function ($m){
    <html>
      <script>
        <?php $num = ?> document.getElementById("clicke").value;<?php ; ?>
      </script>
    </html>
    $_SESSION['WORK!'] = $num;
    return $m;
  });*/

$exit = $app->add(['Button',"Exit","red"]);
$exit->link(["exit"]);














$x2 = $col_3->add(["Button","click x2","massive inverted yellow","icon"=>"france flag"]);

$pus = $col_3->add(["Button","+0.5 cli/sek",]);

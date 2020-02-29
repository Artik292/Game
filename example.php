<?php
require 'vendor/autoload.php';
require 'connection.php';
$app = new \atk4\ui\App('Artur');
$app->initLayout('Centered');


$m = 1;
$a = 10;

  $columns = $app->add('Columns');
  $col_1 = $columns->addColumn(3);
  $col_2 = $columns->addColumn(10);
  $col_3 = $columns->addColumn(3);

  $clicker = $col_2->add(['View','template' => new \atk4\ui\Template('
<div id="{$_id}" class="ui statistic">
  <input type="button" id="clicke" value=1 onclick=Clicker() style="width:500px;height:100px;background-color:green;color:white;font-size:35px;">
</div>
<script>
  function Clicker() {
    var click = document.getElementById("clicke");
    click.value = parseInt(click.value) * 2; 17+5E = 17*10^5
  }
</script>')]);

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

$col_2->add(['ui'=>'hidden divider']);



$exit = $app->add(['Button',"Exit","red"]);
$exit->link(["exit"]);

$x2 = $col_3->add(["Button","click x2","massive inverted yellow","icon"=>"france flag"]);

$pus = $col_3->add(["Button","+0.5 cli/sek",]);

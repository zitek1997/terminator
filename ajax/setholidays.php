<?php
include("config.php");
$events = array();
$sql= "SELECT * FROM holidays";
$eve = $db-> selecto($sql);
print <<<KOD
<div class="modal-right">
<select multiple style='width:100%;height:80%;' id='holToD'>
KOD;
foreach($eve as $e){
  $id = $e['id'];
  $nazwa = $e['title'];
  $dat = $e['start'];
  if($e['repeat']==1){
    $dat = strtotime($dat);
    $d = date('d', $dat);
    $m = date('m', $dat);
    $y = date('Y');
    $dat = $y.'-'.$m.'-'.$d;
  }
  echo '<option value="'.$id.'">'.$nazwa.' '.$dat.'</option>';
}
print <<<KOD
<input type="button" onclick="holDel();" class='btn btn-danger' style='width:100%;' value='Usuń zaznaczone'/>
</div>
KOD;
$n = date("Y-m-d");
print <<<KOD
<div class="modal-left">
  <input type="button" class="btn btn-primary" id="holidate" style='width:100%;' value="$n"/><br><br>
  <input type="text" class="form-control" id="holiname" value="" placeholder="Wpisz nazwę święta"/><br>
  <div class="checkbox checkbox-success">
    <input id="holirep" type="checkbox"><label for="holirep">Święto coroczne</label>
  </div>
  <input type="button" class="btn btn-success" onclick="addHoliday();" value="Dodaj święto"/>
</div>

KOD;


?>

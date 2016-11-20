<?php
include("config.php");
$id=$_POST["id"];
$array = array("idc"=>$id);
$sql = "SELECT * FROM calendar WHERE idc = :idc";
$event = $db->select($sql,$array);
$event = $event[0];

$id = $event['idc'];
$title = $event['title'];
$startdate = $event['startdate'];
$enddate = $event['enddate'];
$desc = $event['opis'];

$sql1="SELECT * FROM services";
$usl=$db->selecto($sql1);

print <<<KOD
<form name='modal'>
Event:<input type="text" name="ev" class="form-control" value="$title"></input><br>
Data rozpoczęcia:<br>
<input type="button" class="btn btn-success" name="startdate" id="startdate" value="$startdate"></input><br>
Data zakończenia:<br>
<input type="button" class="btn btn-success" name="enddate" id="enddate" value="$enddate"></input><br>
Opis:<br><select name="opis">
KOD;
foreach($usl as $key => $svice)
{
  $name=$svice['name'];
  if($nazwa==$desc)
  {
print <<<KOD
<option value="$name" selected>$name</option>
KOD;
  }else{
print <<<KOD
<option value="$name">$name</option>
KOD;
  }
}
print <<<KOD
</select><br>
<input type="hidden" name="id" class="form-control" value="$id" disabled></input>
</form>
KOD;
?>

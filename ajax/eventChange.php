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

$sql1="SELECT * FROM services ORDER BY name ASC";
$usl=$db->selecto($sql1);

print <<<KOD
<form name='modal'>
Event:<input type="text" name="ev" class="form-control" value="$title"></input><br>
Data rozpoczęcia:<br>
<input type="button" class="btn btn-success" name="startdate" id="startdate" value="$startdate"></input><br>
Data zakończenia:<br>
<input type="button" class="btn btn-success" name="enddate" id="enddate" value="$enddate"></input><br>
Usługa:<br>
<select name="cSvc" onchange="cDesc(this);">
<option value="new">Nowa usługa</option>
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
<input type="textarea" name="sDesc" id="seDesc" value="" disabled><br>
<input type="hidden" name="nName" id="neName" value=""><br>
<input type="hidden" name="nDesc" id="neDesc" value=""><br>

</form>
<script>
function cDesc(s)
{
  svc = s.value;
  if(svc=="new")
  {
    getElementById("seDesc").type = "hidden";
    getElementById("neName").type = "text";
    getElementById("neDesc").type = "textarea";
    getElementById("seDesc").value = "";
    getElementById("saWe").onclick = getElementById("saWe").onclick+" crService($id, 1);";
  }
KOD;
foreach($usl as $key => $svice)
{
  $name=$svice['name'];
  $desc=$svice['opis'];
print <<<KOD
if(svc=="$name")
{
  getElementById("seDesc").type = "textarea";
  getElementById("neName").type = "hidden";
  getElementById("neDesc").type = "hidden";
  getElementById("seDesc").value = "$desc";
  getElementById("saWe").onclick = "save();";
}
KOD;
}

print <<<KOD
}
cDesc(document.forms.modal.cSvc);
</script>
KOD;
?>

<?php
include("config.php");
$id=$_POST["id"];

$sql1="SELECT * FROM services ORDER BY name ASC";
$usl=$db->selecto($sql1);
print <<<KOD
<script>
function cDesc(s)
{
  svc = s.value;
  if(svc=="new")
  {
    document.getElementById("sDesc").type = "hidden";
    document.getElementById("nName").type = "text";
    document.getElementById("nDesc").type = "textarea";
    document.getElementById("sDesc").value = "";
    document.getElementById("sservice").onclick = function() {crservice($id);};
  }
KOD;
foreach($usl as $key => $svice)
{
  $name=$svice['name'];
  $desc=$svice['opis'];
print <<<KOD
if(svc=="$name")
{
  document.getElementById("sDesc").type = "textarea";
  document.getElementById("nName").type = "hidden";
  document.getElementById("nDesc").type = "hidden";
  document.getElementById("sDesc").value = "$desc";
  document.getElementById("sservice").onclick = function() {chservice($id);};
}
KOD;
}

print <<<KOD
}
</script>
<form name="eSvc">
Usługa:<br>
<select class="form-control" name="cSvc" onchange="cDesc(this);">
<option value="new" selected>Nowa usługa</option>
KOD;
foreach($usl as $key => $svice)
{
  $name=$svice['name'];
print <<<KOD
<option value="$name">$name</option>
KOD;
}

print <<<KOD
</select><br>
<input class="form-control" type="hidden" name="sDesc" id="sDesc" value="" disabled><br>
<input class="form-control" type="text" name="nName" id="nName" value="" placeholder="Nazwa usługi"><br>
<input class="form-control" type="textarea" name="nDesc" id="nDesc" value="" placeholder="Opis usługi"><br>
</form>
KOD;

?>

<?php
include("config.php");
$id=$_POST["id"];

$sql1="SELECT * FROM services ORDER BY name ASC";
$usl=$db->selecto($sql1);
print <<<KOD
<form name="eSvc">
Usługa:<br>
<select name="cSvc" onchange="cDesc(this);">
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
<input type="hidden" name="sDesc" id="sDesc" value="" disabled><br>
<input type="text" name="nName" id="nName" value=""><br>
<input type="textarea" name="nDesc" id="nDesc" value=""><br>

</form>
<script>
function cDesc(s)
{
  svc = s.value;
  if(svc=="new")
  {
    getElementById("sDesc").type = "hidden";
    getElementById("nName").type = "text";
    getElementById("nDesc").type = "textarea";
    getElementById("sDesc").value = "";
    getElementById("sService").onclick = crService($id);
  }
KOD;
foreach($usl as $key => $svice)
{
  $name=$svice['name'];
  $desc=$svice['opis'];
print <<<KOD
if(svc=="$name")
{
  getElementById("sDesc").type = "textarea";
  getElementById("nName").type = "hidden";
  getElementById("nDesc").type = "hidden";
  getElementById("sDesc").value = "$desc";
  getElementById("sService").onclick = chService($id);
}
KOD;
}

print <<<KOD
}
</script>
KOD;
?>

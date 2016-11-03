<?php
include("config.php");
$sql="SELECT * FROM clients";
$users=$db->selecto($sql);
$l=count($users);
print <<<KOD

KOD;
for($x=0;$x<$l;$x++)
{
  $id = $users[$x]['ID'];
  $text = $users[$x]['LNAME']." ".$users[$x]['FNAME'];
print <<<KOD
<div><button onClick="cEdit('$id');" class="btn btn-primary btn-xs">✎</button></div>
<div class='fc-event'>
<div class="name">

  $text
  </div>
</div>

KOD;
}
print <<<KOD

KOD;
?>

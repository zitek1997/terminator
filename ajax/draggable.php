<?php
include("config.php");
$sql="SELECT * FROM clients";
$users=$db->selecto($sql);
$l=count($users);

for($x=0;$x<$l;$x++)
{
  $id = $users[$x]['ID'];
  $text = $id.". ".$users[$x]['LNAME'];
print <<<KOD
<div class='fc-event'>$text</div>
KOD;
}
?>

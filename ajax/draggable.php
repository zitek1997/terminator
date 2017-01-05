<?php
include("config.php");
$sql="SELECT * FROM clients ORDER BY LNAME ASC";
$users=$db->selecto($sql);
$l=count($users);
print <<<KOD
<div class="draggable-button">
  <div class='fc-event dp-client' id="customEv">
    <div class="name">
      Nowy event
    </div>
  </div>
</div>
KOD;
for($x=0;$x<$l;$x++)
{
  $id = $users[$x]['ID'];
  $text = $users[$x]['LNAME']." ".$users[$x]['FNAME'];
print <<<KOD
<div class="draggable-button">
  <div class='fc-event dp-client' id="$id">
    <div class="name">
      $text
    </div>
  </div>
</div>
KOD;
}
print <<<KOD

KOD;
?>

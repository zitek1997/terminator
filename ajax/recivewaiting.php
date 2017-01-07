<?php
include("config.php");
$sql="SELECT * FROM waiting";
$users=$db->selecto($sql);
$l=count($users);
for($x=0;$x<$l;$x++)
{
  $id = $users[$x]['ID'];
  $text = $users[$x]['LNAME']." ".$users[$x]['FNAME'];
print <<<KOD
<div class="draggable-button">
                <div class='fc-event pending_customer' id="$id">
            <div class="name">
            $text
            </div>
            </div>
            </div>
KOD;
}

?>

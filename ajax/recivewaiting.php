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
        <div style="margin-top: 15px; margin-bottom: 8px;" class="row">
        <div class="col-md-10" style="width:100%">
                <div class='fc-event pending_customer' id="$id">
            <div class="name">
            $text
            </div>
            </div>
            </div>
        </div>
KOD;
}

?>

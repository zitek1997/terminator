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


        
        <div style="margin-top: 15px; margin-bottom: 8px;" class="row">
            <div class="col-md-2 events">
                <button onClick="cEdit('$id');" class="btn btn-primary btn-xs">✎</button>
            </div>
        <div class="col-md-10 events">
                <div class='fc-event' id="$id">
            <div class="name">
            $text
            </div>
            </div>
            </div>
        </div>
KOD;
}
print <<<KOD

KOD;
?>

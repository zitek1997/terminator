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
            <div class="col-md-2">
                <button style="line-height: 2; border: 1px solid #3a87ad; font-size: 12px;" onClick="cEdit('$id');" class="btn btn-primary btn-xs">✎</button>
            </div>
        <div class="col-md-10">
                <div    style="margin: 0px; border: 2px solid #3a87ad; line-height: 2; font-size: 12px;" class='fc-event' id="$id">
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

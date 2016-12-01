<?php
include("config.php");
$timetables=$db->selecto("SELECT * FROM time_tables");

$l=count($timetables);

for($x=0;$x<$l;$x++)
{
  $id = $timetables[$x]['timetab_id'];
  $title = $timetables[$x]['title'];
  $color = $timetables[$x]['color'];
  
print <<<KOD

                    <li><input style="background-color=$color;" type="checkbox" id="$id" name="$title" value="$title"><label for="$id">$title</label></li>      
       

KOD;
}
print <<<KOD

KOD;


 

?>
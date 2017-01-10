<?php
include("config.php");
$tt = $db->selecto("SELECT * FROM time_tables");

foreach($tt as $t){
$id = $t['timetab_id'];
$name = $t['title'];
echo '<option value="'.$id.'">'.$name.'</option>';
}



?>

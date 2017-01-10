<?php
include("config.php");
$tt = $db->selecto("SELECT * FROM users");

foreach($tt as $t){
$id = $t['ID'];
$name = $t['LNAME']." ".$t['FNAME'];
echo '<option value="'.$id.'">'.$name.'</option>';
}



?>

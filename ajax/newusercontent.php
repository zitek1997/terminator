<?php
include("config.php");
$tt = $db->selecto("SELECT * FROM time_tables");

print <<<KOD
<label for="Access">Terminarze:</label>
<select multiple name="emp_access" class="form-control" ng-model="empInfo.access">
KOD;
foreach($tt as $t){
$id = $t['timetab_id'];
$name = $t['title'];
echo '<option value="'.$id.'">'.$name.'</option>';
}
print <<<KOD
</select>
KOD;


?>

<?php
include("config.php");

if (isset($_POST['id']))
{
  $id=$_POST['id'];
  $where = "id = $id";
  $db->delete('users', $where);
}

$sql="SELECT * FROM users";
$users=$db->selecto($sql);
$l=count($users);



print <<<KOD
<form method="POST" action="deleteuser.php">
<select name="id">
KOD;
for($x=0;$x<$l;$x++)
{
  $id = $users[$x]['ID'];
  $text = $id.". ".$users[$x]['FNAME']." ".$users[$x]['LNAME'];
print <<<KOD
<option value="$id">$text</option>
KOD;
}
print <<<KOD
</select>
<input type="submit" value="delete"></input>
</form>
KOD;
?>

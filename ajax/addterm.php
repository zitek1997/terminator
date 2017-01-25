<?php
include("config.php");
$data = json_decode(file_get_contents("php://input"));
$name = $data->name;
$color = $data->color;
$access =  $data->access;
$id=$_SESSION['uid'];

  $array=array(
          'timetab_id' => $name.$id,
          'title' => $name,
          'color' => $color,
        );
  $db->insert('custom_tables', $array);
print_r($array);
  $array2=array(
          'user_id' => $access,
          'timetab_id' => $name.$id,
        );
  $db->insert('tt_access', $array2);
print_r($array2);


?>

<?php
include('config.php');
$id = $_POST['id'];
$where = 'timetab_id = "'.$id.'"';
if(is_numeric($id)){
  $db->delete('time_tables',$where);
}else{
  $db->delete('custom_tables',$where);
}
$db->deleteALL('calendar',$where);
$db->deleteALL('tt_access',$where);
$_SESSION['timetab_id'] = 0;
?>

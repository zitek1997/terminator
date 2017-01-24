<?php
include("config.php");
$ids = $_POST['ids'];
$sql = "id IN ($ids)";
$db->deleteALL('holidays',$sql);
?>

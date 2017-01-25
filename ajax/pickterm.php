<?php
session_start();
$_SESSION['timetab_id']=explode(',',$_POST['ids']);
print_r($_SESSION['timetab_id']);
?>

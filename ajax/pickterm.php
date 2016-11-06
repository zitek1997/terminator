<?php
session_start();
$_SESSION['timetab_id']=$_POST['id'];
echo $_SESSION['timetab_id'];
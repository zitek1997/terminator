<?php
session_start();
$uid=$_SESSION['uid'];
$login=$_SESSION['login'];
$imie=$_SESSION['imie'];
$nazwisko=$_SESSION['nazwisko'];
$email=$_SESSION['email'];
$phone=$_SESSION['phone'];

print <<<KOD

   $imie $nazwisko<br>
   $email  $phone
KOD;
?>
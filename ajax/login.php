<?php
include("conf.php");
// $login=$_POST['login'];
// $pass=$_POST['pass'];
$array=array("LOGIN"=>$login);
$sql="SELECT * FROM users WHERE LOGIN = :LOGIN";
$usr=$db->select($sql, $array);
$x=count($usr);
if($x==1)
{
  $usr=$usr[0];
  $CS=$usr['C_S'];
  $pass0=md5($pass);
  $pass0=$pass0.$CS;
  $pass0=md5($pass0);
  $pwd=$usr['PASS'];
  if ($pwd==$pass0)
  {
    $_SESSION['uid']=$usr['ID'];
    $_SESSION['login']=$usr['LOGIN'];
    $_SESSION['imie']=$usr['IMIE'];
    $_SESSION['nazwisko']=$usr['NAZWISKO'];
    $_SESSION['idp']=$usr['ID_P'];
  }
}else{
  $_SESSION['logerr']=1;
}
?>

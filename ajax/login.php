<?php
include("config.php");
// $login=$_POST['login'];
// $pass=$_POST['pass'];

$data = json_decode(file_get_contents("php://input"));
$con = mysqli_connect('sql.itcave.nazwa.pl','itcave_2','Perseusz20^!','itcave_2');
$login = mysqli_real_escape_string($con, $data->login);
$pass = mysqli_real_escape_string($con, $data->pass);

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
    $_SESSION['imie']=$usr['FNAME'];
    $_SESSION['nazwisko']=$usr['LNAME'];
    $_SESSION['email']=$usr['EMAIL'];
    $_SESSION['phone']=$usr['PHONE'];
  }
}else{
  $_SESSION['logerr']=1;
}

print_r($_SESSION['uid']);
print_r($_SESSION['login']);
print_r($_SESSION['imie']);
print_r($_SESSION['nazwisko']);
print_r($_SESSION['email']);
print_r($_SESSION['phone']);
?>

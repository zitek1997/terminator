<?php
include("config.php");
$_SESSION['logerr']=0;
$data = json_decode(file_get_contents("php://input"));
// $con = mysqli_connect('sql.itcave.nazwa.pl','itcave_2','Perseusz20^!','itcave_2');
// $login = mysqli_real_escape_string($con, $data->login);
// $pass = mysqli_real_escape_string($con, $data->pass);

$login=$data->login;
$pass=$data->pass;

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
    $_SESSION['timetab_id']= 0;
    if($usr['admin']==1){
      $_SESSION['admin']=TRUE;
    }else{
      $_SESSION['admin']=FALSE;
    }
  }else{
    $_SESSION['logerr']=2;
  }
}else{
  $_SESSION['logerr']=1;
}
echo $_SESSION['logerr'];
?>

<?php
include("conf.php");

$con = mysqli_connect('sql.itcave.nazwa.pl','itcave_2','Perseusz20^!','itcave_2');
//$login=$_POST['mail'];
//$pass=$_POST['pass'];
//$imie=$_POST['imie'];
//$nazw=$_POST['nazwisko'];

$data = json_decode(file_get_contents("php://input")); 
$fname = mysqli_real_escape_string($con, $data->fname);
$lname = mysqli_real_escape_string($con, $data->lname);
$login = mysqli_real_escape_string($con, $data->login);
$pass = mysqli_real_escape_string($con, $data->pass);
$email = mysqli_real_escape_string($con, $data->email);
$phone = mysqli_real_escape_string($con, $data->phone);

if (isset($_POST['przychodnia']))
{
  $idp=$_POST['przychodnia'];
}else{
  $idp=NULL;
}
$a=strlen($login);
$b=date('U');
$CS=$a.$lname.$login.$fname.$b;
$CS=md5($CS);
$pass=md5($pass);
$pass=$pass.$CS;
$pass=md5($pass);

$_SESSION['regerr']=0;
$array=array("LOGIN"=>$login);
$sql="SELECT * FROM users WHERE LOGIN = :LOGIN";
$usr=$db->select($sql, $array);
$l0=count($usr);
if ($l0 != 0)
{
  $_SESSION['regerr']=1;
}
else
{
  $array=array(
          'LOGIN' => $login,
          'PASS' => $pass,
          'C_S' => $CS,
          'FNAME' => $fname,
          'LNAME' => $lname,
          'EMAIL' => $email,
          'PHONE' => $phone,
        );
  if($db->insert('users', $array)!=1)
  {
    $_SESSION['regerr']=2;
  }
}
echo $_SESSION['regerr'];
?>

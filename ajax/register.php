<?php
include("config.php");

$data = json_decode(file_get_contents("php://input"));
$fname = $data->fname;
$lname = $data->lname;
$login = $data->login;
$pass = $data->pass;
$email =  $data->email;
$phone = $data->phone;

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

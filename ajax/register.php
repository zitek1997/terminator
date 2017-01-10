<?php
include("config.php");

$data = json_decode(file_get_contents("php://input"));
$fname = $data->fname;
$lname = $data->lname;
$login = $data->login;
$pass = $data->pass;
$email =  $data->email;
$phone = $data->phone;
$access = $data->access;
// $color = $data->color;
$color = "#0f0f0f";
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
  }else{
    $array=array("LOGIN"=>$login);
    $sql="SELECT * FROM users WHERE LOGIN = :LOGIN";
    $usr=$db->select($sql, $array);
    $id = $usr[0]['ID'];
    $terms = array();
    foreach ($access as $a){
      $arr = array(
        "user_id" => $id,
        "timetab_id" => $a,
      );
      $db->insert('tt_access', $arr);
    }
    $arr = array(
      "user_id" => $id,
      "timetab_id" => $id,
    );
    $db->insert('tt_access', $arr);

    $arr = array(
      "title" => $login,
      "timetab_id" => $id,
      "color" => $color,
    );
    $db->insert('time_tables', $arr);
  }

}
// echo $_SESSION['regerr'];
?>

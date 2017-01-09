<?php
include("config.php");
$data = json_decode(file_get_contents("php://input"));
$fname = $data->fname;
$lname = $data->lname;
$email =  $data->email;
$phone = $data->phone;
// $adres = $data->adres;

// $fname = "Damian";
// $lname = "Majewski";
// $email =  "mail@mail.com";
// $phone = "000-111-222";
// $adres = "Zawady";


$_SESSION['regerr']=0;
$array=array("TEL"=>$phone);
$sql="SELECT * FROM clients WHERE TEL = :TEL";
$usr=$db->select($sql, $array);
$l0=count($usr);
if ($l0 != 0)
{
  $_SESSION['regerr']=1;
}
else
{
  $array=array(
          'FNAME' => $fname,
          'LNAME' => $lname,
          'TEL' => $phone,
          'EMAIL' => $email,
          // 'ADRES' => $adres,
        );
  if($db->insert('clients', $array)!=1)
  {
    $_SESSION['regerr']=2;
  }
}

?>

<?php
include("config.php");
$wrk = $db->selecto("SELECT * FROM users");
foreach ($wrk as $key => $val) {
  if($val['ID']!=$_SESSION['uid']){
    $id = $val['ID'];
    $login = $val['LOGIN'];
    $imie = $val['FNAME'];
    $nazwisko = $val['LNAME'];
    $name = $nazwisko.' '.$imie;
    $email = $val['EMAIL'];
    $tel = $val['PHONE'];
    $adm = $val['admin'];
    if($adm == 1){
      $adm = '<li class="dropdown-header">ADMINISTRATOR</li><li class="divider"></li>';
    }
print <<<KOD
 <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">$name</button>
  <ul class="dropdown-menu">
    $adm
    <li class="dropdown-header">Imię i nazwisko</li>
    <li>$imie $nazwisko</li>
    <li class="dropdown-header">Email</li>
    <li>$email</li>
    <li class="dropdown-header">Numer tel.</li>
    <li>$tel</li>
    <li class="divider"></li>
    <li class="btn btn-primary" onclick="wEdit($id)">Edytuj pracownika</li>
  </ul>
</div>

KOD;
  }
}

?>

<?php
include("config.php");
$arr = array("ID" => $_POST['id']);
$sql = "SELECT * FROM users WHERE ID = :ID";
$usr = $db->select($sql,$arr);
$val = $usr[0];

$id = $val['ID'];
$login = $val['LOGIN'];
$imie = $val['FNAME'];
$nazwisko = $val['LNAME'];
$name = $nazwisko.' '.$imie;
$email = $val['EMAIL'];
$tel = $val['PHONE'];
$adm = $val['admin'];
if($adm == 1){
  $ch = "checked";
}else{
  $ch = '';
}
print <<<KOD
<div class="material-switch pull-right">Administrator&nbsp<input id="wAdmin" name="editMode" type="checkbox" $ch><label for="wAdmin" class="label-success"></label></div><br>
Login: $login<br>
Imię:
<input type="text" class="form-control" id="wFName" value="$imie" placeholder="Wpisz imię"/><br>
Nazwisko:<br>
<input type="text" class="form-control" id="wLName" value="$nazwisko" placeholder="Wpisz nazwisko"/><br>
email:<br>
<input type="text" class="form-control" id="wMail" value="$email" placeholder="Wpisz email"/><br>
Numer telefonu:<br>
<input type="text" class="form-control" id="wPhone" value="$tel" placeholder="Wpisz numer telefonu"/><br>
<cebter>
<input type="button" class="btn btn-success" value="Aktualizuj dane" onclick="wUpdate($id);"/>
KOD;
?>

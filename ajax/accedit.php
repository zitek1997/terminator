<?php
include("config.php");
$id = $_SESSION['uid'];
$login = $_SESSION['login'];
$imie = $_SESSION['imie'];
$nazwisko = $_SESSION['nazwisko'];
$mail = $_SESSION['email'];
$tel = $_SESSION['phone'];

print <<<KOD
<div id="DOsobowe">
DANE OSOBOWE:<br>
Imię:<br>
<input type="text" class="form-control" id="myFName" value="$imie" placeholder="Wpisz imię"/><br>
Nazwisko:<br>
<input type="text" class="form-control" id="myLName" value="$nazwisko" placeholder="Wpisz nazwisko"/><br>
email:<br>
<input type="text" class="form-control" id="myMail" value="$mail" placeholder="Wpisz email"/><br>
Numer telefonu:<br>
<input type="text" class="form-control" id="myPhone" value="$tel" placeholder="Wpisz numer telefonu"/><br>
<input type="button" class="btn btn-success" value="Aktualizuj dane" onclick="accUpdate();"/>
</div>
<div id="DLogowania">
DANE LOGOWANIA:<br>
Login:<br>
<input type="text" class="form-control" id="myLogin" value="$login" disabled/><br>
Zmiana hasła:<br>
Stare hasło:<input type="password" class="form-control" id="myPass" placeholder="Wpisz dotychczasowe hasło"/><br>
Nowe hasło:<input type="password" class="form-control" id="newPass" placeholder="Wpisz nowe hasło"/><br>
Powtórz hasło:<input type="password" class="form-control" id="cnewPass" placeholder="Potwierdź nowe hasło"/><br>
<input type="button" class="btn btn-success" value="Zmień hasło" onclick="passUpdate();"/>
<input type="hidden" id="myId" value="$id" disabled/>
</div>
KOD;

?>

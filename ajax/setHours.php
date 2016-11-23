<?php
include("config.php");
$hours=$db->selecto("SELECT * FROM hours");
$pno = $hours[0]['open'];
$pnc = $hours[0]['close'];
$wto = $hours[1]['open'];
$wtc = $hours[1]['close'];
$sro = $hours[2]['open'];
$src = $hours[2]['close'];
$czo = $hours[3]['open'];
$czc = $hours[3]['close'];
$pto = $hours[4]['open'];
$ptc = $hours[4]['close'];
$sbo = $hours[5]['open'];
$sbc = $hours[5]['close'];

print <<<KOD

<form name="whours">
PONIEDZIAŁEK:<br>
OD:<input type="button" class="btn btn-success" name="pno" id="pno" value="$pno"/>&nbsp
DO:<input type="button" class="btn btn-success" name="pnc" id="pnc" value="$pnc"/><br><br>
WTOREK:<br>
OD:<input type="button" class="btn btn-success" name="wto" id="wto" value="$wto"/>&nbsp
DO:<input type="button" class="btn btn-success" name="wtc" id="wtc" value="$wtc"/><br><br>
ŚRODA:<br>
OD:<input type="button" class="btn btn-success" name="sro" id="sro" value="$sro"/>&nbsp
DO:<input type="button" class="btn btn-success" name="src" id="src" value="$src"/><br><br>
CZWARTEK:<br>
OD:<input type="button" class="btn btn-success" name="czo" id="czo" value="$czo"/>&nbsp
DO:<input type="button" class="btn btn-success" name="czc" id="czc" value="$czc"/><br><br>
PIĄTEK:<br>
OD:<input type="button" class="btn btn-success" name="pto" id="pto" value="$pto"/>&nbsp
DO:<input type="button" class="btn btn-success" name="ptc" id="ptc" value="$ptc"/><br><br>
SOBOTA:<br>
OD:<input type="button" class="btn btn-success" name="sbo" id="sbo" value="$sbo"/>&nbsp
DO:<input type="button" class="btn btn-success" name="sbc" id="sbc" value="$sbc"/>
</form>

KOD;
?>

<?php
include("config.php");
$pno = $_POST["pno"];
$pnc = $_POST["pnc"];
$wto = $_POST["wto"];
$wtc = $_POST["wtc"];
$sro = $_POST["sro"];
$src = $_POST["src"];
$czo = $_POST["czo"];
$czc = $_POST["czc"];
$pto = $_POST["pto"];
$ptc = $_POST["ptc"];
$sbo = $_POST["sbo"];
$sbc = $_POST["sbc"];

$array = array(
  "open" => $pno,
  "close" => $pnc,
);
$where = "id = 1";
$db->update('hours',$array,$where);

$array = array(
  "open" => $wto,
  "close" => $wtc,
);
$where = "id = 2";
$db->update('hours',$array,$where);

$array = array(
  "open" => $sro,
  "close" => $src,
);
$where = "id = 3";
$db->update('hours',$array,$where);

$array = array(
  "open" => $czo,
  "close" => $czc,
);
$where = "id = 4";
$db->update('hours',$array,$where);

$array = array(
  "open" => $pto,
  "close" => $ptc,
);
$where = "id = 5";
$db->update('hours',$array,$where);

$array = array(
  "open" => $sbo,
  "close" => $sbc,
);
$where = "id = 6";
$db->update('hours',$array,$where);

?>

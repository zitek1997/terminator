<?php
include("config.php");
$now = strtotime("now");
$nowo = date("Y-m-d H:i:s", $now);
$array = array(
  "startdate" => "'".$nowo."'",
  "timetab_id" => $_SESSION['timetab_id'],
);
$sql = "SELECT * FROM calendar WHERE startdate > :startdate AND timetab_id = :timetab_id ORDER BY startdate ASC";
$evs=$db->select($sql, $array);
$freetimes = array();
foreach($evs as $key => $ev)
{
  if($key!=0)
  {
    $first = $evs[$key-1]['enddate'];
    $snd = $ev['startdate'];
    $firsto = strtotime($first);
    $firsto = strtotime("+5minutes", $firsto);
    $sndo = strtotime($snd);
    if($sndo - $firsto > 0)
    {
      $freetimes[$key] = $first;
    }
  }else{
    $first = $nowo;
    $snd = $ev['startdate'];
    $firsto = strtotime("+5minutes", $now);
    $sndo = strtotime($snd);
    if($sndo - $firsto > 0)
    {
      $freetimes[$key] = $nowo;
    }
  }
}

foreach($freetimes as $free)
{
  $free = strtotime($free);
  $free = strtotime("Y-m-d H:i",$free);
print <<<KOD
<div class="termlist_in" style="background-color:#CDDC39;" onclick="gotofree($free)">$free</div>
KOD;
}

?>

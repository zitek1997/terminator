<?php
include("config.php");
$now = strtotime("now");
$nowo = date("T-m-d H:i", $now);
$array = array(
  "startdate" => "'".$nowo."'",
  "timetab_id" => $_SESSION['timetab_id'],
);
$sql = "SELECT * FROM calendar WHERE startdate > :startdate AND timetab_id = :timetab_id ORDER BY startdate ASC";
$evs=$db-select($sql, $array);
foreach($evs as $key => $ev)
{
  if($key!=0)
  {
    $first = $evs[$key-1]['enddate'];
    $snd = $ev['startdate'];
    $firsto = strtotime("+5minutes", $first);
    $sndo = strtotime($snd);
    if($sndo - $firsto > 0)
    {
      $freetimes[$key] = $snd;
    }
  }else{
    $first = $nowo;
    $snd = $ev['startdate'];
    $firsto = strtotime("+5minutes", $first);
    $sndo = strtotime($snd);
    if($sndo - $firsto > 0)
    {
      $freetimes[$key] = $snd;
    }
  }
}

foreach($freetimes as $free)
{
print <<<KOD
<div class="termlist_in" style="background-color:#CDDC39;" onclick="gotofree($free)">$free</div>
KOD;
}

?>

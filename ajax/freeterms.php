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
$quo=count($evs);
for($key=0;$key<$quo;$key++)
{
  if($key!=0 && $key!=$quo-1)
  {
    $first = $evs[$key-1]['enddate'];
    $snd = $evs[$key]['startdate'];
    $firsto = strtotime($first);
    $firsto = strtotime("+5minutes", $firsto);
    $sndo = strtotime($snd);
    if($sndo - $firsto > 0)
    {
      if($firsto>$now)
      {
        $freetimes[$key] = $first;
      }
    }
  }else if($key==$quo-1){
    $endo = $evs[$key]['enddate'];
    $freetimes[$key] = $endo;
  }else if($key==0){
    $first = $nowo;
    $snd = $evs[$key]['startdate'];
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
  $freeo = strtotime($free);
  $freez = date("Y-m-d H:i", $freeo);
print <<<KOD
<div class="termlist_in" style="background-color:#000000;" onclick="gotofree('$free')">$freez</div>
KOD;
}

?>

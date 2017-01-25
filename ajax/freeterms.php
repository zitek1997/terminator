<?php
include("config.php");
$now = strtotime("now");
$nowo = date("Y-m-d H:i:s", $now);
$timetabs = "";
foreach ($_SESSION['timetab_id'] as $key => $value) {
  if($key == 0){
    $timetabs = $value;
  }else{
    $timetabs +=",".$value;
  }
}
$array = array(
  "startdate" => "'".$nowo."'",
);
$sql = "SELECT * FROM calendar WHERE startdate > :startdate AND timetab_id IN ($timetabs) ORDER BY startdate ASC";
$evs=$db->select($sql, $array);
$freetimes = array();
$quo=count($evs);
for($key=0;$key<$quo;$key++)
{
  if($key!=0)
  {
    $first = $evs[$key-1]['enddate'];
    $snd = $evs[$key]['startdate'];
    $firsto = strtotime($first);
    $firsto = strtotime("+5 minutes", $firsto);
    $sndo = strtotime($snd);
    if($sndo - $firsto > 0)
    {
      if($firsto>$now)
      {
        $freetimes[$key] = $first;
      }
    }
    if($key==$quo-1)
    {
      $endo = $evs[$key]['enddate'];
      if(strtotime($endo)>strtotime("now")){
        $freetimes[$key+1] = $endo;
      }
    }
  }else if($key==0)
  {
    $snd = $evs[$key]['startdate'];
    $firsto = strtotime("+5 minutes", $now);
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

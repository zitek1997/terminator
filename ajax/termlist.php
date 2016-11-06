<?php
include("config.php");
   $id=$_SESSION['uid'];

   $_SESSION['listerr']=0;
$array=array("user_id"=>$id);
$sql="SELECT timetab_id FROM tt_access WHERE user_id = :user_id";
$usr=$db->select($sql, $array);
$l0=count($usr);
if ($l0 != 0)
{
  for ($x=0;$x<$l0;$x++)
  {
    if($x==0)
    {
      $usr1="(".$usr[$x]['timetab_id'];
    }else{
      $usr1=$usr1.", ".$usr[$x]['timetab_id'];
      if($x==$l0-1)
      {
        $usr1=$usr1.")";
      }
    }
  }
  $sql="SELECT * FROM time_tables WHERE timetab_id IN $usr1";
  $usr=$db->selecto($sql);

}
else
{
  $_SESSION['listerr']=1;
}

$l=count($usr);
print <<<KOD

KOD;
for($x=0;$x<$l;$x++)
{
  $id = $usr[$x]['timetab_id'];
  $title = $usr[$x]['title'];
  $color = $usr[$x]['color'];
  
print <<<KOD

    <li style="background-color:$color" onClick="newFetch('$id');"><a href="#">$title</a></li>

KOD;
}
print <<<KOD

KOD;

?>

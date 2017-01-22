<?php
include("config.php");
   $id=$_SESSION['uid'];

   $_SESSION['listerr']=0;
   if($_SESSION['admin']==false){
     $array=array("user_id"=>$id);
     $sql="SELECT timetab_id FROM tt_access WHERE user_id = :user_id";
     $usr=$db->select($sql, $array);
   }else{
     $sql="SELECT timetab_id FROM tt_access";
     $usr=$db->selecto($sql);
   }
   $usr1 = "";
   $usr2 = "";
   foreach($usr as $u){
     $nr = $u["timetab_id"];
     if(is_numeric($nr)){
       if($usr1 == ""){
         $usr1 = $nr;
       }else{
         $usr1 = $usr1.",".$nr;
       }
     }else{
       if($usr2 == ""){
         $usr2 = "'".$nr."'";
       }else{
         $usr2 = $usr2.",'".$nr."'";
       }
     }
   }
  $sql1="SELECT * FROM time_tables WHERE timetab_id IN ($usr1)";
  $usrs1=$db->selecto($sql1);
  $sql2="SELECT * FROM custom_tables WHERE timetab_id IN ($usr2)";
  $usrs2=$db->selecto($sql2);

  $usr = array_merge($usrs1,$usrs2);



$l=count($usr);
if($_SESSION['admin'] == TRUE){
  echo '<div class="termlist_in" style="background-color:#aa2727" onClick="pickTerm(\'all\');">Wszystkie</div>';
}
for($x=0;$x<$l;$x++)
{
  $id = $usr[$x]['timetab_id'];
  $title = $usr[$x]['title'];
  $color = $usr[$x]['color'];

print <<<KOD
<div class="termlist_in" style="background-color:$color" onClick="pickTerm($id);">$title</div>
KOD;
}
?>

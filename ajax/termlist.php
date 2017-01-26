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
$aterms = $_SESSION['timetab_id'];
if($_SESSION['admin'] == TRUE){
  echo '<div class="termlist_in" style="background-color:#aa2727" onclick="selectAllTerms();">Zaznacz/odznacz wszystkie</div>';
}
for($x=0;$x<$l;$x++)
{
  $id = $usr[$x]['timetab_id'];
  $title = $usr[$x]['title'];
  $color = $usr[$x]['color'];
  if(in_array($id, $aterms)){
    $ch = "checked";
  }else{
    $ch = "";
  }
  if($_SESSION['admin'] == TRUE){
    $alldel = "&nbsp<a style=\"color:red;\" onclick=\"termDel('$id');\">✘</a>";
  }else{
    $alldel = "";
  }
  if(is_numeric($id)){
    if($id != 0){
print <<<KOD
<div class="termlist_in btn-group"  data-toggle="buttons">
            <input type="termcheck" value="$id" autocomplete="off" name="terminarzyk" onchange="selectTerm();" $ch/>
        <p class="termbtn_p">$title</p>
        </div>
KOD;
    }else{
print <<<KOD
<div class="termlist_in" style="background-color:$color"><input type="checkbox" value="$id" name="terminarzyk" onchange="selectTerm();" $ch/>$title</div>
KOD;
    }
  }else{
print <<<KOD
<div class="termlist_in" style="background-color:$color"><input type="checkbox" value="$id" name="terminarzyk" onchange="selectTerm();" $ch/>$title$alldel</div>
KOD;
  }
}
?>

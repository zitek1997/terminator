<?php
include("config.php");
$id=$_POST["id"];
$array = array("id"=>$id);
$sql = "SELECT * FROM calendar WHERE id = :id";
$event = $db->select($sql,$array);
$event = $event[0];

$id = $event['id'];
$idc = $event['idc'];
$title = $event['title'];
$startdate = $event['startdate'];
$enddate = $event['enddate'];
$desc = $event['opis'];
if($event["NOTI"]==1){
  $NOTI = "checked";
}else{
  $NOTI = "";
}
if($event["SMS"]==1){
  $SMS = "checked";
}else{
  $SMS = "";
}
if($event["EMAIL"]==1){
  $EMAIL = "checked";
}else{
  $EMAIL = "";
}
if ($idc == "customEv"){
  $sql1="SELECT * FROM services ORDER BY name ASC";
  $usl=$db->selecto($sql1);

print <<<KOD
  <form name='modal'>
  Event:<input type="text" name="ev" class="form-control" value="$title"></input><br>
  Data rozpoczęcia:<br>
  <input type="button" class="btn btn-success" name="startdate" id="startdate" value="$startdate"></input><br>
  Data zakończenia:<br>
  <input type="button" class="btn btn-success" name="enddate" id="enddate" value="$enddate"></input><br>
  Opis:<br>
  <input class="form-control" type="textarea" name="cSvc" id="cSvc" value="$desc"/><br>
  <input type="hidden" name="id" value="$id"><br>
  </form>
KOD;
}else{
  $sql1="SELECT * FROM services ORDER BY name ASC";
  $usl=$db->selecto($sql1);

print <<<KOD
  <form name='modal'>
  <div class="modal-timer">
  <div class="modal-timer-left">
  <p class="modal-timer-p" style="float: right;">Data rozpoczęcia:</p>
  <input style="float: right;" type="button" class="btn btn-success" name="startdate" id="startdate" value="$startdate"></input>
  </div>
  <div class="modal-material"></div>
  <div class="modal-timer-right">
  <p class="modal-timer-p">Data zakończenia:</p>
  <input type="button" class="btn btn-success" name="enddate" id="enddate" value="$enddate"></input>
  </div>
  </div>
  <div class="modal-left">
  <p>Event:</p><input type="text" name="ev" class="form-control" value="$title"></input><br>
  <div style="border-top: 2px solid #ececec; padding-top: 7%;">
  Powiadomienie:
  <div class="material-switch pull-right">
  <input id="someSwitchOptionSuccess" name="someSwitchOption001" type="checkbox" $NOTI>
  <label for="someSwitchOptionSuccess" class="label-success"></label>
  </div>
  <div class="checkbox checkbox-success">
  <input id="checkbox3" type="checkbox" $SMS>
  <label for="checkbox3">
  SMS
  </label>
  </div>
  <div class="checkbox checkbox-success">
  <input id="checkbox4" type="checkbox" $EMAIL>
  <label for="checkbox4">
  E-mail
  </label>
  </div>
  </div>
  </div>
  <div class="modal-right">
  <p>Usługa:</p>
  <select class="form-control" name="cSvc" onchange="cDesc(this);">
  <option value="new">Nowa usługa</option>
KOD;

  foreach($usl as $key => $svice)
  {
    $name=$svice['name'];
    if($name==$desc)
    {
print <<<KOD
  <option value="$name" selected>$name</option>
KOD;
    }else{
print <<<KOD
  <option value="$name">$name</option>
KOD;
    }
  }
print <<<KOD
  </select><br>
  <input class="form-control" type="textarea" name="sDesc" id="seDesc" value="" disabled><br>
  <input class="form-control" type="hidden" name="nName" id="neName" value="" placeholder="Nazwa usługi"><br>
  <input class="form-control" type="hidden" name="nDesc" id="neDesc" value="" placeholder="Opis usługi"><br>
  <input type="hidden" name="id" value="$id"><br>
  </div>
  </form>
  <script>
  function cDesc(s)
  {
    svc = s.value;
    if(svc=="new")
    {
      document.getElementById("seDesc").type = "hidden";
      document.getElementById("neName").type = "text";
      document.getElementById("neDesc").type = "textarea";
      document.getElementById("seDesc").value = "";
      document.getElementById("sawe").onclick = function() {save(); crservice($id, 1);};
    }
KOD;
  foreach($usl as $key => $svice)
  {
    $name=$svice['name'];
    $desc=$svice['opis'];
print <<<KOD
  if(svc=="$name")
  {
    document.getElementById("seDesc").type = "textarea";
    document.getElementById("neName").type = "hidden";
    document.getElementById("neDesc").type = "hidden";
    document.getElementById("seDesc").value = "$desc";
    document.getElementById("sawe").onclick = function() {save();};
  }
KOD;
  }

print <<<KOD
  }
  cDesc(document.forms.modal.cSvc);
  </script>
KOD;
}

?>

<?php
include('ajax/config.php');
// include('ajax/confi.php');

$type = $_POST['type'];
// $type='fetch';

if($type == 'new')
{
	$startdate = $_POST['startdate'];
	$startdate = strtotime($startdate);
	$enddate = strtotime("+1 hour", $startdate);
	$notidate = strtotime("-24 hours", $startdate);
	$startdate = date("Y-m-d H:i:s",$startdate);
	$enddate = date("Y-m-d H:i:s",$enddate);
	$notidate =date("Y-m-d H:i:s",$notidate);
	$title = $_POST['title'];
	$idc = $_POST['idc'];
  $timetab_id = $_SESSION['timetab_id'];
	$array = array(
		"title" => $title,
		"startdate" => $startdate,
		"enddate" => $enddate,
		"allDay" => "false",
		"opis" => " ",
    "timetab_id" => $timetab_id,
		"idc" => $idc,
		"noti_date" => $notidate,
	);
	$db->insert('calendar', $array);
	$lastId = $db->lastInsertId();
	echo json_encode(array('status'=>'success','eventid'=>$lastId, 'enddate'=>$enddate));
}

if($type == 'change')
{
	$eventid = $_POST['eventid'];
	$title = $_POST['title'];
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$startdate = strtotime($startdate);
	$enddate = strtotime($enddate);
	$notidate = strtotime("-24 hours", $startdate);
	$startdate = date("Y-m-d H:i:s",$startdate);
	$enddate = date("Y-m-d H:i:s",$enddate);
	$notidate =date("Y-m-d H:i:s",$notidate);
	$opis = $_POST['opis'];
	$array = array(
		'title' => $title,
		'startdate' => $startdate,
		'enddate' => $enddate,
		'opis' => $opis,
		"noti_date" => $notidate,
	);
	$where = "id = $eventid";
	$update = $db->update('calendar', $array, $where);
	if($update == 1)
		{echo json_encode(array('status'=>'success'));}
	else
		{echo json_encode(array('status'=>'failed'));}
}

if($type == 'resetdate')
{
	$title = $_POST['title'];
	$startdate = $_POST['start'];
	$enddate = $_POST['end'];
	$startdate = strtotime($startdate);
	$enddate = strtotime($enddate);
	$notidate = strtotime("-24 hours", $startdate);
	$startdate = date("Y-m-d H:i:s",$startdate);
	$enddate = date("Y-m-d H:i:s",$enddate);
	$notidate =date("Y-m-d H:i:s",$notidate);
	$eventid = $_POST['eventid'];
	$array = array(
		'title' => $title,
		'startdate' => $startdate,
		'enddate' => $enddate,
		"noti_date" => $notidate,
	);
	$where = "id = $eventid";
	$update = $db->update('calendar', $array, $where);
	if($update == 1)
		{echo json_encode(array('status'=>'success'));}
	else
		{echo json_encode(array('status'=>'failed'));}
}

if($type == 'remove')
{
	$eventid = $_POST['eventid'];
	$where = "id = $eventid";
	$delete = $db->delete('calendar', $where);
	if($delete == 1)
		{echo json_encode(array('status'=>'success'));}
	else
		{echo json_encode(array('status'=>'failed'));}
}

if($type == 'fetch')
{       if(isset($_SESSION['timetab_id'])){$id=$_SESSION['timetab_id'];}  else {$id = $_SESSION['uid'];}
	$events = array();
        $arr = array("timetab_id" => $id);
        $sql= "select * from calendar WHERE timetab_id = :timetab_id";
	$eve = $db-> select($sql, $arr);

	foreach ($eve as $key => $fetch)
	{
		$e = array();
	    $e['id'] = $fetch['id'];
	    $e['title'] = $fetch['title'];
	    $e['start'] = $fetch['startdate'];
	    $e['end'] = $fetch['enddate'];

	    $allday = ($fetch['allDay'] == "true") ? true : false;
	    $e['allDay'] = $allday;
			$e['opis'] = $fetch['opis'];
			$e['idc'] = $fetch['idc'];
			$e['notidate'] = $fetch['noti_date'];
	    array_push($events, $e);
	}
	echo json_encode($events);
}

if ($type== 'update')
{
	if($_POST['eventid']!="undefined")
	{
		$id=$_POST['eventid'];
		$sql = "SELECT enddate, opis FROM calendar WHERE id = :id";
		$array=array("id"=>$id);
		$ids = $db->select($sql, $array);
		$end['enddate'] = $ids[0]['enddate'];
		$end['opis'] = $ids[0]['opis'];

	  echo json_encode($end);
	}
}

?>

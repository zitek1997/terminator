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
	$startdate = date("Y-m-d H:i",$startdate);
	$enddate = date("Y-m-d H:i",$enddate);
	$title = $_POST['title'];
	$array = array(
		"title" => $title,
		"startdate" => $startdate,
		"enddate" => $enddate,
		"allDay" => "false",
		"opis" => " "
	);
	$db->insert('calendar', $array);
	$lastId = $db->lastInsertId();
	echo json_encode(array('status'=>'success','eventid'=>$lastId));
}

if($type == 'change')
{
	$eventid = $_POST['eventid'];
	$title = $_POST['title'];
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$opis = $_POST['opis'];
	$array = array(
		'title' => $title,
		'startdate' => $startdate,
		'enddate' => $enddate,
		'opis' => $opis,
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
	$eventid = $_POST['eventid'];
	$array = array(
		'title' => $title,
		'startdate' => $startdate,
		'enddate' => $enddate
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
{
	$events = array();
	$eve = $db-> selecto('select * from calendar');

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
<?php
include('ajax/config.php');
// include('ajax/confi.php');

$type = $_POST['type'];
// $type='fetch';

if($type == 'new')
{
	$startdate = $_POST['startdate'].'+'.$_POST['zone'];
	$title = $_POST['title'];
	$array = array(
		"title" => $title,
		"startdate" => $startdate,
		"enddate" => $startdate,
		"allDay" => "false"
	);
	$db->insert('calendar', $array);
	$lastId = $db->lastInsertId();
	echo json_encode(array('status'=>'success','eventid'=>$lastId));
}

if($type == 'changetitle')
{
	$eventid = $_POST['eventid'];
	$title = $_POST['title'];
	$array = array(
		'title' => $title,
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

	    array_push($events, $e);
	}


	// $query = mysqli_query($con, "SELECT * FROM calendar");

	// while($fetch = mysqli_fetch_array($query,MYSQLI_ASSOC))
	// {
	// $e = array();
  //   $e['id'] = $fetch['id'];
  //   $e['title'] = $fetch['title'];
  //   $e['start'] = $fetch['startdate'];
  //   $e['end'] = $fetch['enddate'];
	//
  //   $allday = ($fetch['allDay'] == "true") ? true : false;
  //   $e['allDay'] = $allday;
	//
  //   array_push($events, $e);
	// }
	echo json_encode($events);
	// print_r($eve);
}


?>

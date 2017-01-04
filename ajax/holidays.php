<?php
include("config.php");
$events = array();
$sql= "select * from holidays";
$eve = $db-> selecto($sql);
foreach ($eve as $key => $fetch)
{
	$repeat = $fetch['repeat'];
	if ($repeat == 1){
		$zero = $fetch['start'];
		$one = strtotime($zero);
		$month = date("n", $one);
		$day = date("d", $one);
		$year = date("Y");
		$czas = mktime(0, 0, 0, $month, $day, $year);
		$fetch['start'] = date("Y-m-d", $czas);
	}
	$e = array();
  $e['id'] = $fetch['id'];
  $e['title'] = $fetch['title'];
  $e['start'] = $fetch['start'];
  $allday = true;
	$e['allDay'] = $allday;
  array_push($events, $e);
}
echo json_encode($events);
?>

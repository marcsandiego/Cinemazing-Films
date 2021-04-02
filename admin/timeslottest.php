<?php

function prepare_time_slots($starttime, $endtime, $duration){
	 
	$time_slots = array();
	$start_time    = strtotime($starttime); //change to strtotime
	$end_time      = strtotime($endtime); //change to strtotime
	 
	$add_mins  = $duration * 60;
	 
	while ($start_time <= $end_time) // loop between time
	{
	   $time_slots[] = date("h:i A", $start_time);
	   $start_time += $add_mins; // to check endtime
	}

	return $time_slots;
}

$starttime = '10:00';  // your start time
$endtime = '20:00';  // End time
$duration = '30';  // split by 30 mins

$time_slots = prepare_time_slots($starttime, $endtime, $duration);

echo '<pre>';
print_r($time_slots);
echo '</pre>';

?>
<?php
	
	$mydata =
	'Chat Here';
	//$result = $result[0];
	$info->message = $mydata;
	$info->data_type = "chat";
	echo json_encode($info);
	
	die;
	
	$info->message = "No contacts were found";
	$info->data_type = "error"; 
	echo json_encode($info);
?>


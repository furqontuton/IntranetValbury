<?php

session_start();

$DATA_RAW = file_get_contents("php://input");
$DATA_OBJ = json_decode($DATA_RAW);

$info = (Object)[];
//check if logged in

if(!isset($_SESSION['userid']))
{
	if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type != "login" && $DATA_OBJ->data_type != "signup") 
	{
		$info->logged_in = false;
		echo json_encode($info);
		die;	
	}
	
}

require_once("classes/init.php");
$DB = new Database();



$Error = "";

//proccess data
if(isset($DATA_OBJ->data_type) && $DATA_OBJ	->data_type == "signup")
{

	//signup
	include("includes/signup.php");

}
else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "login") 
{ 
	//login

	include("includes/login.php");

}
else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "logout") 
{
	include("includes/logout.php");
}
else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "user_info") 
{
	//user info
	include("includes/user_info.php");
}
else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "contacts") 
{
	//user info
	include("includes/contacts.php");
}
else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "chat") 
{
	//user info
	include("includes/chat.php");
}
else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "settings") 
{
	//user info
	include("includes/settings.php");
}
else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "save_settings") 
{
	//user info
	include("includes/save_settings.php");
}

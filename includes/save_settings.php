<?php

$info = (Object)[];

	$data = false;
	$data['userid'] = $_SESSION['userid'];
	

	//validate username
	$data['username'] = $DATA_OBJ->username;
	if(empty($DATA_OBJ->username))
	{
		$Error .= "Please enter username. <br>";
	}else
	{
		if(strlen($DATA_OBJ->username) < 3)
		{
			$Error .= "Username must be at least 3 character long. <br>";
		}

		if(!preg_match("/^[a-z A-Z 0-9]*$/", $DATA_OBJ->username))
		{
			$Error .= "Please enter a valid username. <br>";
		}

	}

	$data['email'] = $DATA_OBJ->email;
	
	if(empty($DATA_OBJ->email))
	{
		$Error .= "Please enter email. <br>";
	}else
	{
		
		if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $DATA_OBJ->email))
		{
			$Error .= "Please enter a valid email. <br>";
		}
	
	}

	$data['gender'] = isset($DATA_OBJ->gender) ? $DATA_OBJ->gender : null;
		
	if(empty($DATA_OBJ->gender))
		{
			$Error .= "Please select a gender. <br>";
		}else
		{
			
			if($DATA_OBJ->gender != "Male" && $DATA_OBJ->gender != "Female")
			{
				$Error .= "Please select a valid gender. <br>";
			}
		
		}


	$data['password'] = $DATA_OBJ->password;
	$password = $DATA_OBJ->password2;
	if(empty($DATA_OBJ->password))
	{
		$Error .= "Please enter password. <br>";
	}else
	{
		if($DATA_OBJ->password != $DATA_OBJ->password2) 
		{
			$Error .= "Password is not match. <br>";
		}

		if(strlen($DATA_OBJ->password) < 8)
		{
			$Error .= "Password must be at least 8 character long. <br>";
		}

	}

	
	if($Error == "")
		{
		$query = "insert into users (userid,username,email,gender,password,date) values (:userid,:username,:email,:gender,:password,:date)";
		$query = "update users set userid = :userid ,username = :username ,email = :email ,gender = :gender ,password = :password where userid = :userid limit 1";
		$result = $DB->write($query,$data);

		if($result)
		{
			
			$info->message = "Your data was saved";
			$info->data_type = "save_settings"; 
			echo json_encode($info);

		} else
		{
			
			$info->message = "Your data was NOT saved due to an error";
			$info->data_type = "save_settings"; 
			echo json_encode($info);
		}
	}else
	{
		
		$info->message = $Error;
		$info->data_type = "save_settings"; 
		echo json_encode($info);
	}
<?php

$info = (Object)[];

	$data = false;

	//validate info
	$data['userid'] = $_SESSION['userid'];


	if($Error == "")
		{
		$query = "select * from users where userid = :userid limit 1";
		$result = $DB->read($query,$data);

		if(is_array($result))
		{
			$result = $result[0];
			$result->data_type = "user_info";

			//Check if image exists
			$image = ($result->gender == "Male") ? "ui/images/Male.png" : "ui/images/Female.png" ;
				if(file_exists($result->image)){
					$image = $result->image;
				}
				$result->image = $image;
			echo json_encode($result);
		} else
		{
			
			$info->message = "Wrong email";
			$info->data_type = "error"; 
			echo json_encode($info);
		}
	}else
	{
		
		$info->message = $Error;
		$info->data_type = "error"; 
		echo json_encode($info);
	}
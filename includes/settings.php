<?php
	
	$sql = "select * from users where userid = :userid limit 1";
	$id = $_SESSION['userid'];
	$data = $DB->read($sql,['userid'=>$id]);

	$mydata = "";
if(is_array($data)){

	$data = $data[0];
	
	//check if image exists
	$image = ($data->gender == "Male") ? "ui/images/Male.png" : "ui/images/Female.png" ;
	if(file_exists($data->image)){
		$image = $data->image;
	}

	$gender_male = "";
	$gender_female = "";

	if($data->gender == "Male"){
		$gender_male = "checked";
	}else{
		$gender_female = "checked";
	}
	$mydata ='

		<style type="text/css">		
			form{

				margin: auto;
				padding: 10px;
				width: 100%;
				max-width: 400px;
				text-align: left;
			}

			input[type=text], input[type=password], input[type=button]{

				padding: 10px;
				margin: 10px;
				margin-top: 10px;
				width: 200px;
				border-radius: 5px;
				border: solid 0.5px grey;
				font-size: 12px;


			}
			
			input[type=button]{

				width: 220px;
				padding: 7px;
				cursor: pointer;
				background-color: #a99b86;
				color: white;
				border-radius: 5px;
				box-shadow: 0 4px #999;
				

			}
			input[type=button]:hover {
				background-color: #cfbea5;
			}
			input[type=button]:active {
				background-color: #cfbea5;
		  		box-shadow: 0 3px #6b6969;
		  		transform: translateY(2px);
			}

			input[type=radio]{

				transform: scale(1.2);
				cursor: pointer;


				
			}

			

			#error{

				text-align: center;
				padding: 0.5em;
				background-color: ##eeb143;
				color: white; 
				display: none;
			}

			@keyframes appear{

			0%{opacity:0; transform: translateY(-5px);}
			100%{opacity:1; transform: translateY(0px);}
		}

		</style>

		

			
			<div id="error">error</div>
			<div style="display: flex; animation: appear 1s ease;">

				<div>
				<img src="'.$image.'" style="padding:10px;width:150px; height:150px; display; block; object-fit:cover;"/>
				<input type="button" value= "Change Photo" id="chg_img_button" style="width: 200px;"><br>
				</div>

				<form id="myform">
					<input type="text" name="username" placeholder="Username" value="'.$data->username.'"><br>
					<input type="text" name="email" placeholder="Email" value="'.$data->email.'"><br>
					<div style="padding: 15px; font-size: 12px;">
						Gender:<br>
						<input  type="radio" value ="Male" name="gender" '.$gender_male.'> Male
						<input  type="radio" value ="Female" name="gender" '.$gender_female.'> Female<br>
					</div>
					<input type="text" name="password" placeholder="Password" value="'.$data->password.'"><br>
					<input type="text" name="password2" placeholder="Retype Password" value="'.$data->password.'"><br>
					<input type="button" value= "Save Settings" id="save_settings_button" onclick="collect_data(event)"><br>
			
				</form>
		


		


	';
}
	//$result = $result[0];
	$info->message = $mydata;
	$info->data_type = "settings";
	echo json_encode($info);
	
	die;
	
	$info->message = "No contacts were found";
	$info->data_type = "error"; 
	echo json_encode($info);
?>


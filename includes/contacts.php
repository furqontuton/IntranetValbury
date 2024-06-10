<?php
	
	$sql = "select * from users limit 10";
	$myusers = $DB->read($sql,[]);
	$mydata =
	'
	<style>
		@keyframes appear{

			0%{opacity:0; transform: translateY(-5px);}
			100%{opacity:1; transform: translateY(0px);}
		}
	</style>
	<div style="text-align: center; animation: appear 1s ease;">';						
		
		if(is_array($myusers)){

			foreach ($myusers as $row){ 

				$image = ($row->gender == "Male") ? "ui/images/Male.png" : "ui/images/Female.png" ;
				if(file_exists($row->image)){
					$image = $row->image;
				}
				$mydata .= "
				<div id='contact'>
					<img src='$image'>
					<br>$row->username
				</div>";
			}
		}
		
	$mydata .= '
	</div>';

	//$result = $result[0];
	$info->message = $mydata;
	$info->data_type = "contacts";
	echo json_encode($info);
	
	die;
	
	$info->message = "No contacts were found";
	$info->data_type = "error"; 
	echo json_encode($info);
?>


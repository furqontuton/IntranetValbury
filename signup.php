<!DOCTYPE html>
<html lang="eng">
<head>
	<title>KB Valbury Chat</title>
</head>
<style type="text/css">
	
	@font-face{

		font-family: headFont;
		src: url(ui/fonts/Summer-Vibes-OTF.otf);
	}

	@font-face{

		font-family: myFont;
		src: url(ui/fonts/OpenSans-Regular.ttf);
	}
	#wrapper{

		max-width: 900px;
		min-height: 500px;
		
		margin: auto;
		color: grey;
		font-family: myFont;
		font-size: 13px;

	}

	form{

		margin: auto;
		padding: 10px;
		width: 100%;
		max-width: 400px;
	}

	input[type=text], input[type=password], input[type=button]{

		padding: 10px;
		margin: 10px;
		width: 98%;
		border-radius: 5px;
		border: solid 0.5px grey;
	}
	
	input[type=button]{

		width: 103%;
		cursor: pointer;
		background-color: #313b7d;
		color: white;
		border-radius: 5px;
		box-shadow: 0 4px #999;
	}
	input[type=button]:hover {
		background-color: #3a4699;
	}
	input[type=button]:active {
		background-color: #3a4699;
  		box-shadow: 0 3px #6b6969;
  		transform: translateY(2px);
	}

	input[type=radio]{

		transform: scale(1.2);
		cursor: pointer;
		
	}

	#header {

		background-color: #485b6c;
		height: 110px;
		font-size: 40px;
		text-align: center;
		font-family: headFont;
		width: 100%;
		color: white;
		border-top-right-radius: 14px;
		border-top-left-radius: 14px;

	}

	#error{

		text-align: center;
		padding: 0.5em;
		background-color: ##eeb143;
		color: white; 
		display: none;
	}

</style>
<body>
	<div id="wrapper">

		<div id="header">
			KB Valbury Intra Chat
			<div style="font-size: 20px;font-family: myFont;">Sign Up</div>
		</div>
		<div id="error">some text</div>
		<form id="myform">
			<input type="text" name="username" placeholder="Username"><br>
			<input type="text" name="email" placeholder="Email"><br>
			<div style="padding: 15px">
				Gender:<br>
				<input  type="radio" value ="Male" name="gender"> Male<br>
				<input  type="radio" value ="Female" name="gender"> Female<br>
			</div>
			<input type="password" name="password" placeholder="Password"><br>
			<input type="password" name="password2" placeholder="Retype Password"><br>
			<input type="button" value= "SignUp" id="signup_button"><br>

			<br>
			<a href="login.php" style="display: block;text-align: center; text-decoration: none;">
				Back to Login
			</a>
		</form>
	</div>
</body>
</html>

<script type="text/javascript">
		
	function _(element){

		return document.getElementById(element);
	}	
	
	var signup_button = _("signup_button");
	signup_button.addEventListener("click", collect_data);

	function collect_data(){

		signup_button.disabled = true;
		signup_button.value = "Loading...Please Wait...";

		var myform = _("myform");
		var inputs = myform.getElementsByTagName("INPUT");

		var data = {};
		for (var i = inputs.length - 1; i >= 0; i--) {

			var key = inputs[i].name;

			switch(key){

				case "username" : 
					data.username = inputs[i].value;
					break;

				case "email" : 
					data.email = inputs[i].value;
					break;

				case "gender" : 
					if(inputs[i].checked){
					data.gender = inputs[i].value;
					}
					break;

				case "password" :
					data.password = inputs[i].value;
					break;

				case "password2" : 			
					data.password2 = inputs[i].value;
					break;

			}
		}

		send_data(data,"signup");
		
	}
		function send_data(data,type){

			var xml = new XMLHttpRequest();

			xml.onload = function(){

				if(xml.readyState == 4 || xml.status == 200){

					handle_result(xml.responseText);
					signup_button.disabled = false;
					signup_button.value = "SignUp";
				}
			}

			data.data_type = type;
			var data_string = JSON.stringify(data);

			xml.open("POST","api.php",true);
			xml.send(data_string);
			
	}

	function handle_result(result){

		var data = JSON.parse(result);
		if(data.data_type == "info"){

			window.location = "login.php";
		}else{

			var error = _("error");
			error.innerHTML = data.message;
			error.style.display = "block";
		}
	}

</script>

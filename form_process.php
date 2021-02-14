<?php
$error = false;
// define variables and set to empty values
$name = $email = $message = "";
$name_error = $email_error = $message_error = "";

	//Load the config file for connect to database







//form is submitted with POST method
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$name = $_POST['name'];
	$email = $_POST["email"];
	$message = $_POST["message"];
	if(empty($_POST["name"])) {
		$error = true;
		$name_error = "First and last name cannot be empty!";
	}else{
		$name = $_POST['name'];
		// check if name only contains letters and whitespace	
		if(!preg_match("/^[a-zšđčćžA-ZŠĐČĆŽ\s]*$/", $name)){
			$name_error = "The first and last names can contain only letters and spaces!";
		}
	}
	if(empty($_POST["email"])){
		$email_error = "The e-mail can't be empty!";
	}else{
		$email = $_POST["email"];
		// check if e-mail address is well-formed
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email_error = "The e-mail address is incorrect!";
		}
	}
	if(empty($_POST["message"])) {
		$message_error = "The contents of the message cannot be empty!";
	}else{
		$message = $_POST["message"];
		// check if name only contains letters and whitespace
		if(!preg_match("/^[a-zšđčćžA-ZŠĐČĆŽ0-9 ,.!?\'\"]*$/", $message)){
			$message_error = "The content of message cannot be special signs!";
		}
	}
	if($name_error == '' && $email_error == '' && $message_error == ''){
	
	
	//settings for PHPMailer
		
		
      
		// save data to db




		// load  AJAX
		if($error==false){
			$data['response'] = "success";
			$data['content'] = "Thanks " . ucwords($name) . ", I'll back to you soon!";
		}
	else
	{
		$data['response'] = "error";
		$data['content'] = "An error occurred! Try again!";
    }
	echo json_encode($data); 
}
}
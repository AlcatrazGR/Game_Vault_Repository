<?php
	
	$requiredFields = array('username', 'password', 'repassword', 'emailService', 'sex', 'date', 'month', 'year', 'ImageToUpload');
		
	$error = false;
	foreach($requiredFields as $field) {
		if (empty($_POST[$field])) {
			$error = true;
		}
	}	
	
	if($error){
		echo "You must first fill all the form fields";
	}
	else{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$rpassword = $_POST['repassword'];
	
		$email = $_POST['email'];
		$emailService = $_POST['emailService'];
		$email = $email."@".$emailService;
	
		$sexType = $_POST['sex'];
	
		$date = $_POST['date'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$bdate = $date."-".$month."-".$year;
		
		$userImage = $_POST['ImageToUpload'];
		
		echo $username." ".$password." ".$email." ".$sexType." ".$bdate." ".$userImage;
	}
		


?>
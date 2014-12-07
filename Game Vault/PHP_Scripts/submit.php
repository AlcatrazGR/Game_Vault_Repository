<?php
	
	//Array with all the names of the components that must be filled
	//in the form
	$requiredFields = array('username', 'password', 'repassword', 'emailService', 'sex', 'date', 'month', 'year', 'ImageToUpload');
	
	//sets an error flag and passes all the above array checking if
	//any of the fields are empty.
	$error = false;
	foreach($requiredFields as $field) {
		if (empty($_POST[$field])) {
			$error = true;
		}
	}	
	
	if($error){
		echo "<h2> You must first fill all the form fields </h2>";
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
		$time = $date.".".$month.".".$year;
		$bdate = date("jS F, Y", strtotime($time));
		
		$userImage = $_POST['ImageToUpload'];
		
		echo $username." ".$password." ".$email." ".$sexType." ".$bdate." ".$userImage;
	}
		


?>
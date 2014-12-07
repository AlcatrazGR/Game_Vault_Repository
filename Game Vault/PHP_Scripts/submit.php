<?php
	require("account.php");
	
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
		//Gets the data from the filled form.
		$username = $_POST['username'];
		$password = $_POST['password'];
		$rpassword = $_POST['repassword'];
	
		$emailDomain = $_POST['email'];
		$emailService = $_POST['emailService'];

		$sexType = $_POST['sex'];
	
		$date = $_POST['date'];
		$month = $_POST['month'];
		$year = $_POST['year'];

		$userImage = $_POST['ImageToUpload'];
		
		$accountDataArray = array($username, $password, $rpassword, $emailDomain);
		$newAccountObj = new account();
		$results = $newAccountObj->newAccountDataIntegrityCheck($accountDataArray);

		
		if($results == ""){
			$email = $emailDomain."@".$emailService;
			$time = $date.".".$month.".".$year;
			$bdate = date("jS F, Y", strtotime($time));
			
			echo $username." ".$password." ".$email." ".$sexType." ".$bdate." ".$userImage;
		}
		else{
			echo "<h3>".$results."</h3>";
		}
		

	}
		


?>
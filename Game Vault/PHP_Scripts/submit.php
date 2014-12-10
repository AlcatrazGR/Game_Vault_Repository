<?php
	require("account.php");
	
	//Array with all the names of the components that must be filled
	//in the form
	$requiredFields = array('username', 'password', 'repassword', 'emailService', 'sex', 'date', 'month', 'year');
	
	//sets an error flag and passes all the above array checking if
	//any of the fields are empty.
	$error = false;
	foreach($requiredFields as $field) {
		if (empty($_POST[$field])) {
			$error = true;
		}
	}	
	
	if($error){
		die("You must first fill all the form fields");
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

		$accountDataArray = array($username, $password, $rpassword, $emailDomain);
		$newAccountObj = new account();
		$results = $newAccountObj->newAccountDataIntegrityCheck($accountDataArray);

		if($results == ""){
			$email = $emailDomain."@".$emailService;
			$time = $date.".".$month.".".$year;
			$bdate = date("jS F, Y", strtotime($time));
			
			if(!empty($_FILES)){ 
				$results = userImageController();
				
				if($results == ""){
					echo "OK";
				}
				else{
					die($result);
				}
			}
			else{
				die("No image selected");
			}	
	
		}
		else{
			die($result);
		}
		

	}
		
	//------------------------------------ Functions ---------------------------------------------
		
	function userImageController(){$dest = "User/";
		$dest.=$_FILES['ImageToUpload']['name']; 
		$fname=$_FILES['ImageToUpload']['tmp_name']; 
		$file = $_FILES['ImageToUpload'];
		
		//Image Properties
		$file_name = $file['name'];
		$file_size = $file['size'];
		
		
		//Works out the file extension
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		
		$newAccountObj = new account();
		$result = $newAccountObj->userImageChecks($dest, $fname, $file, $file_size, $file_ext);
		
		
		
		return $result;
	}

?>
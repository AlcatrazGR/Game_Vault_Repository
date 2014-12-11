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
		
		//checks the data integrity
		if($results == ""){
			$email = $emailDomain."@".$emailService;
			$time = $date.".".$month.".".$year;
			$bdate = date("jS F, Y", strtotime($time));
			
			//checks if the 'file' field is not empty
			if(!empty($_FILES)){ 
				$results = userImageController();
				
				//checks the integrity of the uploaded image
				if($results == ""){
					$file = $_FILES['ImageToUpload'];
					$file_name = $file['name'];
					$accountDataArray = array($username, $password, $email, $sexType, $bdate, $file_name);
					
					$results = $newAccountObj->accountExistsInDAO($accountDataArray);
					
					//Checks if the account already exists on database
					if($results == true){
						//Setting the destination and the temporary names of the file
						$dest = "User/Images/";
						$dest.=$_FILES['ImageToUpload']['name']; 
						$fname=$_FILES['ImageToUpload']['tmp_name']; 
						
						$accountDataArray = array($username, $password, $email, $sexType, $bdate, $file_name, $dest, $fname);
						$newAccountObj->newAccountSubmition($accountDataArray);
					}
					else{
						die("The username or password given already exists!!");
					}	
				}
				else{
					die($results);
				}
			}
			else{
				die("No image selected");
			}	
	
		}
		else{
			die($results);
		}
		

	}
		
	//------------------------------------ Functions ---------------------------------------------
		
	function userImageController(){
		$file = $_FILES['ImageToUpload'];
		
		//Image Properties
		$file_name = $file['name'];
		$file_size = $file['size'];
		
		
		//Works out the file extension
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		
		$newAccountObj = new account();
		$result = $newAccountObj->userImageChecks($file, $file_size, $file_ext);

		return $result;
	}

?>
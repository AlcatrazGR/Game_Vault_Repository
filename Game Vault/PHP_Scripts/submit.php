<?php
	require 'account.php';
	
	$username = $_POST['Username'];
	$password = $_POST['Password'];
	$repassword = $_POST['RePassword'];
	$email = $_POST['Email'];
	$emailService = $_POST['EmailService'];
	$sex = $_POST['Sex'];
	$date = $_POST['Date'];
	$month = $_POST['Month'];
	$year = $_POST['Year'];
	
	//Initializing a account class object and sets its data members.
	$accountObj = new account();
	$accountObj->SetDataMembers($username, $password, $repassword, $email, $emailService, $sex, $date, $month, $year);	
	
	//Calls the function of account.php to check if there is any empty field
	$result = $accountObj->EmptyFormFieldsCheck();
	if($result == null){
		
		//Calls the function of account.php to check the Integrity of each form field.
		$result = $accountObj->FormFieldIntegrity();
		if($result == null){
				
				//Calls the function of the account.php that checks if the re type password
				//field is equal to the password field.
				$result = $accountObj->ReTypePasswordEqualsWithPasswordCheck();
				if($result == null){
					
					//Calls the function of the account.php that checks if the account 
					//already exists in data base.
					$result = $accountObj->AccountExistInDataBase();
					if($result == null){
						
					}
					else{
						echo $result;
					}
				}
				else{
					echo $result;
				}
		}
		else{
			echo $result;
		}
	}
	else{
		echo $result;
	}
	
	
		
		
		
		/*
		if(!empty($_POST['ImageToUpload'])){
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
			
			$accountObj = new account();
			
			
			echo "".$imgAccount;
			
		}
		else{
			echo "No user image selected. Please submit an image for your profile.";
		}
		
	
	}
	*/
/*

	else{

		$accountDataArray = array($username, $password, $rpassword, $emailDomain);
		$newAccountObj = new account();
		$results = $newAccountObj->newAccountDataIntegrityCheck($accountDataArray);
		
		//checks the data integrity
		if($results == ""){
			$email = $emailDomain."@".$emailService;
			//$time = $date.".".$month.".".$year;
			$time = $year."-".$month."-".$date;
			$date = strtotime($time);
			//$bdate = date("jS F, Y", strtotime($time));
			$bdate = date('Y/m/d', $date);
			
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
						
						echo "Account has been successfully created! <br /> 
							You will be redirected to the page shortly ... ";
						header( "refresh:3;url=../signIn.php" );
					}
					else{
						header( "refresh:3;url=../signIn.php" );
						die("The username or password given already exists!!");
					}	
				}
				else{
					header( "refresh:5;url=../signIn.php" );
					die($results);
				}
			}
			else{
				header( "refresh:3;url=../signIn.php" );
				die("No image selected");
			}	
		}
		else{
			header( "refresh:3;url=../signIn.php" );
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
*/
?>

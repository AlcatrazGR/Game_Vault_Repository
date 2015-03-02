<?php
	require 'account.php';

	//Gets the data from the html form.
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	
	$emailDomain = $_POST['email'];
	$emailService = $_POST['emailService'];
	
	$sex = $_POST['sex'];
	
	$date = $_POST['date'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	
	//Initializing a account class object and sets its data members.
	$accountObj = new account();
	$accountObj->SetDataMembers($username, $password, $repassword, $emailDomain, $emailService, $sex, $date, $month, $year);	
	
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
					if(isset($_FILES['ImageToUpload'])){
						
						$file = $_FILES['ImageToUpload'];
						
						//Checks the extension of the file to be uploaded
						$result = $accountObj->fileExtensionCheck($file);
						if($result == null){
							
							//Checks the size of the file to be uploaded
							$result = $accountObj->FileSizeCheck($file);
							if($result == null){
								
								//Checks whether the user image folder and the cache
								//image folder exists. If not it creates them.
								$accountObj->UserImageFolderExists();	
								
								//Calls a method that will check if the name of the user image
								//already exist in database. If it does then it uploads it to a
								//temporary folder and renames it.
								$result = $accountObj->UserImageExistsInDatabase($file);
								
								//Submitting data to data base
								$accountObj->SubmitNewAccountToDatabase();
								echo "! Successful Account Submission.";
								
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
						echo "You didn't select any image for you profile!";
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
	}
	else{
		echo $result;
	}
	
	
	/*
	$output_dir = "User/Images/";
 
	if(isset($_FILES["ImageToUpload"]))
	{
		//Filter the file types , if you want.
		if ($_FILES["ImageToUpload"]["error"] > 0)
		{
			echo "Error: " . $_FILES["file"]["error"] . "<br>";
		}
		else
		{
			//move the uploaded file to uploads folder;
			move_uploaded_file($_FILES["ImageToUpload"]["tmp_name"],$output_dir. $_FILES["ImageToUpload"]["name"]);
 
		echo "Uploaded File :".$_FILES["ImageToUpload"]["name"];
		}
	}

	*/
	

	
	
	
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

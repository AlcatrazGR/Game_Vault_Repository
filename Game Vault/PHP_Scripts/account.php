<?php
	//This script requires the connection to database script to function
	//else it dies (stops).
	require 'databaseConnection.php';
	
	//Class that manages all the needs of the web site that have
	//to do with user accounts.
	class account{
		
		public $username;
		public $password;
		public $repassword;
		public $email;
		public $emailService;
		public $sex;
		public $bDate;
		public $month;
		public $year;
		
		//Function that sets the data for the data members.
		public function SetDataMembers($usname, $pass, $rpass, $mail, $mailServ, $sex, $bDate, $month, $year){
			$this->username = $usname;
			$this->password = $pass;
			$this->repassword = $rpass;
			$this->email = $mail;
			$this->emailService = $mailServ;
			$this->sex = $sex;
			$this->bDate = $bDate;
			$this->month = $month;
			$this->year = $year;
		}
		
		//Function that checks if any of the form's fields is empty 
		public function EmptyFormFieldsCheck(){
			if($this->username == "")
				return "Error occurred!, <b><u>User Name</b></u> field is empty.";
			else if($this->password == "")
				return "Error occurred!, <b><u>Password</b></u> field is empty.";
			else if($this->repassword == "")
				return "Error occurred!, <b><u>Re Type Password</b></u> field is empty.";
			else if($this->email == "")
				return "Error occurred!, <b><u>Email</b></u> field is empty.";
			else if($this->sex == "")
				return "Error occurred!, You didn't select your <b><u>Sex</b></u> type. ";
			else if($this->bDate == "")
				return "Error occurred!, <b><u>Date</b></u> field is empty.";
			else if($this->year == "")
				return "Error occurred!, <b><u>Year</b></u> field is empty.";
			else
				return null;
		}
		
		//Function that checks the integrity of each field of the form.
		public function FormFieldIntegrity(){
			$forbiddenCharachters = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")", 
				"-", "+", "=", "/", "{", "}", "[", "]", "|", "`", "~", ":");

			foreach($forbiddenCharachters as $i){
				if(strpos($this->username, $i) !== false){
					return "Error occurred!, <b><u>User Name</b></u> field contains invalid characters.";
					break;
				}
		
				if(strpos($this->password, $i) !== false){
					return "Error occurred!, <b><u>Password</b></u> field contains invalid characters.";
					break;
				}
				
				if(strpos($this->repassword, $i) !== false){
					return "Error occurred!, <b><u>Re Type Password</b></u> field contains invalid characters.";
					break;
				}
				
				if(strpos($this->email, $i) !== false){
					return "Error occurred!, <b><u>Email</b></u> field contains invalid characters.";
					break;
				}
				
				if(strpos($this->bDate, $i) !== false){
					return "Error occurred!, <b><u>Date</b></u> field contains invalid characters.";
					break;
				}
				
				if(strpos($this->year, $i) !== false){
					return "Error occurred!, <b><u>Year</b></u> field contains invalid characters.";
					break;
				}
			}
			return null;
		}
		
		public function ReTypePasswordEqualsWithPasswordCheck(){
			if($this->repassword == $this->password)
				return null;
			else	
				return "Error occurred!, <b><u>Password</b></u> and <b><u>Re Type Password</b></u> fields mismatch!.";
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		//Gets all the accounts from the database and returns
		//an array of arrays back to the caller.
		public function getAccountFromDAO(){
			$query = "SELECT * FROM accounts";
			$result = mysql_query($query);
			
			$n=0;
			$accountArray = array();
			$signleAccountArray = array();
			while($account = mysql_fetch_array($result)){
				$i=0;
				$signleAccountArray[$i] = $account['ACCOUNT_TYPE'];
				$signleAccountArray[$i+1] = $account['USERNAME'];
				$signleAccountArray[$i+2] = $account['PASSWORD'];
				$signleAccountArray[$i+3] = $account['EMAIL'];
				$signleAccountArray[$i+4] = $account['SEX'];
				$signleAccountArray[$i+5] = $account['BIRTH_DATE'];
				$signleAccountArray[$i+6] = $account['USER_PHOTO'];
				
				$accountArray[$n] = $signleAccountArray;
				$n++;
			}

			return $accountArray;
		}
		
		//Function that checks the integrity of the given data.
		public function newAccountDataIntegrityCheck($newAccountObj){
			$errorMessage="";
			
			//Checks if the fields contain <space> 
			if(strpos($newAccountObj[0], " ") !== false){
				$errorMessage .= "The username you have given contains invalid characters! <br />";
			}
			if(strpos($newAccountObj[1], " ") !== false){
				$errorMessage .= "The password you have given contains invalid characters! <br />";
			}
			if(strpos($newAccountObj[3], " ") !== false){
				$errorMessage .= "The Domain of your EMAIL contains invalid characters! <br />";
			}
			
			//Checks if the password and retyped password are the same
			if($newAccountObj[1] != $newAccountObj[2]){
				$errorMessage .= "Password and Re-typed Password mismatch! <br />";
			}
			
			return $errorMessage;
		}
		
		//Method that checks the integrity of the image to be uploaded.
		public function userImageChecks($image, $imageSize, $extension){
			$errorMessage = "";
			$allowedExtensions = array("jpg","jpeg","gif","bmp","JPG","JPEG","GIF","BMP");
			
			//Chechs if the extension of the image is allowed
			if(in_array($extension, $allowedExtensions)){
				
				//Checks the image size
				if($imageSize <= 697152){
				
					//Checks if the directory for the users images exists, if not it creates it
					if(!is_dir("User/Images/")){
						mkdir("User/Images/", 0777, true);
					}
				}
				else{
					$errorMessage .= "The size of the image exceeds the limit !! <br />";
				}
			}
			else{
				$errorMessage .= "The extension of the file is invalid !! <br />";
			}
			
			return $errorMessage;
		}
		
		//Method that checks if the account already exists on database
		public function accountExistsInDAO($accountArray){
			$check = true;
			$query = "SELECT * FROM accounts WHERE ((USERNAME='".$accountArray[0]."') OR (PASSWORD='".$accountArray[1]."'))";
			$result = mysql_query($query);
			
			$rowsNum = mysql_num_rows($result);
			if($rowsNum != 0){
				$check = false;
			}
			
			return $check;
		}
		
		//Method that inserts the new account into the database and also
		//uploads the image to the location 'User/Images/'
		public function newAccountSubmition($accountArray){
			move_uploaded_file($accountArray[7], $accountArray[6]); 
			
			$accountType = "user";
			$query = "INSERT INTO accounts (ACCOUNT_TYPE, USERNAME, PASSWORD, EMAIL, SEX, BIRTH_DATE, USER_PHOTO)
				VALUES ('".$accountType."', '".$accountArray[0]."', '".$accountArray[1]."', '".$accountArray[2]."',
				'".$accountArray[3]."', '".$accountArray[4]."', '".$accountArray[5]."');";
			mysql_query($query);
		
		}
		
		
	}
	
?>
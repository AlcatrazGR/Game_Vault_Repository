<?php
	//This script requires the connection to database script to function
	//else it dies (stops).
	require 'databaseConnection.php';
	
	//Class that manages all the needs of the web site that have
	//to do with user accounts.
	class account{
		
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
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
		
		public $userImageName;
		
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
				"-", "+", "=", "/", "{", "}", "[", "]", "|", "`", "~", ":", " ");

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
		
		//Function that checks if the re type password and the password fields of the form
		//are equal.
		public function ReTypePasswordEqualsWithPasswordCheck(){
			if($this->repassword == $this->password)
				return null;
			else	
				return "Error occurred!, <b><u>Password</b></u> and <b><u>Re Type Password</b></u> fields mismatch!.";
		}
		
		//Function that merges the email data and the birth date data parts together 
		//and return an array of them.
		public function MergeDataFields(){
			$emailData = $this->email."@".$this->emailService;
			
			$time = $this->year."-".$this->month."-".$this->bDate;
			$date = strtotime($time);
			$bdate = date('Y/m/d', $date);
			
			$arrayOfData = array($emailData, $bdate);
			return $arrayOfData;
		}
		
		//Function that checks if the newly submited account already exists 
		//in our database.
		public function AccountExistInDataBase(){
			$arrayOfData = $this->MergeDataFields();
			
			$query = "SELECT * FROM accounts WHERE ((USERNAME='".$this->username."') OR 
				(PASSWORD='".$this->password."'));";
			
			$results = mysql_query($query);
			//Returns the number of rows from the above sql query
			$rowsNum = mysql_num_rows($results);
			
			if($rowsNum != 0)
				return "Error occurred!, the <b><u>User Name</b></u> or <b><u>Password</b></u> already exist!";
			else
				return null;
		}
		
		//Method that works out the extension of the file to be uploaded.
		public function fileExtensionCheck($fileRef){
			
			//permitted file extensions.
			$allowedExtensions = array("png","jpg","jpeg","gif","bmp","JPG","JPEG","GIF","BMP","PNG");
			$file_name = $fileRef['name'];
			
			//Works out the file extension
			$file_ext = explode('.', $file_name);
			$file_ext = strtolower(end($file_ext));
			
			for($i=0; $i<sizeof($allowedExtensions); $i++){
				if($file_ext == $allowedExtensions[$i])
					return null;
			}
			
			return "Error occurred!, forbidden file <b><u> extension! </b></u>";
		}
		
		//Method that checks the size of the file to be uploaded
		public function FileSizeCheck($fileRef){
			$file_size = $fileRef['size'];
			
			if($file_size <= 697152)
				return null;
			else
				return "Error occurred!, The size of the file you want to upload exceeds the limit of 600KB!";
		}
		
		//Checks if the directory for the users images exists, if not it creates it.
		//Do the same with the cache folder.
		public function UserImageFolderExists(){
			if(!is_dir("User/Images/")){
				mkdir("User/Images/", 0777, true);
			}
			
			if(!is_dir("User/Images/Cache")){
				mkdir("User/Images/Cache", 0777, true);
			}
		}
		
		//Method that checks whether the image the user choose to upload exists
		//in database.
		public function UserImageExistsInDatabase($fileRef){
			$check = false;
			
			$file_name = $fileRef['name'];

			//Works out the file extension
			$file_ext = explode('.', $file_name);
			$file_ext = strtolower(end($file_ext));
			
			//Query that checks if the real name of the file exists in database
			$query = "SELECT * FROM accounts WHERE USER_PHOTO='".$file_name."'";
			$results = mysql_query($query);
			$num_rows = mysql_num_rows($results);
			
			if($num_rows > 0){
				//Sets the output directory to be the cache (temporary folder)
				$output_dir = "User/Images/Cache/";
				//Move the image to the temporary folder
				move_uploaded_file($_FILES["ImageToUpload"]["tmp_name"],$output_dir. $_FILES["ImageToUpload"]["name"]);
				$generatedNewName = "";
				
				//While the flag is false, generate a new name for the image.
				$flag = false;
				while($flag == false){
					$generatedNewName = $this->GeneratingSpecialUserImageName().".".$file_ext;
					$query = "SELECT * FROM accounts WHERE USER_PHOTO='".$generatedNewName."'";
					$results = mysql_query($query);
					$num_rows = mysql_num_rows($results);
					
					if($num_rows == 0)
						$flag = true;
				}
				
				//Rename the file inside the cache folder to its new name.
				rename($output_dir.$_FILES["ImageToUpload"]["name"], $output_dir.$generatedNewName);
				
				//Rename-Move the renamed file from the cache folder to the main
				//user image folder.
				rename($output_dir.$generatedNewName, "User/Images/".$generatedNewName);
				
				$this->userImageName = $generatedNewName;
			}
			else{
				//If the name of the image doesnt exist then typically upload it
				//to the main user image folder.
				$output_dir = "User/Images/";
				move_uploaded_file($_FILES["ImageToUpload"]["tmp_name"],$output_dir. $_FILES["ImageToUpload"]["name"]);				
				$this->userImageName = $file_name;
			}
		}
		
		//Method that generates a special name for the images that their name already
		//exists in database. Its randomly generated name is consisted of 20 different
		//characters.
		public function GeneratingSpecialUserImageName(){
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < 19; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
		//Function that submit the data of the form to the database.
		public function SubmitNewAccountToDatabase(){
			$arrayOfData = $this->MergeDataFields();
			$accountType = "user";

			$query = "INSERT INTO accounts (ACCOUNT_TYPE, USERNAME, PASSWORD, EMAIL, SEX, BIRTH_DATE, USER_PHOTO)
				VALUES ('".$accountType."', '".$this->username."', '".$this->password."', '".$arrayOfData[0]."',
				'".$this->sex."', '".$arrayOfData[1]."', '".$this->userImageName."');";
			
			mysql_query($query);	
		}	
		
		//Method that returns all the account from the database
		public function GetAccountFromDAO(){
			$query = "SELECT * FROM accounts";
			$results = mysql_query($query);
			
			return $results;
		}
	}		
?>
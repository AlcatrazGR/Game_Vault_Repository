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
		
		
	}
	
?>
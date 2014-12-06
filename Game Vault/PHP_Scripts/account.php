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
		
	}
	
?>
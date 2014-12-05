<?php
	//This script requires the connection to database script to function
	//else it dies (stops).
	require 'databaseConnection.php';
	
	//Class that manages all the needs of the web site that have
	//to do with user accounts.
	class account{
		
		//Gets all the accounts from the database and returns
		//an array of string back to the caller.
		public function getAccountFromDAO(){
			$query = "SELECT * FROM accounts";
			$result = mysql_query($query);
			
			$i=0;
			while($account = mysql_fetch_array($result)){
				$accountArray[$i] = $account['ACCOUNT_TYPE']."  ".$account['USERNAME']."  ".$account['PASSWORD']." ".$account['EMAIL']." ".$account['SEX']." ".$account['BIRTH_DATE']; 	
				$i++;
			}
			return $accountArray;
		}
		
	}
	
?>
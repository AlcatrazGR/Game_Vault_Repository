<?php
	//Script that checks if the account and password given by
	//the user exists on database.
	require("account.php");
	require("UserConnectivity.php");

	//if the fields have been filled and the button submit hash
	//been pressed.
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		 
		$accountObj = new account();
		//gets an M x D table with all the accounts 
		$results = $accountObj->getAccountFromDAO();
		$checkState = false;
		$accountName="";
		
		//with a loop checks if the account exists.
		for($i=0; $i<count($results); $i++){
			$singleAccount = $results[$i];
			if(($singleAccount[1] == $username) && ($singleAccount[2] == $password)){
				$checkState = true;
				$accountName = $singleAccount[1];
			}
		}
		
		//if the connection state is true (account exists) then
		//gain access
		if($checkState == true){
			$connectivityObj = new UserConnectivity();
			$connectivityObj->acname = $accountName;
			$connectivityObj->connectivityCheck();
		}
		else{
			echo "The account you have entered is invalid";
		}
		
	}
	else{
		echo "Error";
	}


?>
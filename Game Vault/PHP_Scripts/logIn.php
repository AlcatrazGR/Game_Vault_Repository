<?php
	//Script that checks if the account and password given by
	//the user exists on database.
	require("UserConnectivity.php");

	
	//if the fields have been filled and the button submit hash
	//been pressed.
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$connectivityObj = new UserConnectivity();
		
		//If the remember me checks box is set then set the datamember
		//with remember to 'yes' else 'no'
		if(isset($_POST['remember']))
			$connectivityObj->SetDataMember($username, $password, "", "yes");
		else
			$connectivityObj->SetDataMember($username, $password, "", "no");
			
		//Checks if the fields of the forms are empty
		$result = $connectivityObj->LogInFieldsEmptyCheck();
		if($result == null){
			
			//Checks if the account given exists in database.
			$result = $connectivityObj->AccountExistsInDataBase();
			if($result == null){
				$connectivityObj->SetCookieMaintenance();
				$result = $connectivityObj->SetCookieMessageToGreetingField();	
				echo $result;
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
		echo "Error occurred!, Need to submit form first!";
	}
	
	/*
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
		$results = $accountObj->GetAccountFromDAO();
		$checkState = false;
		
		//with a loop checks if the account exists.
		for($i=0; $i<count($results); $i++){
			$singleAccount = $results[$i];
			if(($singleAccount[1] == $username) && ($singleAccount[2] == $password)){
				$checkState = true;
				$accountType = $singleAccount[0];
			}
		}
		
		//if the connection state is true (account exists) then
		//gain access
		if($checkState == true){
			$connectivityObj = new UserConnectivity();
			$connectivityObj->setData($username, $accountType);
			$result = $connectivityObj->connectivityCheck();
		
			//if there isn't any cookie initialized for the user and the
			//check box is checked.
			if(($result == false) && (isset($_POST['remember']))){
				$connectivityObj->setPersistentUserCookie();
				header( "refresh:0.5;url=../index.php" );
			}
			else{
				$connectivityObj->setSessionCookie();
				header( "refresh:0.5;url=../index.php" );
			}
		}
		else{
			echo "The account you have entered is invalid";
		}	
	}
	else{
		echo "Error";
	}

	*/
?>
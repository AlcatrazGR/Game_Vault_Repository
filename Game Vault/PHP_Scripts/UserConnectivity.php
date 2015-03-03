<?php
	require 'databaseConnection.php';
	require 'account.php';
	
	class UserConnectivity{
		
		private $username;
		private $password;
		private $accountType;
		private $remember;
		
		//Classes constructor
		function __construct() {
			$this->username = "";
			$this->password = "";
			$this->accountType = "";
			$this->remember = "";
		}
		
		//Method that sets the data members of this class
		function SetDataMember($account, $psw, $acType, $rem) {
			$this->username = $account;
			$this->password = $psw;
			$this->accountType = $acType;
			$this->remember = $rem;
		}
		
		//Method that checks if one or both of the forms fields are empty
		function LogInFieldsEmptyCheck(){
			if(($this->username == "") || ($this->password == ""))
				return "Error occurred!, One or more fields are empty!";
			else
				return null;
		}
		
		//Method that checks if the typed account already exist in database
		function AccountExistsInDataBase(){
			$accountObj = new account();
			$results = $accountObj->GetAccountFromDAO();
			$message = "Error occurred!, The account or password is invalid!";
			
			while($line = mysql_fetch_array($results)){
				if(($line['USERNAME'] == $this->username) && (($line['PASSWORD'] == $this->password))){
					$this->accountType = $line['ACCOUNT_TYPE'];
					return null;
				}
			}
			
			return $message;
		}
		
		//Method that decides what type of cookie to set
		function SetCookieMaintenance(){
			if($this->remember == "yes"){
				$this->SetPersistentCookie();
			}
			else{
				$this->SetSessionCookie();
			}
		}
		
		//Method that sets a persistent cookie
		function SetPersistentCookie(){
			
			//expire time is set to 1 month
			$expires = time()+60*60*24*30;
			$value = $this->username." ".$this->accountType;
			$name = "GameVaultLoginCookie";
			
			//Creates a global cookie that can be accessed by all the script
			//despite if they are in a sub directory.
			setcookie($name, $value, $expires, '/');
		}
		
		//Method that sets a session cookie
		function SetSessionCookie(){
			return "session";
		}
		
		
		function SetCookieMessageToGreetingField(){
			if(isset($_COOKIE['GameVaultLoginCookie'])){
				$cookieContent = $_COOKIE['GameVaultLoginCookie'];
				$splittedData = explode(" ", $cookieContent);
								
				if($splittedData[1] == "admin")
					return "Hello, admin";
				else 
					return "Hello, ".$splittedData[0];
			}
		}
		
		
		
		
		
	}
	
	
	
	
	
	/*
	class UserConnectivity{
		
		public $acname;
		public $acType;
		
		public function setData($username, $type){
			$this->acname = $username;
			$this->acType = $type;
		}
		
		//Method that checks if there is a cookie enabled from
		//the last log in of the user (basically checks if the
		//user is logged in) (it will be used on index.html)
		public function connectivityCheck(){
			$check = false;
			
			if(isset($_COOKIE["user"])){
				$check = true;
				$this->acname = $_COOKIE["user"];
				$this->acType = "user";
			}
			if(isset($_COOKIE["admin"])){
				$check = true;
				$this->acname = $_COOKIE["admin"];
				$this->acType = "admin";
			}

			return $check;
		}
		
		//Sets a persistent cookie for the user
		public function setPersistentUserCookie(){
			$expires = time()+60*60*24*30;
			$value = $this->acname;
			
			if($this->acType == "admin"){
				$name = "admin";
				setcookie($name, $value, $expires, '/');
			}
			else{
				$name = "user";
				setcookie($name, $value, $expires, '/');
			}
		}
		
		//Sets a session cookie, in case the check box 
		//'remember me' is not set.
		public function setSessionCookie(){
		
			$expires = time()+0;
			$value = $this->acname;
			
			if($this->acType == "admin"){
				$name = "admin";
				setcookie($name, $value, $expires, '/');
			}
			else{
				$name = "user";
				setcookie($name, $value, $expires, '/');
			}
	
		}
	
		//Returns the account name if there is a cookie
		//else returns a string (used on greetings).
		public function getAccountName(){
			$cookieExistsence = $this->connectivityCheck();

			if($cookieExistsence == true){
				return "Hello, ".$this->acname;
			}
			else
				return "Hello, anonymous!";
		
		}
		
	}
	*/

?>
<?php

	class UserConnectivity{
		
		public $acname;

		public function setData($username){
			$this->acname = $username;
		}
		
		//Method that checks if there is a cookie enabled from
		//the last log in of the user (basically checks if the
		//user is logged in) (it will be used on index.html)
		public function connectivityCheck(){
			$check = false;
			if(isset($_COOKIE["user"])) {
				$check = true;
			}
			
			return $check;
		}
		
		//Sets a persistent cookie for the user
		public function setPersistentUserCookie(){
			$expires = time()+60*60*24*30;
			$name = "user";
			$value = $this->acname;
			
			setcookie($name, $value, $expires);
		}
	
		//Returns the account name if there is a cookie
		//else returns a string (used on greetings).
		public function getAccountName(){
			$cookieExistsence = $this->connectivityCheck();

			if($cookieExistsence == true){
				$username = $_COOKIE["user"];
				$this->setData($username);
				return $this->acname;
			}
			else
				return "Hello, anonymous!";
		
		}
		
	}
	

?>
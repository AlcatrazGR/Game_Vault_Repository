<?php

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
	

?>
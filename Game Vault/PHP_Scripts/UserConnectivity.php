<?php


	class UserConnectivity{
		
		public $acname;
		
		//Method that checks if there is a cookie enabled from
		//the last log in of the user (basically checks if the
		//user is logged in) (it will be used on index.html)
		public function connectivityCheck(){
			$check = false;
			if(isset($_COOKIE["user"])) {
				echo "Welcome ".$_COOKIE["user"];
				$check = true;
			}
			else {
				
			}
		}
	
	
	
	
	}

?>
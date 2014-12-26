<?php
	require("UserConnectivity.php");
	require("databaseConnection.php");
	
	//If the form has been successfully submited.
	if(isset($_POST['submit'])){
		
		//If rating has been submited
		if(isset($_POST["rating"])){
			$rate = $_POST["rating"];
			
			//Checks if a cookie exists for the specific user.
			$userConObj = new UserConnectivity();
			$conCheck = $userConObj->connectivityCheck();
			
			if($conCheck == true){
				
				$query = "SELECT * FROM ratings";
				$results = mysql_query($query);
				$rateExists = false;
				
				//Checks if the user has already rated that specific game.
				while($row = mysql_fetch_array($results)){
					if(($row['USERNAME'] == $userConObj->acname) && ($row['GAME_TITLE'] == $_GET['title'])){
						$rateExists = true;
					}
				}
				
				//If the user hasnt rated the  game then insert the new rating 
				if($rateExists == false){
					$query = "INSERT INTO ratings (USERNAME, GAME_TITLE, RATE) 
						VALUES ('".$userConObj->acname."', '".$_GET['title']."', '".$rate."')";
					mysql_query($query);
					
					echo "The rate has been submited successfully into the database <br />
						You will be redirected to the game page in short time...";
					header( "refresh:0.5;url=../_game.php" );
				}
				else{
					echo "You have already voted for this game! <br />
						You will be redirected back shortly ...";
					header( "refresh:0.5;url=../_game.php" );
				}
			}
			else{
				echo "You are not logged in! <br />
					You will be redirected back shortly ...";
				header( "refresh:0.5;url=../_game.php" );
			}
		}
		else{
			echo "You havent rated the game <br />
				You will be redirected back shortly ...";
			header( "refresh:0.5;url=../_game.php" );
		}
	}
	
				
?>
			
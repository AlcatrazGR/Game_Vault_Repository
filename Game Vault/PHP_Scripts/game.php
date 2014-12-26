<?php
	require 'databaseConnection.php';
	
	class game{
	
		public $gameTitle;
		public $minReq;
		public $maxReq;
		public $gameDesc;
		public $image;
		public $gamePlat;
		public $gameCateg;
		public $videoURL;
		
		//Setting game data members.
		public function setDataMembers($title, $min, $max, $desc, $gameImage, $platform, $category, $url){
			$this->gameTitle = $title;
			$this->minReq = $min;
			$this->maxReq = $max;
			$this->gameDesc = $desc;
			$this->image = $gameImage;
			$this->gamePlat = $platform;
			$this->gameCateg = $category;
			$this->videoURL = $url;
		}
		
		//Method that checks if the data given are Wright
		public function gameDataIntegrity(){
			$errorMessage="";
			
			if(strpos($this->videoURL, " ") !== false){
				$errorMessage .= "The youtube video url you have given contains invalid characters! <br />";
			}
			if(strpos($this->videoURL, "http://") === false){
				$errorMessage .= "The data you have given in the youtube video url is invalid ! <br />";
			}
			
			return $errorMessage;
		}
		
		//Method that checks the integrity of the game image
		//size, extension etc.
		public function gameImageIntegrity($file, $file_size, $file_ext){
			$errorMessage = "";
			$allowedExtensions = array("jpg","jpeg","gif","bmp","JPG","JPEG","GIF","BMP");

			//Chechs if the extension of the image is allowed
			if(in_array($file_ext, $allowedExtensions)){
				//Checks the image size
				if($file_size <= 697152){
					//Checks if the directory for the game images exists, if not it creates it
					if(!is_dir("Game/Images/")){
						mkdir("Game/Images/", 0777, true);
					}
				}
				else{
					$errorMessage .= "The size of the image exceeds the limit !! <br />";
				}
			}
			else{
				$errorMessage .= "The extension of the file is invalid !! <br />";
			}
			return $errorMessage;			
		}
		
		//Method that checks if the data given already exist in DAO
		public function gameDataExistInDatabase(){
			$check = true;
			$query = "SELECT * FROM games";
			$result = mysql_query($query);
			
			while($row = mysql_fetch_array($result)){ 
				if(($this->gameTitle == $row["GAME_TITLE"]) && ($this->image == $row["IMAGE"])){
					$check = false;
				}
			}
			
			return $check;
		}

		//Method that inserts the new data row in the table 'game'
		public function insertGameToDatabase($dest, $fname){
			move_uploaded_file($fname, $dest); 
			
			$gameTitle = $this->gameTitle;
			$minReq =$this->minReq;
			$maxReq =$this->maxReq;
			$gameDesc = $this->gameDesc;
			$image = $this->image;
			$gamePlat = $this->gamePlat;
			$gameCateg = $this->gameCateg;
			$videoURL = $this->videoURL;

			$query = "INSERT INTO games (GAME_TITLE, MIN_REQUIRE, MAX_REQUIRE, DESCRIPTION, IMAGE, PLATFORM, CATEGORY, VIDEO_URL) 
			VALUES ('".$gameTitle."', '".$minReq."','".$maxReq."', '".$gameDesc."', 
			'".$image."', '".$gamePlat."','".$gameCateg."', '".$videoURL."');";

			mysql_query($query);
		}
		
		//Method that handles the process of returning the list of games that exist
		//in database. The two parametres are used to define the machine that the 
		//games are working and the their category.
		public function getGamesList($platform, $category){
			if($category == "All"){
				$query = "SELECT GAME_TITLE,PLATFORM,CATEGORY FROM games WHERE PLATFORM = '".$platform."'";
				$results = mysql_query($query);
				return $results;
			}
			else{
				$query = "SELECT GAME_TITLE,PLATFORM,CATEGORY FROM games WHERE ((PLATFORM = '".$platform."') && (CATEGORY = '".$category."'))";
				$results = mysql_query($query);
				return $results;
			}
		}
		
		public function getGamesSortedByCategoryAndPlatform($platform, $category){
			if($category == "All"){
				$query = "SELECT * FROM games WHERE PLATFORM = '".$platform."'";
				$results = mysql_query($query);
				return $results;
			}
			else{
				$query = "SELECT * FROM games WHERE ((PLATFORM = '".$platform."') && (CATEGORY = '".$category."'))";
				$results = mysql_query($query);
				return $results;
			}
		}
		
		//Returns the games sorted by the platform of the game, its genre and by the sorting letter
		//the user selected.
		public function getGamesSortedByGameTitle($platform, $category, $sortingLetter){
			$query = "SELECT * FROM games WHERE ((PLATFORM = '".$platform."') AND (GAME_TITLE LIKE '".$sortingLetter."%'))";
			$results = mysql_query($query);
			return $results;	
		}
		
		//Return all the games which rating was 4 or 5 stars.
		public function getGamesBasedOnTheRating(){
			$query = "SELECT ratings.GAME_TITLE, games.GAME_TITLE, games.IMAGE, games.PLATFORM, games.CATEGORY, ratings.RATE
				FROM games, ratings WHERE ( (ratings.GAME_TITLE = games.GAME_TITLE) AND (ratings.RATE >= 4) );";
			$results = mysql_query($query);
			return $results;
			/*
			$query1= "SELECT GAME_TITLE, IMAGE, PLATFORM, CATEGORY FROM games";
			$results1 = mysql_query($query1);
			
			$query2= "SELECT * FROM ratings";
			$results2 = mysql_query($query2);
			
			$i = 0;
			$dataArray = array();
			while($row1 = mysql_fetch_array($results1)){
				while($row2 = mysql_fetch_array($results2)){
					if(($row1['GAME_TITLE'] == $row2['GAME_TITLE']) && ($row2['RATE'] >= 4)){
						$dataArray[$i] = $row1['GAME_TITLE']."/".$row1['PLATFORM']."/".$row1['CATEGORY']."/".$row2['RATE'];
						$i++;
					}
				}
			}
			
			return $dataArray;
			*/
		}
	
	}






?>
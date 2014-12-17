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
		
		}

		//Method that inserts the new data row in the table 'game'
		public function insertGameToDatabase(){
		
		}
		
	
	}






?>
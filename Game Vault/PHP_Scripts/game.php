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
	
	}






?>
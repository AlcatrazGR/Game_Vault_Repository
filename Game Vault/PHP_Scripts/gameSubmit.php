<?php

	//Array with all the names of the components that must be filled
	//in the form
	$requiredFields = array('gameTitle', 'minRequirements', 'maxRequirements', 'description', 'gamePlatform', 'gameCategory');
	
	//sets an error flag and passes all the above array checking if
	//any of the fields are empty.
	$error = false;
	foreach($requiredFields as $field) {
		if (empty($_POST[$field])) {
			$error = true;
		}
	}	
	
	if($error){
		die("You must first fill all the form fields");
	}
	else{
		$gameTitle = $_POST['gameTitle'];
		$minGameReq = $_POST['minRequirements'];
		$maxGameReq = $_POST['maxRequirements'];
		$gameDescr = $_POST['description'];
		$gamePlat = $_POST['gamePlatform'];
		$gameCateg = $_POST['gameCategory'];
		$file = $_FILES['gameImage'];
		$file_name = $file['name'];
		
		//checks if the 'file' field is not empty
		if($file_name != ""){ 
			echo $file_name." : file name";
		}
		else{
			header( "refresh:3;url=../adminSubmitForm.php" );
			echo "You didn't select any images";
		
		}
	
	}
	
	
	
	
?>
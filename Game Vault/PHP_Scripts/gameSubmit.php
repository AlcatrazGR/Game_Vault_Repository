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

?>
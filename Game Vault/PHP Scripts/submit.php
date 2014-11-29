<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	$rpassword = $_POST['repassword'];
	
	$email = $_POST['email'];
	$emailService = $_POST['emailService'];
	$email = $email."@".$emailService;
	
	$sexType = $_POST['sex'];
	
	$date = $_POST['date'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$bdate = $date."-".$month."-".$year;

	echo $username." ".$password." ".$email." ".$sexType." ".$bdate." ";


?>
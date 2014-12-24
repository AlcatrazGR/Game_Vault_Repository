<html>
	<head>
		<title> <?php echo $_GET['title'] ?> </title>
		
		<!--Initializing the css file for the structure of the site-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/mainStructure.css"></link>
		<!--Initializing the css file for the menu of the site-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/styles.css"></link>
		<!--Initializing the css file for main style of the index-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/indexStyle.css"></link>
		<!--CSS file that is responsible for the cascade style of the game form-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/gameFormStyle..css"></link>
		
	</head>
	<body background="Images/PageStyle/background.jpg">
		
		<!--Container Start-->
		<div id='container'>
		
			<!--Header Part-->
			<div id="header">
				<div id="logo"> <img id="logoImg" src="Images/PageStyle/logo.gif"> </div>
				<div id="banner"> <img id="bannerImg" src="Images/PageStyle/Banner.jpg"> </div>
			</div>
			
			<!--Menu Part-->
			<div id="cssmenu"> 
				<ul>
					<li> <a href='index.php'> <span> Home </span> </a> </li>
					<li> <a href='pcGames.php'> <span> PC </span> </a> </li>
					<li> <a href='#'> <span> XBOX One </span> </a> </li>
					<li> <a href='#'> <span> PS4 </span> </a> </li>
					<li> <a href='#'> <span> Wii U </span> </a> </li>
					<li class='active has-sub' > <a href='#'> <span> Other </span> </a> 
						<ul>
							<li class='has-sub'> <a href='#'> Nintendo </a>
								<ul>
									<li> <a href='#'> GameCube </a> </li>
									<li> <a href='#'> Wii </a> </li>
									<li> <a href='#'> Nintendo 64 </a> </li>
								</ul>
							</li>
							<li class='has-sub'> <a href='#'> Sony Playstation </a>
								<ul>
									<li> <a href='#'> Playstation 2 </a> </li>
									<li> <a href='#'> Playstation 3 </a> </li>
								</ul>
							</li>
							<li class='has-sub'> <a href='#'> XBOX </a>
								<ul>
									<li> <a href='#'> XBOX </a> </li>
									<li> <a href='#'> XBOX 360 </a> </li>
								</ul>
							</li>
						</ul>
					</li>
					<li> <a href='#'> <span> News </span> </a> </li>
					<li> <a href='signIn.php'> <span> Sign In </span> </a> </li>
				</ul>		
			</div>
			
			<div id="content_area">
				<div id="main_game_form">
					<?php
						require("PHP_Scripts/game.php");
						
						$gameObj = new game();
						$results = $gameObj->getGamesSortedByCategoryAndPlatform($_GET['platform'], "All");
						
						while($row = mysql_fetch_array($results)){
							if($_GET["title"] == $row["GAME_TITLE"]){
								$gameObj->setDataMembers($row["GAME_TITLE"], $row["MIN_REQUIRE"], $row["MAX_REQUIRE"],
									$row["DESCRIPTION"], $row["IMAGE"], $row["PLATFORM"], $row["CATEGORY"],
									$row["VIDEO_URL"]);
							}
						}
					?>
					<table>
						<tr>
							<?php 
								$imagePath = "PHP_Scripts/Game/Images/".$gameObj->image;
								echo "<td> <img id='gameImage' src=".$imagePath." /> </td>";
								
							?>
						</tr>
					</table>
				</div>
			</div>
			
			<!--Footer Part-->
			<div id="footer"> Footer </div>
		</div>
	</body>
<html>

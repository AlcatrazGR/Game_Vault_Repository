<html>
	<head>
		<title> <?php echo $_GET['title'] ?> </title>
		<meta charset='UTF-8'>
		<!--Initializing the css file for the structure of the site-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/mainStructure.css"></link>
		<!--Initializing the css file for the menu of the site-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/styles.css"></link>
		<!--Initializing the css file for main style of the index-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/indexStyle.css"></link>
		<!--CSS file that is responsible for the cascade style of the game form-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/gameFormStyle.css"></link>
		
	</head>
	<body background="Images/PageStyle/background.jpg">
		
		<!--Container Start-->
		<div id='container'>
		
			<!--Header Part-->
			<div id="header">
				<div id="logo"> <img id="logoImg" src="Images/PageStyle/logo.gif"> </div>
				<div id="banner"> <img id="bannerImg" src="Images/PageStyle/Banner.gif"> </div>
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
					<div id="gameImagePart">
						<?php 
							$imagePath = "PHP_Scripts/Game/Images/".$gameObj->image;
							echo "<img id='gameImage' src=".$imagePath." />";
						?>
					</div>
					
					<div id="gameTitlePart">
						<?php echo "<h1 id='gameTitleForm'>".$gameObj->gameTitle."</h1>"; ?>
					</div>
					
					<div id="minReqPart">
						<b> Minimum Requirements : </b> <br /><br />
						<?php echo $gameObj->minReq;?>
					</div>
					
					<div id="maxReqPart">
						<b> Maximum Requirements : </b> <br /><br />
						<?php echo $gameObj->maxReq;?>
					</div>

					<div id="gameDescriptionPart">
						<b> Game Plot </b> <br /><br />
						<?php echo $gameObj->gameDesc; ?>
					</div>
					
					<div id="gameVideoPart">
						<b> Game Trailer </b> <br /><br />
						<?php
							$url = "http://www.youtube.com/v/";
							$videoCode = end((explode('/', $gameObj->videoURL )));
							$videoURL = $url.$videoCode;
					
							echo "
								<center>
								<object width='450' height='345'
									data='".$videoURL."'>
								</object>
								</center>
							";
						?>
					</div>
					
				</div>
			</div>
			
			<!--Footer Part-->
			<div id="footerPC"> 
				<form  action="PHP_Scripts/gameRating.php?title=<?php echo $gameObj->gameTitle; ?>" method="POST" enctype="multipart/form-data" >
					<span class="rating">
						<input type="radio" id="star5" name="rating" value="5" />
							<label for="star5" title="Rocks!">5 stars</label>
						<input type="radio" id="star4" name="rating" value="4" />
							<label for="star4" title="Pretty good">4 stars</label>
						<input type="radio" id="star3" name="rating" value="3" />
							<label for="star3" title="Meh">3 stars</label>
						<input type="radio" id="star2" name="rating" value="2" />
							<label for="star2" title="Kinda bad">2 stars</label>
						<input type="radio" id="star1" name="rating" value="1" />
							<label for="star1" title="Sucks big time">1 star</label>
					</span>
					<input id="ratingBtn" type="submit" name="submit" value="Submit Rating"/>
				</form>

			</div>
		</div>
	</body>
<html>

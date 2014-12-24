<html>
	<head>
		<title> Game Vault </title>
		<meta charset='UTF-8'>
		
		<!--Meta Descriptions-->
		<meta name="keywords" content="Games, Gaming, Game Reviews, Reviews, Game Platforms,
		Game Trailers">
		<meta name="description" content="The Best Site For Game Reviews For Every Platform">
		
		<!--Initializing the css file for the structure of the site-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/mainStructure.css"></link>
		<!--Initializing the css file for the menu of the site-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/styles.css"></link>
		<!--Initializing the css file for main style of the index-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/indexStyle.css"></link>

		
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
				<div id="main_contentPC">
					<br />
					<center>
						<a href="#"> # </a> - <a href="#"> A </a> - <a href="#"> B </a> - <a href="#"> C </a>
						- <a href="#"> D </a> - <a href="#"> E </a> - <a href="#"> F </a> - <a href="#"> G </a>
						- <a href="#"> H </a> - <a href="#"> I </a> - <a href="#"> J </a> - <a href="#"> K </a>
						- <a href="#"> L </a> - <a href="#"> M </a> - <a href="#"> N </a> - <a href="#"> O </a>
						- <a href="#"> P </a> - <a href="#"> Q </a> - <a href="#"> R </a> - <a href="#"> S </a>
						- <a href="#"> T </a> - <a href="#"> U </a> - <a href="#"> V </a> - <a href="#"> W </a>
						- <a href="#"> X </a> - <a href="#"> Y </a> - <a href="#"> Z </a>
				
						<br /> <br />
					
						<table id="gameList">
							<tr>
								<td> Title </td>
								<td> Console </td>
								<td> Genre </td>
							</tr>
							<?php
								require("PHP_Scripts/game.php");
								$gameObj = new game();
								$results = $gameObj->getGamesList("pc", "All");
								
								while($row = mysql_fetch_array($results)){
									echo "<tr>
											<td> <a href='_game.php?title=".$row["GAME_TITLE"]."'>".$row["GAME_TITLE"]."</a> </td> 
											<td> ".$row["PLATFORM"]." </td>
											<td> ".$row["CATEGORY"]." </td>
										 </tr>";
								}
							?>
						</table>
					</center>
				</div>
				
			</div>
			
			<!--Footer Part-->
			<div id="footer"> Footer </div>
		</div>
	</body>
</html>


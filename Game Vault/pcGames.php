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
						<a href="pcGames.php?sort=All"> # </a> - <a href="pcGames.php?sort=A"> A </a> - <a href="pcGames.php?sort=B"> B </a>
						- <a href="pcGames.php?sort=C"> C </a> - <a href="pcGames.php?sort=D"> D </a> - <a href="pcGames.php?sort=E"> E </a> 
						- <a href="pcGames.php?sort=F"> F </a> - <a href="pcGames.php?sort=G"> G </a> - <a href="pcGames.php?sort=H"> H </a> 
						- <a href="pcGames.php?sort=I"> I </a> - <a href="pcGames.php?sort=J"> J </a> - <a href="pcGames.php?sort=K"> K </a>
						- <a href="pcGames.php?sort=L"> L </a> - <a href="pcGames.php?sort=M"> M </a> - <a href="pcGames.php?sort=N"> N </a> 
						- <a href="pcGames.php?sort=O"> O </a> - <a href="pcGames.php?sort=P"> P </a> - <a href="pcGames.php?sort=Q"> Q </a> 
						- <a href="pcGames.php?sort=R"> R </a> - <a href="pcGames.php?sort=S"> S </a> - <a href="pcGames.php?sort=T"> T </a> 
						- <a href="pcGames.php?sort=U"> U </a> - <a href="pcGames.php?sort=V"> V </a> - <a href="pcGames.php?sort=W"> W </a>
						- <a href="pcGames.php?sort=X"> X </a> - <a href="pcGames.php?sort=Y"> Y </a> - <a href="pcGames.php?sort=Z"> Z </a>
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
								
								$sortLetter = null;
								$sortCateg = null;
								
								if(isset($_GET['categ']))
									$sortCateg = $_GET['categ'];
								if(isset($_GET['sort'])){
									echo "sort is setted";
									$sortLetter = $_GET['sort'];
								}
								
								echo " Sorting Cate : ".$sortCateg." <br />";
								echo " Sorting Let : ".$sortLetter."<br />";
								
								if((!isset($sortLetter)) && (!isset($sortCateg))){
									$results = $gameObj->getGamesList("pc", "All");
									while($row = mysql_fetch_array($results)){
										echo "<tr>
											<td> <a href='_game.php?title=".$row["GAME_TITLE"]."&platform=".$row["PLATFORM"]."'>".$row["GAME_TITLE"]."</a> </td> 
											<td> ".$row["PLATFORM"]." </td>
											<td> ".$row["CATEGORY"]." </td>
											</tr>";
									}
								}
								else if((isset($sortLetter)) && (!isset($sortCateg))){
									if($sortLetter == 'All'){
										$results = $gameObj->getGamesList("pc", "All");
										while($row = mysql_fetch_array($results)){
											echo "<tr>
												<td> <a href='_game.php?title=".$row["GAME_TITLE"]."&platform=".$row["PLATFORM"]."'>".$row["GAME_TITLE"]."</a> </td> 
												<td> ".$row["PLATFORM"]." </td>
												<td> ".$row["CATEGORY"]." </td>
												</tr>";
										}
									}
									else{
										$results = $gameObj->getGamesSortedByGameTitle("pc", "All", $_GET['sort']);
										while($row = mysql_fetch_array($results)){
											echo "<tr>
												<td> <a href='_game.php?title=".$row["GAME_TITLE"]."&platform=".$row["PLATFORM"]."'>".$row["GAME_TITLE"]."</a> </td> 
												<td> ".$row["PLATFORM"]." </td>
												<td> ".$row["CATEGORY"]." </td>
												</tr>";
										}
									}
								}
								else if((!isset($sortLetter)) && (isset($sortCateg))){
									$results = $gameObj->getGamesSortedByCategoryAndPlatform("pc", $sortCateg);
									while($row = mysql_fetch_array($results)){
										echo "<tr>
											<td> <a href='_game.php?title=".$row["GAME_TITLE"]."&platform=".$row["PLATFORM"]."'>".$row["GAME_TITLE"]."</a> </td> 
											<td> ".$row["PLATFORM"]." </td>
											<td> ".$row["CATEGORY"]." </td>
											</tr>";
									}
								}
							?>
						</table>
					</center>
				</div>
				
				<div id="rightColPc">
					<p id="sortByGenre">	
						<b> Sort By Genre : </b> <br /> <br />
						<a href="pcGames.php?categ=roleplaying"> Role - Playing </a> <br />
						<a href="pcGames.php?categ=action"> Action </a> <br />
						<a href="pcGames.php?categ=actionadventure"> Action - Adventure </a> <br />
						<a href="pcGames.php?categ=adventure"> Adventure  </a> <br />
						<a href="pcGames.php?categ=simulation"> Simulation </a> <br />
						<a href="pcGames.php?categ=strategy"> Strategy </a> <br />
						<a href="pcGames.php?categ=sports"> Sports </a> <br />
						<a href="pcGames.php?categ=mmorpg"> MMO RPG </a> <br />
						<a href="pcGames.php?categ=mmorts"> MMO RTS </a> <br />
					</p>
					
				</div>
				
			</div>
			
			<!--Footer Part-->
			<div id="footer"> Footer </div>
		</div>
	</body>
</html>


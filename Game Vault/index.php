<?php
	if(isset($_GET['status'])){
		if((isset($_COOKIE['user']))){
			setcookie("user", "", time() - 3600);
		}
		else if(isset($_COOKIE['admin'])){
			setcookie("admin", "", time() - 3600);
		}
	}
?>
<html>
	<head>
		<title> Game Vault </title>
		<meta charset='UTF-8'>
		
		<!--Meta Descriptions-->
		<meta name="keywords" content="Games, Gaming, Game Reviews, Reviews, Game Platforms,
		Game Trailers">
		<meta name="description" content="The Best Site For Game Reviews For Every Platform">
		
		<!--Initializing the css file for the structure of the site-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/mainStructure.css"> </link>
		<!--Initializing the css file for the menu of the site-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/styles.css"> </link>
		<!--Initializing the css file for main style of the index-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/indexStyle.css"> </link>
		
		<link rel="stylesheet" type="text/css" href="CSS_Files/favorites.css"> </link>
		
		<script type="text/javascript">
			function invisible(){
				document.getElementById("adminlink").style.display="none";
				
				try{
					var myCookie = getCookie("user");
				}
				catch{}
				try{
					var myCookie = getCookie("admin");
				}
				catch{}
				
				if(myCookie != null){
					if(myCookie == "admin")
						document.getElementById("adminlink").style.display="initial";
				}
			}
			
			function getCookie(name) {
				var dc = document.cookie;
				var prefix = name + "=";
				var begin = dc.indexOf("; " + prefix);
				if (begin == -1) {
					begin = dc.indexOf(prefix);
					if (begin != 0) 
						return null;
				}
				else {
					begin += 2;
					var end = document.cookie.indexOf(";", begin);
					if (end == -1) {
						end = dc.length;
					}
				}
				return unescape(dc.substring(begin + prefix.length, end));
			} 
			
			function logOutProcess(){
				
			}
			
		</script>
		
	</head>
	<body background="Images/PageStyle/background.jpg" onload="invisible()">
		
		<!--Container Start-->
		<div id='container'>
		
			<!--Header Part-->
			<div id="header">
				<div id="logo"> <img id="logoImg" src="Images/PageStyle/logo.gif"></div>
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
					<li id="adminlink"> <a href='adminSubmitForm.php'> <span> Admin </span> </a> </li>
				</ul>		
			</div>
			
			<!-- Slide show area start-->
			<div id="slideShow">
				<!-- all the slide show is basically a unsorted list list-->
				<ul class="slides">
					<!--Every slide is consisted of an image and radio button-->
					
					<!--1st Image-->
					<input type="radio" name="radio-btn" id="img-1" checked />
					<li class="slide-container">
						<div class="slide">
							<img src="http://wallpapers55.com/wp-content/uploads/2013/07/WoW-Arthas-Wallpapers-HD.jpg" />
						</div>
						<div class="nav">
							<!-- The &#x2039 special character means a single left-pointing angle (the pointer on the slides) -->
							<label for="img-6" class="prev"> &#x2039; </label>
							<label for="img-2" class="next"> &#x203a; </label>
						</div>
					</li>
					
					<!--2nd Image-->
					<input type="radio" name="radio-btn" id="img-2" />
					<li class="slide-container">
						<div class="slide">
							<img src="http://images7.alphacoders.com/324/324431.png" />
						</div>
						<div class="nav">
							<label for="img-1" class="prev">&#x2039;</label>
							<label for="img-3" class="next">&#x203a;</label>
						</div>
					</li>

					<!--3rd Image-->
					<input type="radio" name="radio-btn" id="img-3" />
					<li class="slide-container">
						<div class="slide">
							<img src="http://www.hdwallpapers.in/walls/battlefield_4_china_rising-wide.jpg" />
						</div>
						<div class="nav">
							<label for="img-2" class="prev">&#x2039;</label>
							<label for="img-4" class="next">&#x203a;</label>
						</div>
					</li>

					<!--4th Image-->
					<input type="radio" name="radio-btn" id="img-4" />
					<li class="slide-container">
						<div class="slide">
							<img src="http://www.photolazy.com/wp-content/uploads/2014/03/crysis-3-bow-hd-wallpaper-1920x1080px-crysis-3-wallpaper-hd-games-photo-crysis-3-wallpaper.jpg" />
						</div>
						<div class="nav">
							<label for="img-3" class="prev">&#x2039;</label>
							<label for="img-5" class="next">&#x203a;</label>
						</div>
					</li>

					<!--5th Image-->
					<input type="radio" name="radio-btn" id="img-5" />
					<li class="slide-container">
						<div class="slide">
							<img src="http://i57.tinypic.com/30x8wus.jpg" />
						</div>
						<div class="nav">
							<label for="img-4" class="prev">&#x2039;</label>
							<label for="img-6" class="next">&#x203a;</label>
						</div>
					</li>

					<!--6th Image-->
					<input type="radio" name="radio-btn" id="img-6" />
					<li class="slide-container">
						<div class="slide">
							<img src="http://www.wallpaperseries.com/files/wallpapers-1002/World-of-Warcraft-Warlords-of-Draenor-HD-Wallpaper-3306.jpg" />
						</div>
						<div class="nav">
							<label for="img-5" class="prev">&#x2039;</label>
							<label for="img-1" class="next">&#x203a;</label>
						</div>
					</li>

					<!--List Index for all the dots at the slide show-->
					<li class="nav-dots">
						<!--The label tag defines the a label for an input type object-->
						<!--The for attribute of a label tag specifies which element a label tag is bound to-->
						<label for="img-1" class="nav-dot" id="img-dot-1"></label>
						<label for="img-2" class="nav-dot" id="img-dot-2"></label>
						<label for="img-3" class="nav-dot" id="img-dot-3"></label>
						<label for="img-4" class="nav-dot" id="img-dot-4"></label>
						<label for="img-5" class="nav-dot" id="img-dot-5"></label>
						<label for="img-6" class="nav-dot" id="img-dot-6"></label>
					</li>
				</ul>
			</div> <!-- Slide Show End -->

			<!--Conent Area with the main and the right column-->
			<div id="content_area">
				<div id="main_content">
					<div id="greetings">
						
						<?php 
							include("PHP_Scripts/UserConnectivity.php");
							
							$usercon = new UserConnectivity(); 
							$usname = $usercon->getAccountName();
							echo $usname;
						?>
						
						<a id="logOutLink" href="index.php?status=logout"> Log Out </a>
						
						
					</div>
					<p>
						<h2> Welcome to <u> Guild Vault</u> ! </h2>
						The best site for game reviews - walkthroughs - trailers and more. 
						<br /> <br /><br /> 
						
						<img class="introIcons" src="Images/PageStyle/icon1.gif" />
						If you haven't made already an account you can just click here :
						<a href='signIn.php'> make new account </a> or you can just click
						the selection "SIGN IN" on the menu above. <br /> <br /> <br /> <br /> 
						
						
						<img class="introIcons" src="Images/PageStyle/icon4.gif" />
						Browse your favorite games through a wide variety of gaming platforms,
						such as : <a href="#"> PC </a> - <a href=""> Playstation 4 </a> -
						<a href="#"> XBOX One </a> - <a href="#"> Wii U </a> and more, 
						or by the category of the game. <br /> <br /> <br /> 
						 
						<img class="introIcons" src="Images/PageStyle/icon6.gif" />
						You can learn the latest news, game releases, announcements from
						all the gaming companies and also events of COMICON, by clicking
						here : <a href="#"> News </a> or by selecting the "News" on the 
						menu above.
					</p>
				</div>
				
				<div id="right_col">
					<div id="rightColWrapper">
					<div id="login">
						<form id="loginForm" action="PHP_Scripts/logIn.php" method="POST" enctype="multipart/form-data">
							<b>Unlock the Vault</b> <br />
							<br>
							Username:&nbsp;<input type="text" name="username"><br /><br />
							Password:&nbsp;&nbsp;<input type="password" name="password"><br /><br />
							<input type="checkbox" name="remember" /> &nbsp; Keep me logged in<br /><br />
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="submit" value="Log In" name="submit" />
						</form>
					</div>
					
					<div id="favorites">
						<b> Favorites <b> <br /><br />
						<?php
							require("PHP_Scripts/game.php");
							$gameObj = new game();
							$favGames = $gameObj->getGamesBasedOnTheRating();
	
							$i=0;
							while($row = mysql_fetch_array($favGames)){
								$rndNum = rand(0,9);
								if(($i < 3) && ($rndNum > 3)){
									$imgPath = "PHP_Scripts/Game/Images/".$row['IMAGE'];
									echo "
										<table id='favTable'>
											<tr>
												<td class='firstRow'> ".$row['GAME_TITLE']." </td>
												<td rowspan='4'> <img id='favImg' src=".$imgPath."> </td>
											</tr>
												
											<tr>
												<td class='firstRow'> ".$row['PLATFORM']." </td>
										
											</tr>
											
											<tr>
												<td class='firstRow'> ".$row['CATEGORY']." </td>
											
											</tr>
												
											<tr>
												<td class='firstRow'> ".$row['RATE']." </td>
											
											</tr>
										</table>
										<br />
									";
									$i++;
								}
							}

						?>
					</div>
					</div>
				</div>
			</div>
			
			<!--Footer Part-->
			<div id="footer"> Footer </div>
		</div>
	</body>
</html>


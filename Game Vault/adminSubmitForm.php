<html>
	<head>
		</title> Admin Form </title>
		<meta charset='UTF-8'>
		<!--Initializing the css file for the structure of the site-->
		<link rel="stylesheet" type="text/css" href="CSS Files/mainStructure.css">
		<!--Initializing the css file for the menu of the site-->
		<link rel="stylesheet" type="text/css" href="CSS Files/styles.css">
		<!--Initializing the css file for main style of the index-->
		<link rel="stylesheet" type="text/css" href="indexStyle.css"> </link>
	</head>
	<body>
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
			
			<!--Conent Area with the main and the right column-->
			<div id="content_area">
					<div id="main_content">
				<form action="PHP_Scripts/gameSubmit.php" method="POST" enctype="multipart/form-data">
						Game Title &nbsp; : &nbsp;  <input type="text" name="gameTitle" /> <br /><br />
						Minimum Game Requirements &nbsp; : &nbsp;  <br /><textarea rows="10" cols="50" name="minRequirements"> </textarea> <br /> 
						Maximum Game Requirements &nbsp; : &nbsp;  <br /><textarea rows="10" cols="50" name="maxRequirements"> </textarea> <br />
						Game Description &nbsp; : &nbsp; <br /> <textarea rows="13" cols="50" name="description"> </textarea> <br /><br />
						Game Image &nbsp; : &nbsp; <input type="file" name="gameImage" /><br /><br />
						Youtube URL : <input type="text" name="url" /><br /><br />
						<input type="submit" name="submit" value="Submit Game" />
					</div>
					<div id="right_col">
					<div id="adminPlatfrom">
						<center> <h3> Choose a Platform : </h3> </center>
						<input type="radio" name="gamePlatform" value="pc" />PC <br />
						<input type="radio" name="gamePlatform" value="playstation2" />Playstation2 <br />
						<input type="radio" name="gamePlatform" value="playstation3" />Playstation3 <br />
						<input type="radio" name="gamePlatform" value="playstation4" />Playstation4<br />
						<input type="radio" name="gamePlatform" value="xbox" />Xbox<br />
						<input type="radio" name="gamePlatform" value="xbox360" />Xbox 360 <br />
						<input type="radio" name="gamePlatform" value="xboxone" />Xbox One<br />
						<input type="radio" name="gamePlatform" value="gamecube" />GameCube<br />
						<input type="radio" name="gamePlatform" value="wiiu" />Wii U<br />
						<input type="radio" name="gamePlatform" value="wii" />Wii<br />
						<input type="radio" name="gamePlatform" value="nintendo64" />Nintendo 64 
					</div>
					<div id="adminCategory">
						<center> <h3> Choose a Game Category : </h3> </center>
						<input type="radio" name="gameCategory" value="action" />Action <br />
						<input type="radio" name="gameCategory" value="actionadventure" />Action-Adventure <br />
						<input type="radio" name="gameCategory" value="adventure" />Adventure <br />
						<input type="radio" name="gameCategory" value="roleplaying" />Role-Playing <br />
						<input type="radio" name="gameCategory" value="simulation" />Simulation <br />
						<input type="radio" name="gameCategory" value="strategy" />Strategy <br />
						<input type="radio" name="gameCategory" value="sports" />Sports <br />
						<input type="radio" name="gameCategory" value="mmorpg" />MMO Role-Playing <br />
						<input type="radio" name="gameCategory" value="mmorts" />MMO RTS <br />
					</div>
					</div>
				</form>	
			</div>
					
			<!--Footer Part-->
			<div id="footer"> Footer </div>
		</div>
	</body>
	
	
	</body>	
</html>

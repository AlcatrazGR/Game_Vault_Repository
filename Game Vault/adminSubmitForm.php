<html>
	<head>
		</title> Admin Form </title>
		<meta charset='UTF-8'>
		<!--Initializing the css file for the structure of the site-->
		<link rel="stylesheet" type="text/css" href="CSS Files/mainStructure.css">
		<!--Initializing the css file for the menu of the site-->
		<link rel="stylesheet" type="text/css" href="CSS Files/styles.css">
		<!--Initializing the css file for main style of the index-->
		<link rel="stylesheet" type="text/css" href="CSS Files/indexStyle.css">
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
					<li> <a href='#'> <span> PC </span> </a> </li>
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
					<li id="adminlink"> <a href='#'> <span> Admin </span> </a> </li>
				</ul>		
			</div>
			
			<!--Conent Area with the main and the right column-->
			<div id="content_area">
				<div id="main_content">
					<form action="" method="POST" enctype="multipart/form-data">
						Game Title &nbsp; : &nbsp;  <input type="text" name="gameTitle" /> <br /><br />
						Minimum Game Requirements &nbsp; : &nbsp;  <br /><textarea rows="10" cols="50" name="minRequirements"> </textarea> <br /> 
						Maximum Game Requirements &nbsp; : &nbsp;  <br /><textarea rows="10" cols="50" name="minRequirements"> </textarea> <br />
						Game Description &nbsp; : &nbsp; <br /> <textarea rows="13" cols="50" name="minRequirements"> </textarea> <br /><br />
						Game Image &nbsp; : &nbsp; <input type="file" name="gameImage" />
					</form>
				</div>

			</div>
			
			<!--Footer Part-->
			<div id="footer"> Footer </div>
		</div>
	</body>
	
	
	</body>	
</html>

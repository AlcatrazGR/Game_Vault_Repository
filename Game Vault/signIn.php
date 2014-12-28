<html>
	<head>
		<title> Game Vault </title>
		<meta charset='UTF-8'>

		<!--Meta Descriptions-->
		<meta name="keywords" content="Games, Gaming, Game Reviews, Reviews, Game Platforms,
		Game Trailers">
		<meta name="description" content="The Best Site For Game Reviews For Every Platform">
		
		<!--Initializing the css file for the structure of the site-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/mainStructure.css">
		<!--Initializing the css file for the menu of the site-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/styles.css">
		<!--Initializing the css file for main style of the index-->
		<link rel="stylesheet" type="text/css" href="CSS_Files/indexStyle.css">
	</head>
	<body background="Images/PageStyle/background.jpg">
		
		<!--Container Start-->
		<div id='container'>
		
			<!--Header Part-->
			<div id="header">
				<div id="logo"> <img id="logoImg" src="Images/PageStyle/logo.gif"></div>
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
					<li class='active has-sub'> <a href='#'> <span> Other </span> </a> 
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

			<!--Conent Area with the main part-->
			<div id="content_area">
				<div id="main_content">		
					<form action="PHP_Scripts/submit.php" enctype="multipart/form-data" method="POST">

						<h3> Account Creation </h3>
						User Name :&nbsp; <input type="text" name="username" /> <br /> <br />
						Password : &nbsp; <input type="password" name="password" /> <br /> <br />
						Re Type Password : &nbsp; <input type="password" name="repassword" /> <br /> <br />
						Email : &nbsp; <input type="text" name="email" /> &nbsp; @ &nbsp; 
							<select name="emailService">
								<option value="hotmail.com"> hotmail.com </option>
								<option value="hotmail.gr"> hotmail.gr </option>
								<option value="gmail.com"> gmail.com </option>
								<option value="gmail.gr"> gmail.gr </option>
								<option value="outlook.com"> outlook.com </option>
								<option value="outlook.gr"> outlook.gr </option>
								<option value="yahoo.com"> yahoo.com </option>
								<option value="yahoo.gr"> yahoo.gr </option>
							</select> <br /> <br />
						Male : <input type="radio" name="sex" value="male"/>&nbsp;&nbsp;&nbsp; Female : <input type="radio" name="sex" value="female"/> 	
						<br /> <br />
						Birth Date : <br /> 
							<input type="number" name="date" value="Date" min="1" max="31" />&nbsp;
							<select name="month">
								<option value="January"> January </option>
								<option value="February"> February </option>
								<option value="March"> March </option>
								<option value="April"> April </option>
								<option value="May"> May </option>
								<option value="June"> June </option>
								<option value="July"> July </option>
								<option value="August"> August </option>
								<option value="September"> September </option>
								<option value="October"> October </option>
								<option value="November"> November </option>
								<option value="December"> December </option>
							</select> &nbsp;
							<input type="number" name="year" />
							<br /> <br />
						<input type="file" name="ImageToUpload" />
						
						<br /> <br />
						
						<!-- Div for the captcha field -->
						<div class="g-recaptcha" data-sitekey="6LcM6f4SAAAAAGeG6uOuDuncC-CoEtF8OUYw_cmx">
							<script type="text/javascript" src="http://api.recaptcha.net/challenge?k=6LcM6f4SAAAAAGeG6uOuDuncC-CoEtF8OUYw_cmx"></script>
						</div>
						<br />
						
						<input type="submit" value="Submit" name="submit" />
					</form>	
				</div>
			</div>
			
			<!--Footer Part-->
			<div id="footer"> Footer </div>
		</div>
	</body>
</html>
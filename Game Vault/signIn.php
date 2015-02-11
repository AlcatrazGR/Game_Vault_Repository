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
		<!--Initializing the css file for the account submit form-->
		<link rel="stylesheet" text="text/css" href="CSS_Files/accountSubmitFormStyle.css">
		
		<script>
			function checkForm(form){
				
				if(this.username.value == ""){
					return "The username field is empty. Please fill the above field!";
					this.username.focus();
				}
				else if(this.password.value == ""){
					return "The first name field is empty. Please fill the above field!";
					//this.fname.focus();
				}
				else if(this.repassword.value == ""){
					return "The last name field is empty. Please fill the above field!";
					//this.lname.focus();
				}
				else if(this.email.value == ""){
					return "The telephone number field is empty. Please fill the above field!";
					//this.telephone.focus();
				}
				else if(this.sex.value == ""){
					return "The semester field is empty. Please fill the above field!";
					//this.semester.focus();
				}
				else if(this.date.value == ""){
					return "The password field is empty. Please fill the above field!";
					//this.password.focus();
				}
				else if(this.year.value == ""){
					return "The repeat password field is empty. Please fill the above field!";
					//this.repassword.focus();
				}
				else if(this.ImageToUpload.value == ""){
					return "The email address field is empty. Please fill the above field!";
					//this.emailAddr.focus();
				}

				return "";

			}

			function validUser(){   
				var integMessage = 
				
				$.ajax({ 
					type: "POST",
					url: 'PHP_Scripts/submit.php',
					data: $('#frmAccount').serialize(),

					success: function(data){
						alert(data);
						//$("#logindisplay").append(data);
					}
				});
			}
			
		</script>
		
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
			<div id="submitContentArea">
				<div id="mainSubmitContent">		
					<form id="frmAccount" method="POST">
						<table id="formAccountTable">
							<tr>
								<td colspan="4"> <h3 id="accountSubmissionTitle"> Account Creation </h3> </td>
							</tr>
							<tr>
								<td> User Name : </td> 
								<td colspan="3"> <input id="username" type="text" name="username" /> </td>
							</tr>
							<tr>
								<td> Password : </td> 
								<td colspan="3"> <input id="password" type="password" name="password" /> </td>
							</tr>
							<tr>
								<td> Re Type Password : </td>
								<td colspan="3"> <input id="repassword" type="password" name="repassword" /> </td>
							</tr>
							<tr colspan="2">
								<td> Email : </td> 
								<td> <input id="email" type="text" name="email" /> @</td> 
								<td> 
									<select id="emailService" name="emailService">
										<option value="hotmail.com"> hotmail.com </option>
										<option value="hotmail.gr"> hotmail.gr </option>
										<option value="gmail.com"> gmail.com </option>
										<option value="gmail.gr"> gmail.gr </option>
										<option value="outlook.com"> outlook.com </option>
										<option value="outlook.gr"> outlook.gr </option>
										<option value="yahoo.com"> yahoo.com </option>
										<option value="yahoo.gr"> yahoo.gr </option>
									</select> 
								</td>
							</tr>
							<tr>
								<td> Male : </td> 
								<td> <input id="sex" type="radio" name="sex" value="male"/> </td> 
								<td> Female : </td> 
								<td> <input id="sex" type="radio" name="sex" value="female"/> </td>	
							</tr>
							<tr>
								<td> Birth Date : </td> 
								<td> <input id="date" type="number" name="date" value="Date" min="1" max="31" /> </td>
								<td>
									<select id="month" name="month">
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
									</select>
								</td>
								<td> <input id="year" type="number" name="year" /> </td>
							</tr>
							<tr>
								<td colspan="4"> <input id="ImageToUpload" type="file" name="ImageToUpload" /> </td>
							</tr>
							<tr>
								<td colspan="4">
									<!-- Div for the captcha field -->
									<div class="g-recaptcha" data-sitekey="6LcM6f4SAAAAAGeG6uOuDuncC-CoEtF8OUYw_cmx">
										<script type="text/javascript" src="http://api.recaptcha.net/challenge?k=6LcM6f4SAAAAAGeG6uOuDuncC-CoEtF8OUYw_cmx"></script>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<input type="submit" value="Submit New Account" name="submit" onClick=validUser()  />
								</td>
							</tr>
						</table>
					</form>	
				</div>
			</div>
			
			<!--Footer Part-->
			<div id="footer"> Footer </div>
		</div>
	</body>
</html>
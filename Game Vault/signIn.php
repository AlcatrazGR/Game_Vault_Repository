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
		
		<script type="text/javascript" src="Javascript/jquery-1.8.2.min.js"> </script>
		<script type="text/javascript" src="Javascript/accountRegistration.js"> </script>
		<script language="JavaScript" type="text/javascript">
			function ajaxPost() {
				//Create the XML HTTP Request object
				var hr = new XMLHttpRequest();
				
				//Create some variables that we need to send to our PHP file.
				var url = "PHP_Scripts/submit.php";
				var userName = document.getElementById("username").value;
				var password = document.getElementById("password").value;
				var rePassword = document.getElementById("repassword").value;
				var email = document.getElementById("email").value;
				var emailService = document.getElementById("emailService").value;
				
				var sex = "";
				if(document.getElementById("male").checked)
					sex = "male";
				else
					sex = "female";

				var date = document.getElementById("date").value;
				var month = document.getElementById("month").value;
				var year = document.getElementById("year").value;
				
				
				//A variable with value pairs of each field.
				var variablesCombination = "Username="+userName+"&Password="+password+"&RePassword="+rePassword
					+"&Email="+email+"&EmailService="+emailService+"&Sex="+sex+"&Date="+date
					+"&Month="+month+"&Year="+year;
				
				//Sets the parameters for the connection, the last one initializes the connection
				//to be asyncronized				
				hr.open("POST", url, true);
				
				//Set content type header information for sending url encoded variables in the request
				hr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				
				//Initializes a on ready state change event that occurs each time the state of the form
				//changes.
				hr.onreadystatechange = function () {
					if(hr.readyState == 4 && hr.status == 200){
						//Gets the data returned by the PHP script
						var returnData = hr.responseText;
						
					
						
						var photo = document.getElementById("ImageToUpload");
						var file = photo.files[0];
						returnData = "File Name : " + file.fileName;
					
						
						
						
						//Prints the above variables content to the answer div.
						document.getElementById("answerField").innerHTML = returnData;
						
					}
				}
				//Send the data to php script, and wait for response to update the status of the 
				//answer field (then the above event occurs).
				hr.send(variablesCombination);
				//Sets a beginning message before printing the returned message of the php script
				//can also be a animated gif image.
				document.getElementById("answerField").innerHTML = "processing ...";
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
								<td> <input id="male" type="radio" name="sex"/> </td> 
								<td> Female : </td> 
								<td> <input id="female" type="radio" name="sex"/> </td>	
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
									<!-- <input name="submit" type="submit" value="Submit New Account" id="accountRegistration" /> -->
									<!-- <button name="submit" type="submit" value="Submit Data" onClick="javascript:ajaxPost();"> -->
									<input name="submit" type="submit" value="Submit New Account" onClick="javascript:ajaxPost();"/>
								</td>
							</tr>
						</table>
					
					
					
					
					<div id="answerField"> </div>
					
				</div>
			</div>
			
			<!--Footer Part-->
			<div id="footer"> Footer </div>
		</div>
	</body>
</html>
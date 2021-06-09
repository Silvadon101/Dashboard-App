
<?PHP
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tab Login & Sign Up Forms</title>

<link rel="stylesheet" type="text/css" href="css/blue.css">
<style>

body
{
	font-family: "Trebuchet MS","Myriad Pro",Arial,sans-serif;
	background-color:#333; 
	margin:0;
	padding:0;
}

/** fonts used for the icons **/ 
@font-face {
    font-family: 'FontomasCustomRegular';
    src: url('fonts/fontomas-webfont.eot');
    src: url('fonts/fontomas-webfont.eot?#iefix') format('embedded-opentype'),
         url('fonts/fontomas-webfont.woff') format('woff'),
         url('fonts/fontomas-webfont.ttf') format('truetype'),
         url('fonts/fontomas-webfont.svg#FontomasCustomRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: 'FranchiseRegular';
    src: url('fonts/franchise-bold-webfont.eot');
    src: url('fonts/franchise-bold-webfont.eot?#iefix') format('embedded-opentype'),
         url('fonts/franchise-bold-webfont.woff') format('woff'),
         url('fonts/franchise-bold-webfont.ttf') format('truetype'),
         url('fonts/franchise-bold-webfont.svg#FranchiseRegular') format('svg');
    font-weight: normal;
    font-style: normal;

}

#wrapper{ width:1000px; margin:0 auto;}

#wrapper h1 {
    font-size: 36px;
    font-weight: normal;
    position: relative;
    text-align: center;
	color:#FFFFFF;
}

#container
{
	width:350px;
	margin:0 auto;
	padding-top:80px;
}


.tabs {
    position: relative;
	width: 350px;
}

.tabs input[type="radio"] {
	position: absolute;
	z-index: 1000;
	height: 37px;
	left: 0px;
	top: 0px;
	opacity: 0;
    -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: alpha(opacity=0);
	cursor: pointer;
}
.tabs input#tab-1{
	left: 0px;
	width:68px;
}
.tabs input#tab-2 {
    left: 83px;
    width: 57px;
}
.tabs input#tab-3 {
    left: 157px;
    width: 166px;
}
.tabs input#tab-4{
	left: 360px;
}

.tabs span {
	background: #039BFC;
	font-size: 15px;
	line-height: 40px;
	height: 40px;
	position: relative;
    float: left;
	display: block;
	color: #FFFFFF;
	letter-spacing: 1px;
	text-transform: uppercase;
	font-weight: bold;
	text-align: center;
    border-radius: 5px 5px 0 0;
	margin-right:10px;
	padding-left:8px;
	padding-right:8px;s
}

.tabs span:after {
    content: '';
	background: #fff;
	position: absolute;
	bottom: -2px;
	left: 0;
	width: 100%;
	height: 2px;
	display: block;
}

.tabs input:hover + span {
	background: #FFFFFF;
	color:#039BFC;
	
}

.tabs span:first-of-type {
    z-index: 4;
}

.tab-label-2 {
    z-index: 3;
}

.tab-label-3 {
    z-index: 2;
}

.tab-label-4 {
    z-index: 1;
}

.tabs input:checked + span {
    background: #fff;
	z-index: 6;
	color:#039BFC;
}

.clear-shadow {
	clear: both;
}

#content {
	position: relative;
	z-index: 5;
}

#content p{
float:left;
width:100%;
margin: 0 0 10px;
}
#content div {
	background: #fff;
	border-radius: 0 0 5px 5px;
    position: absolute;
	top: 0;
	left: 0;
	padding: 10px;
	z-index: 1;
    opacity: 0;

    -webkit-transition: opacity linear 0.1s;
    -moz-transition: opacity linear 0.1s;
    -o-transition: opacity linear 0.1s;
    -ms-transition: opacity linear 0.1s;
    transition: opacity linear 0.1s;
}

.tabs input.tab-selector-1:checked ~ #content .content-1,
.tabs input.tab-selector-2:checked ~ #content .content-2,
.tabs input.tab-selector-3:checked ~ #content .content-3,
.tabs input.tab-selector-4:checked ~ #content .content-4 {
	z-index: 100;
    -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    filter: alpha(opacity=100);
    opacity: 1;

    
}
#content div h2,
#content div h3{
	color: #398080;
}


#content .field {
    -moz-box-sizing: content-box;
    border: 1px solid #B2B2B2;
    border-radius: 3px 3px 3px 3px;
    box-shadow: 0 1px 4px 0 rgba(168, 168, 168, 0.6) inset;
    margin-top: 4px;
    padding: 10px 5px 10px 32px;
    transition: all 0.2s linear 0s;
    width: 288px;
}

#content label {
    color: #039bfc;
    position: relative;
}

#content input[type="submit"] {
    background: none repeat scroll 0 0 #039bfc;
    border: 1px solid #1C6C7A;
    border-radius: 3px 3px 3px 3px;
    box-shadow: 0 1px 6px 4px rgba(0, 0, 0, 0.07) inset, 0 0 0 3px #FEFEFE, 0 5px 3px 3px #D2D2D2;
    color: #FFFFFF;
    cursor: pointer;
    font-family: 'BebasNeueRegular','Arial Narrow',Arial,sans-serif;
    font-size: 15px;
    margin:0;
    padding: 5px;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.5);
    transition: all 0.2s linear 0s;
	float:right;    
}


#content [data-icon]:after {
    color: #039bfc;
    content: attr(data-icon);
    font-family: 'FontomasCustomRegular';
    left: 10px;
    position: absolute;
    top: 35px;
    width: 30px;
}

.signin{
    color: #039BFC;
    font-size: 14px;
}
.keeplogin{
    color: #039BFC;
    font-size: 14px;
}


.tw{
float:right;
}
.tw:before {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.1);
    color: #FFFFFF;
    content: "t";
    font-family: verdana;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
}
.media:before {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.1);
    border-radius: 0.15em 0 0 0.15em;
    box-shadow: 1px 0 0 rgba(0, 0, 0, 0.5), 2px 0 0 rgba(255, 255, 255, 0.5);
    float: left;
    font-size: 1.5em;
    margin: 0 1em 0 -1em;
    padding: 0 0.2em;
    pointer-events: none;
    text-align: center;
    width: 1em;
	color:#039BFC;
}
.tw, .tw:focus {
    background-color: #88E1E6;
}
.tw, .fb, .tw:hover, .fb:hover {
    background:#EEEEEE;
}
.media {
    background-color: #DDDDDD;
    background-image: -moz-linear-gradient(center top , #EEEEEE, #CCCCCC);
    border: 1px solid #B2B2B2;
    border-radius: 0.2em 0.2em 0.2em 0.2em;
    color: #333333;
    display: inline-block;
    padding: 0 1.5em;
    text-decoration: none;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.8);
    white-space: nowrap;
	font-size:16px;
	line-height:30px;
}
.fb{
float:left;
}
.fb:before {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.1);
    content: "f";
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
}


</style>
         <script  type="text/javascript">
function myFunction() {
  alert("Hello! You have registered successfully! Welcome");
}
</script>
</style>
         <script  type="text/javascript">
function myemailFunction() {
  alert("Hello! Email already exsist! Please try entering another email.");
}
</script>

<script  type="text/javascript">
function myemailnotFunction() {
  alert("Hello! Registration Denied! Please try again.");
}
</script>
</style>
</head>
<body>
<form action="" method="post"> 
<div id="wrapper">
  <h1>Tab Login & Sign Up Forms</h1>
  <div id="container">
	<section class="tabs">
		<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
		<span for="tab-1" class="tab-label-1">Signup</span>

		<input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
		<span for="tab-2" class="tab-label-2">Login</span>

		<input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
		<span for="tab-3" class="tab-label-3">Forget Password</span>
	
		<div class="clear-shadow"></div>
		
		<div id="content">
			<div class="content-1">
				<p>
					<a href="#" class="media tw">Twitter</a><a href="#" class="media fb">Facebook</a>
				</p>	
				<form  action="" autocomplete="on">
				  <p>
					<label for="fname class="uname" data-icon="fn">First Name</label>
					<input class="field" name="fname" required="required" type="text" placeholder="firstname" />
				  </p>
                  <p>
					<label for="lname" class="uname"  data-icon="ln" >Last Name</label>
					<input class="field" name="lname" required="required" type="text" placeholder="lastname" />
				  </p>
				  <p>
					<label for="dob" class="youmail" > DOB</label>
					<input class="field" name="dob" required="required" type="text" placeholder="DOB"/>
				  </p>
                  <p>
					<label for="dob" class="youmail" > Username</label>
					<input class="field" name="username" required="required" type="text" placeholder="Username"/>
				  </p>

                  <p>
					<label for="email" class="youmail" data-icon="e" > Your email</label>
					<input class="field" name="email" required="required" type="email" placeholder="firstname@gmail.com"/>
				  </p>
                  
				  <p>
					<label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
					<input class="field" name="password" required="required" type="password" placeholder="mypassword"/>
				  </p>
				  <p>
					<label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
					<input class="field" name="passwordconfirm" required="required" type="password" placeholder="mypassword"/>
				  </p>
				  <p class="signin button">
					<input type="checkbox" required="required" /> I agree with terms and conditions 
					<input type="submit"  name="submit" value="Sign up"/>
				  </p>
			</div>
            </form>

            <form action= "VengiValidation.php" method="post" enctype="multipart/form-data">
			<div class="content-2">
				<p>
					<a href="#" class="media tw">Facebook</a><a href="#" class="media fb">Twitter</a>
				</p>
				<form  action="" autocomplete="on">
				  <p>
					<label for="username" class="uname" data-icon="u" > Your email or username </label>
					<input class="field" name="username" required="required" type="text" placeholder="myusername or myusername@gmail.com"/>
				  </p>
				  <p>
					<label for="password" class="youpasswd" data-icon="p"> Your password </label>
					<input class="field" name="password" required="required" type="password" placeholder="mypassword" />
				  </p>
				  <p class="keeplogin">
					<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> Keep me logged in
					<input type="submit"  name= "submit" value="Login" />
				  </p>
				</form>
			</div>
			<div class="content-3">
				<form  action="" autocomplete="on">
				  <p>
					<label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
					<input class="field" name="emailsignup" required="required" type="email" placeholder="myusername@gmail.com"/>
				  </p>
				  <p class="signin button">
					<input type="submit" value="Get New Password"/>
				  </p>
				</form>
			</div>
			
		</div>
	</section>
  </div>
</div>
</body>
</html>


<?php


include 'VengiConnect.php';


 // Code to check if information was already entered in the database
 //include 'msqlconnect.php';

 if (isset($_POST['submit'])) {
     $name=$_POST['fname'];
     $lastname=$_POST['lname'];
	 $dob=$_POST['dob'];
     $email=$_POST['email'];
    $password=$_POST['password'];
     $confirmpassword=$_POST['passwordconfirm'];
     $username = $_POST['username'];
 
     
     $query= mysqli_query($connect, "SELECT * FROM `Users` WHERE username='$username'");
 
     if (!preg_match("/^[a-zA-Z]+$/", $name)) {
         echo  "Please Enter Name As Only Letters";
     } elseif (!preg_match("/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/", $password)) {
         echo  " invalid password";
     } elseif ($password != $confirmpassword) {
         echo "password doesn't match";
     } elseif
     (mysqli_num_rows($query) > 0) {
          echo '<script type="text/javascript">myemailFunction();</script>';
     }else{
         $sql = "INSERT INTO `Users` (`First_Name`,`Last_Name`,`DOB`,`Email`, `Password`, `Username`)
     VALUES ('$name', '$lastname', '$dob', '$email', '$password', '$username');";
         mysqli_query($connect, $sql);
         echo '<script type="text/javascript">myFunction();</script>';
     }
 }

 
?>



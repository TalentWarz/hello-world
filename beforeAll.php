<?
session_start();
$player_id = $_SESSION['player_id'];

include 'index.css';
include 'connect.php';
include 'variables.php';
?>
<html>
<script>
	var video = document.getElementById('video');
	video.addEventListener('click',function(){
	video.play();
	},false);
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
/*
$(document).ready(function(){
	$("nav").hide();
    $("#menu_img").click(function(){
        $("nav").slideToggle(500);
    });
});
$(document).mouseup(function (e)
{
    var container = $("nav");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
    }
});
*/
</script>

<style>
header {
	background: black;
	border-bottom:1px solid grey;
	height:70px;
	width:100%;
}
#headerLeft {
	width:33.333%;
	height:70px;
	float:left;
}
#myPID {
	 font-size:20px;
	 color:#3284ff;
	 display:inline;
}
#headerCenter {
	width:33.333%;
	height:70px;
	float:left;
}
#headerRight {
	width:33.333%;
	height:70px;
	float:left;
}
#headerMenu {
	height:30px;
}
#loginInput {
	font-size:15px;
	margin-right:5px;
}
#passInput {
	font-size:15px;
	margin-left:5px;
}
.error {
	color:red;
	font-size:12px;
	margin-top:-5px;
}
#registerLink {
	color:#3284ff;
	margin-left:50px;
	font-size:18px;
}
#OR {
	color:white;
	font-size:15px;
	margin-left:15px;
	margin-right:15px;
}
#followInstagram {
	color:#3284ff;
	font-size:18px;
	margin-top:-5px;
	text-decoration:none;
}
#submitInput {
	 font-size:15px;
	 color:white;
	 margin-top:5px;
	 background-image: url('pictures/carbon.jpg');
}
#logo {
	height:70px;
	width:250px;
}
#menu_img {
	height:25px;
	width:25px;
	float:right;
	margin-right:20px;
	margin-top:10px;
}
#nav_menu {
	right:0;
	clear:left;
	position:absolute;
	background:black;
	z-index:9999;
}
nav {
	text-align:center;
	font-size:35px;
}
nav a {
	color:#a8a8a8;
}
#sub_section_1 {

}
#facebook2 {
	margin-top:50px;
	height:50px;
	width:50%;
	float:left;
	font-size:15px;
	color:white;
}
#coming_soon2 {
	margin-top:15px;
	height:50px;
	width:50%;
	float:left;
	color:white;
	font-size:15px;
}



@media screen and (max-width:1280px) {      
#followInstagram {
	font-size:15px;
}
}



@media screen and (max-width:980px) {
#myPID {
	font-size:30px;
}
header {
	height:120px;
}
#headerLeft {
	width:80%;
	height:120px;
	float:left;
}
#headerCenter {
	width:20%;
	height:120px;
	float:right;
}
#headerRight {
	width:0%;
	height:120px;
	float:left;
}
#headerMenu {
	height:30px;
}
#loginInput {
	width:250px;
	font-size:40px;
}
#passInput {
	width:250px;
	font-size:30px;
}
.error {
	font-size:18px;
}
#registerLink {
	color:#3284ff;
	margin-left:50px;
	font-weight:bold;
	font-size:25px;
	text-decoration:none;
}
#OR {
	color:white;
	font-size:15px;
	margin-left:10px;
	margin-right:10px;
}
#followInstagram {
	color:#3284ff;
	font-size:25px;
	font-weight:bold;
	text-decoration:none;
}
#submitInput {
	 font-size:40px;
}
#logo {
	height:100px;
	width:280px;
	float:right;
	margin-right:15px;
}
#menu_img {
	height:50px;
	width:50px;
	float:right;
	margin-right:5px;
}
#nav_menu {

}
nav {
	
}
nav a {
	font-size:50px;
}
#sub_section_1 {

}
#facebook2 {
	font-size:35px;
	margin-top:750px;
}
#coming_soon2 {
	font-size:35px;
	margin-top:700px;
	float:right;
}
menu {
	font-size:30px;
}

}
</style>

<head>
	<title>New best way to get discovered as unsigned talented artist/singer in music industry</title>
	<meta name="description" content="Talent Warz is a chance for those who seek to be a star but don't have the money, time, knowledge or network to get there. It's a place where artists and entertainers meet discoverability, exposure and motivation to do what they love. Quite honestly, Talent Warz is a short cut to fame, for those who have what it takes.">
	<meta name="keywords" content="tucson,arizona,compete,competition,online,sing,singer,artist,music industry,battle,rank,level,win %,win percent,skill points,statistics,stats,discover,get discovered,be discovered, head to head,
	video,battle,battles,judge,vs,vote,votes,wins,talent,talented,music artist,unsigned">
</head>
<header>
	<section id="headerLeft">
	<?
	if ($_SESSION['player_id'])	{
		echo "<span style='font-size:20px;color:white;float:left;display:inline;margin-left:15px;'>Hello <span id='myPID'>".$player_id."</span></span>";
		echo "<br><br><br>";
		echo "<a href='https://www.instagram.com/talentwarz/' target='blank' id='followInstagram' style='position:absolute;left:15px;'>Follow us on Instagram</a>";
	}
	else {
		?>
		<Form id="login" name="login" Method ="POST" Action="">
			<?
			if ($loginNoPass == true) {
				 echo ("<section class='error'>Please enter your password.</section>"); 
			}
			if ($loginWrongPass == true) {
				 echo ("<section class='error'>You have entered the wrong password.</section>"); 
			}
			if ($loginNoPID == true) {
				 echo ("<section class='error''>This Player ID does not exist.</section>"); 
			}
			?>
			<INPUT id="loginInput" TYPE = "TEXT" placeholder="Player ID" VALUE ="" Name ="player_id">
			<INPUT id="passInput" TYPE = "password" placeholder="Password" Name ="password">
			<br>
			<INPUT id="submitInput" TYPE = "Submit" Name = "submit" VALUE = "Login">
			<a href="loginSignup.php" id="registerLink">Register </a> <text id="OR"> OR </text> <a href="https://www.instagram.com/talentwarz/" target="blank" id="followInstagram">Follow us on Instagram</a>
			<br>
		</FORM>		
		<?
	}
	?>
	</section>
	<section id="headerCenter">
		<center><a href="index.php"><img src="pictures/logo3.png" id="logo"/></a></center>	
	</section>
	<section id="headerRight">
		<br>
	</section>

</header>
<body>
<?php include_once("analyticstracking.php"); ?>


<!--
<nav id="nav_menu" style="height:100%;">
	<ul style="margin-right:25px;">
		<br>
		<li><a href="home.php" style="color:white;text-decoration:none;">Home</a></li>
		<br>
		<li><a href="about.php" style="text-decoration:none;">About</a></li>
		<br>
		<li><a href="contactus.php" style="text-decoration:none;">Contact Us</a></li>
		<br>
		<li>
			<?
			if ($_SESSION['player_id'])	{
				echo '<a href="logout.php" style="text-decoration:none;">Logout</a>';
			}
			else {
				echo '<a href="loginSignup.php" style="text-decoration:none;">Join</a>';
			}
			?>
		</li>
		<br>
		<li>
			<center id="facebook2">
				<a href="http://www.facebook.com/talentwarz" target="_blank">
					<img id="like2" src="pictures/like-button.png"></img>
				</a>
			</center>
		</li>
		<li>
			<center id="coming_soon2">
				Profiles & rankings coming soon!
			</center>		
		</li>
	</ul>

</nav>
-->

<section id="headerMenu">
	<menu>
		<ul style="width:100%;list-style:none;">
			<a href="index.php"><li style="float:left;color:white;width:18%;text-align:center;background:linear-gradient(
	  rgba(5, 0, 0, 0.45), 
	  rgba(5, 0, 0, 0.45)
	);">Home</li></a>
			<a href="myprofile.php"><li style="float:left;color:white;width:18%;text-align:center;background:linear-gradient(
	  rgba(50, 50, 50, 0.45), 
	  rgba(50, 50, 50, 0.45)
	);">My Profile</li></a>
			<a href=""><li style="float:left;color:white;width:18%;text-align:center;background:linear-gradient(
	  rgba(100, 100, 100, 0.45), 
	  rgba(100, 100, 100, 0.45)
	);" onclick="alert('Rankings coming soon!')">Rankings</li></a>
			<a href="about.php"><li style="float:left;color:white;width:18%;text-align:center;background:linear-gradient(
	  rgba(50, 50, 50, 0.45), 
	  rgba(50, 50, 50, 0.45)
	);">About</li></a>
			<li style="float:left;width:18%;text-align:center;background:linear-gradient(
	  rgba(5, 0, 0, 0.45), 
	  rgba(5, 0, 0, 0.45)
	);">
				<?
				if ($_SESSION['player_id'])	{
					echo '<a href="logout.php" style="text-decoration:none;color:white;">Logout</a>';
				}
				else {
					echo '<a href="loginSignup.php" style="text-decoration:none;color:white;">Join</a>';
				}
				?>
			</li>
		</ul>
	</menu>
</section>


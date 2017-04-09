<?php	
if (isset($_POST['register'])) {
	include 'connect.php';
	$player_id = $_POST['player_id'];
	$res = mysqli_query($mysqli, "SELECT player_id FROM player_info WHERE player_id='$player_id'");
	$row = mysqli_fetch_assoc($res);
	if ($player_id !== $row['player_id']) {
		if (!empty($player_id)) {
			if(preg_match("/^[\w]+$/", $player_id)) {
			//if (!ctype_space($player_id)) {
			//if(strlen($player_id) == whitespace){
			//if (preg_match('/\s/',$player_id) ) {
				$email = $_POST['email']; /////////////
				$res = mysqli_query($mysqli, "SELECT email FROM player_info WHERE email='$email'");
				$row = mysqli_fetch_assoc($res);
				if ($email !== $row['email']) {
					if (!empty($email)) {
						$password = $_POST['password']; /////////////
						$confpassword = $_POST['confpassword'];
						if ($password != '') {
							if ($password == $confpassword) {
								mysqli_query($mysqli, "INSERT INTO `tw_demo`.`player_info` (`id`, `player_id`, `email`, `password`, `video`, `video_url`, `in_battle`, `rank`, `total_votes`, `skill_points`, `wins`, `battles`, `level`, `v1_bid`, `v1_pid`, `v2_bid`, `v2_pid`, `v3_bid`, `v3_pid`, `v4_bid`, `v4_pid`, `v5_bid`, `v5_pid`, `reported`, `been_reported`, `judge_votes`, `judge_wins`, `judge_sp`, `judge_level`) VALUES (NULL, '".$player_id."', '".$email."', '".$password."', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1')");
								session_start();
								$_SESSION['player_id'] = $_POST['player_id'];
								$player_id = $_POST['player_id'];	
								header("location: home.php");
								exit();
							} else { $passNoMatch = true; }
						} else { $noPass = true; }
					} else { $noEmail = true; } ////////////////
				} else { $emailExists = true; }	
			} else { $specialChar = true; }
		} else { $noPID = true; }
	} else { $pidExists = true; }
}

session_start();
$player_id = $_SESSION['player_id'];
if ($_SESSION['player_id'])	{
	header("location: home.php");
}
include 'index.css';
include 'connect.php';
include 'variables.php';
include 'beforeAll.php';


?>
<style>


</style>

<br>
<br>
<br>


<center>
	<br>
	<section id="about">
		<section id="about_tw">
		
			<center>
				<center>
					<br>
					<br>
						<label style="color:white;font-size:30px;">Register <center id="noSpaces">(No spaces or special characters)</center></label>
						<Form id="register" name ="register" Method ="POST" Action ="" style="margin-top:25px;">
							<INPUT TYPE = "TEXT" VALUE ="" id="inputPID" placeholder="Create a Player ID" Name ="player_id"><br>
							<?
								if ($noPID == true) {
									echo "<section style='color:red;'>Please create a Player ID.</section>"; 
								}
								if ($specialChar == true) {
									echo "<section style='color:red;'>No special characters or spaces allowed in Player ID. May use underscore and numbers</section>";
								}
								if ($pidExists == true) {
									echo "<section style='color:white;'>This Player ID exists</section>"; 
								}
							?>
							<br>
							<INPUT TYPE = "TEXT" id="inputEmail" placeholder="Enter email" VALUE ="" Name ="email"><br>
							<?
								if ($noEmail == true) {
									echo "<section style='color:red;'>Please enter your email.</section>"; 
								}
								if ($emailExists == true) {
									echo "<section style='color:red;'>This email is already being used.</section>"; 
								}
							?>
							<br>
							<INPUT TYPE = "password" id="inputPass" placeholder="Enter password" VALUE ="" Name ="password"><br>
							<?
								if ($noPass == true) {
									echo "<section style='color:red;'>Please enter your password.</section>"; 
								}
							?>
							<br>
							<INPUT TYPE = "password" id="inputPass2" placeholder="Confirm password" VALUE ="" Name ="confpassword"><br>
							<? 
								if ($passNoMatch == true) {
									echo "<section style='color:red;'>Your passwords do not match.</section>";
								}
							?>
							<br>
							<INPUT TYPE = "Submit" id="inputSubmit" Name = "register" VALUE = "Register">
						</form>
				</center>
			</center>
			<br>
		
			<!--
			<center id="compete">Compete for a chance to get exposed!</center>
			<br>
			<center>		
				<section id="about_title"><center><b>About</b></center></section>	
			</center>
		
			<iframe id="video" src="https://www.youtube.com/embed/MTIJBtT5_lo" frameborder="0" allowfullscreen></iframe>
			<section class="about_left">
				<h1 class="about_h1">What is Talent Warz?</h1>
				<p class="about_p">Talent Warz is a chance for those who seek to be a star but don't have the money, time, knowledge or network to get there. It's a place where artists and entertainers meet discoverability, exposure and motivation to do what they love. Quite honestly, Talent Warz is a short cut to fame, for those who have what it takes.</p>
			</section>
			<section class="about_right">
				<h1 class="about_h1">How?</h1>
				<p class="about_p">With a head to head video vs video algorithm that determines Rank and Skill Level between competitors. The higher you rank, the more visibility your profile will have for all the Talent Warz fans to discover. There's more to it below.</p>
			</section>	
			<section class="about_left">
				<h1 class="about_h1">What's the problem?</h1>
				<p class="about_p">The problem is simple. Even if you're the best at what you do, it's not easy finding fame. Let's pretend you're the world's next top star but currently no one knows who you are. Unless you get lucky, uploading a video to your facebook page will likely result in getting the same number of "Likes" as always.</p>
			</section>
			<section class="about_right">
				<p class="about_p">Another example is youtube. More factors exist in getting big on youtube than one may think. Search Engine Optimization (SEO) is one of them. While there are ways to learn it, SEO takes time to master and is a crucial part of getting found in google/youtube searches. Marketing yourself is another piece of the puzzle with the cost of money, time, & knowledge.</p>
			</section>
			<section class="about_left">
				<p class="about_p">These examples are few of the many problems that exist for those who pursue a passion in the entertainment industry.</p>
			</section>
			<section class="about_right">
				<h1 class="about_h1">Solution</h1>
				<p class="about_p">What if the only thing that mattered was how good you are at what you do? (Rather than who you know, what you know, and how much money you've got)</p>
			</section>
			<section class="about_right">
				<p class="about_p">Let pretend again you're a top star and you've earned the number one seat on Talent Warz because, well, you're the best. This is where Talent Warz will introduce our ENTIRE TRAFFIC FEED to your profile page, promoting your website, itunes, twitter and any other links you choose to display.</p>
				<p class="about_p">Now let's say you've earned our number two seat. You're probably going to get a little less traffic than number one but you're likely to get more than our number three seat. This concept continues down the ranks. Basically, the better you place in our ranking system the more traffic you will get.</p>
				<p class="about_p">Sure, a ton of free traffic sounds great for deserving artists, but that's not enough for Talent Warz. Keep reading :)</p>
			</section>
			<section class="about_left">	
				<h1 class="about_h1">Why use Talent Warz?</h1>
				<ul>
					<li>It's free</li>
					<li>Mobile</li>
					<li>Provides a chance to be shared on our social media.</li>
					<li>Can introduce top talent to top record labels, etc.</li>
				</ul>
				<p class="about_p">Many people have asked, "How will you introduce top singers to leading record labels"? My answer is, they will come to us. I'll explain.</p>
				<p class="about_p">When Talent Warz has enough traction (or traffic), it will attract the attention of top record labels. It really is that simple. Just like other users, record labels can explore the rankings to discover wanted talent.</p>
			</section>
			<section class="about_right">
				<h1 class="about_h1">Current situation?</h1>
				<p class="about_p">I am proud to see how far Talent Warz has come, but the truth is this is just the beginning. The website is finally functioning correctly and now it's time to get it out there. This is why we have started a kickstart campaign.</p>
			</section>
			<section class="about_left">
				<h1 class="about_h1">Need money for what...</h1>
				
					<li>First, becoming an LLC</li>
					<li>Hire Market Research Analyst for contract</li>
					<li>Marketing (Will budget)</li>
					<li>Maintenance, improvements, and uptime</li>
					<li>Backup costs for the unexpected</li>
			</section>
			<section class="about_right">
				<h1 class="about_h1">Costs...</h1>
				
					<li>Becoming an LLC ($1000)</li>
					<li>Market Research Analyst contract (Will budget at $1000)</li>
					<li>Marketing costs (Will budget at $1000 to start)</li>
					<li>Hosting & Server ($100 for first year + backup included)</li>
					<li>Maintenance ($2000 for first year + backup included)</li>
					<li>Backup ($1000)</li>
			</section>
			<center><a href="" id="donateLink">Click to donate</a></center>
</center>

-->


<!--
<center>	
	<a href="http://www.kickstarter.com/talentwarz" target="_blank">
		<img src="pictures/donate-picture.jpg" style="height:450px;width:960px;margin-top:50px;"></img>
	</a>
</center>
-->

<center>
	<!--<video width='600' height='400' controls src='videos/explainer-sounds-final.mp4'></video>-->
</center>

</body>
</html>
<script>
	function upload_message() {
		alert("Please sign in or register.");
	}
</script>
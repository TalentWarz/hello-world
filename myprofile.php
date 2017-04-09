<?
if (isset($_POST['submit'])) {
	include 'connect.php';
	$player_id = $_POST['player_id'];
	$res = mysqli_query($mysqli, "SELECT player_id FROM player_info WHERE player_id='$player_id'");
	$row = mysqli_fetch_assoc($res);
	if ($player_id == $row['player_id']) {
		$password = $_POST['password'];
		$res = mysqli_query($mysqli, "SELECT password FROM player_info WHERE password='$password' && player_id='$player_id'");
		$row = mysqli_fetch_assoc($res);
		if ($password == $row['password']) {
			if (!empty($password)) {
				session_start();
				$_SESSION['player_id'] = $_POST['player_id'];
				$player_id = $_POST['player_id'];	
				header("location: index.php");
				exit();
			}
			else { $loginNoPass = true; }
		}
		else { $loginWrongPass = true;  }	
	}
	else { $loginNoPID = true;  }
}
	
session_start();
$player_id = $_SESSION['player_id'];
if ($_SESSION['player_id'])	{
	
}
include 'index.css';
include 'connect.php';
include 'variables.php';
include 'beforeAll.php';
?>
<style>
#section_2_content {
	width:960px;
	height:300px;
}
#my_video_stats_title {	
	width:960px;
	font-size:20px;
	color:#ccac00;
	font-weight:bold;
}
#video_stats {
	height:250px;
	width:960px;
}
#video_stats table {

}
#video_stats button {
	font-size:30px;
	color:white;
	border:1px solid white;
}
#current_battle {
	height:300px;
	width:960px;	
}
#current_battle_title {
	width:960px;
	font-size:20px;
	color:#d7d7d7;
	height:100px;
}
#current_battle_player_ids {
	width:960px;
	font-size:30px;
	color:white;
}
#current_blank_1 {
	margin-top:15px;
	float:left;
	width:152.5px;
	margin-left:76px;
}
#current_battle_player_1 {
	margin-top:15px;
	width:250px;
	float:left;

}
#current_battle_player_1 name{
	margin-right:25px;
}
#current_battle_player_2 {
	margin-top:15px;
	width:250px;
	float:left;
}
#current_blank_2 {
	margin-top:15px;
	float:left;
	width:152.5px;
}
#current_battle_player_2 name{

}
#votes_left {
	float:left;
	height:100px;
	width:102.5px;
	margin-top:15px;
	margin-left:60px;
}
#votes_left p{
	font-size:30px;
	color:#ccac00;
}
#video_1 {
	float:left;
	height:200px;
	width:302.5px;
	margin-top:-15px;
}
#current_vs {
	float:left;
	height:100px;
	width:30px;
}
#current_vs img {
	margin-top:95px;
}
#video_2 {
	float:left;
	height:200px;
	width:302.5px;
	margin-top:-15px;
}
#votes_right {
	float:left;
	height:100px;
	width:102.5px;
	margin-top:15px;
	font-size:30px;
}
#votes_right p{
	font-size:30px;
	color:#ccac00;
}




#no_battle_player_1 {
	width:960px;
	font-size:30px;
	color:white;
}
#no_battle_player_1 text {
	margin-top:50px;
}
#no_battle_player_1  form input{
	font-size:30px;
	color:white;
	background-image: url("pictures/black-top.jpg");
	margin-top:100px;
}
#no_battle_video_1 button {
	font-size:30px;
	margin-top:10px;
	color:white;
	background-image: url('pictures/carbon.jpg');
	border:1px solid white;
}
#upload_video_button {
	font-size:30px;
	margin-top:10px;
	color:white;
	background-image: url("pictures/black-top.jpg");
	border:1px solid white;
}
#link_container {
	text-align:center;
	width:500px;
	height:100px;
	background:linear-gradient(
      rgba(5, 0, 0, 0.45), 
      rgba(5, 0, 0, 0.45)
    );
}








@media screen and (max-width:980px) {
#my_video_stats_title {
	font-size:40px;
}


}
</style>
<br>
<br>
<br>
<section id="section_1">
	<center>
		
		
		<section id="section_1_content">
			<center>
				<section id="battle_top">
					<label id="judge_stats_title">My Video Stats</label> 
					<center>							
							<table id="battle_top_table">
								<tr><td>Level</td><td>Skill Points</td><td>Win%</td><td>Wins</td><td>Battles</td><td>Total Votes</td></tr>
								<tr><td style="color:white;"><?echo$video_lvl;?></td><td style="color:white;"><?echo$video_sp;?></td><td style="color:white;"><?echo$video_win_percent;?>%</td><td style="color:white;"><?echo$video_wins;?></td><td style="color:white;"><?echo$video_battles;?></td><td style="color:white;"><?echo$video_total_votes;?></td></tr>
							</table>
					</center>
				</section>
			</center>
			<br>
			<section id="battle">
				<?
				if ($my_video_battle_live == 1) {?>
					<section id="current_battle">
						<center>
							<section id="current_battle_player_ids">
								<span id="current_blank_1" style="color:black;">.</span>
								
								<span id="current_battle_player_1">
									<name style="color:white;"><?echo$player_id;?></name>
								</span>
								
								<span id="current_battle_player_2">
									<name style="color:white;"><?echo$opp_pid;?></name>
								</span>	
								
								<span id="current_blank_2" style="color:black;">.</span>
							</section>
							<span id="votes_left">
								<p>Votes</p>
								<p><?echo$my_votes;?></p>
							</span>
							<span id="video_1">
								<?echo "<video width='250' height='200' controls src='videos/".$my_video."'></video>";?>
							</span>
							<span id="current_vs">
								<img src="pictures/vs_black.png" style="height:30px; width:30px;"></img>
							</span>
							<span id="video_2">
								<?echo "<video width='250' height='200' controls src='videos/".$opp_video."'></video>";?>
							</span>
							<span id="votes_right">
								<p>Votes</p>
								<p><?echo$opp_votes;?></p>
							</span>
						</center>
					</section>
				<?
				}
				else {
					if ($_SESSION['player_id'])	{
				?>
						<section id="current_battle">
							<center>	
								<section id="no_battle_player_1">
									<?
										if ($my_video != "") {?>
											<text style="color:#d7d7d7;"><?echo$player_id;?></text>
									<?
										}
									?>
								</section>
								<section id="no_battle_video_1">
									<?
									if ($my_video != '') {
										echo "<video width='250' height='200' controls src='videos/".$my_video."'></video>";
										echo "<br>";
										if ($in_battle == 0) {
											if($my_video != '') {
												echo '<a href="find_a_battle.php"><button>Find a battle</button></a>';
											}
											else {
												echo '<span id="current_battle_title">First choose file, then click upload video to start</span><br>';
											}
										}
										if ($in_battle == 1 && $my_video_battle_live == 0 && $my_video_battle_active == 1) {
											echo '<br><span id="current_battle_title">Searching for battle...</span><br>';
										}
										if ($in_battle == 1 && $my_video_battle_live == 1) {
											echo '<br><span id="current_battle_title">Current battle</span><br>';
										}
										if ($in_battle == 1 && $my_video_battle_player_1 == $player_id && $my_video_battle_p1_ready == 1) {
											echo '<br><span id="current_battle_title">Searching for battle...</span><br>';
										}
										if ($in_battle == 1 && $my_video_battle_player_2 == $player_id && $my_video_battle_p2_ready == 1) {
											echo '<br><span id="current_battle_title">Searching for battle...</span><br>';
										}
									}
									else {
									?>
										<br>
										<?
										if ($my_video_battle_active == 0 && $my_video_battle_live == 0) {
											if(isset($_POST['submit'])){
												$name = $_FILES['file']['name'];
												$temp = $_FILES['file']['tmp_name'];

												move_uploaded_file($temp, "www.talentwarz.com/videos/".$name);

												mysqli_query($mysqli, "UPDATE player_info SET video=$name WHERE player_id='".$player_id."'");



												/*
												$target_dir = "videos/";
												// var_dump($_FILES["fileToUpload"]);die();
												$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
												$allowed = array("video/mp4");
												if (in_array($_FILES['fileToUpload'], $allowed)) {
													//Get extension to variable to allow other formats in future
													$oldvidname = $_FILES['fileToUpload']['name'];
													$ext = substr($oldvidname,strpos($oldvidname, '.'));
													if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
														$filename=$_FILES["fileToUpload"]["name"];
														$res = mysqli_query($mysqli, "SELECT video FROM player_info WHERE player_id='".$player_id."'");
														$row = mysqli_fetch_assoc($res);
														mysqli_query($mysqli, "UPDATE player_info SET video='".$filename."' WHERE player_id='".$player_id."'");
													}
													else {
														echo "<span style='color:white;'>Sorry, there was an error uploading your file.</span>";
													}
												}
												else {
													echo "<span style='color:white;'>The file selected is not mp4.</span>";
												}
												*/
											}
										?>
											<label style="color:white;">(May take a few minutes to upload)</label>
											<form id="upload_video" action="uploadVideo.php" method="post" enctype="multipart/form-data">
												<input type="file" name="fileToUpload" id="fileToUpload" style="color:white;margin-top:50px;font-size:30px;background-image: url('pictures/carbon.jpg');border:1px solid white;"><br><br>
												<input id="upload_video_button" type="submit"name="submit" value="Upload Video" style="margin-left:20px;background-image: url('pictures/carbon.jpg');"/>
											</form>
										<?php
										}
									}
									?>
								</section>
							</center>
						</section>	
				<?
					}
					else {
					?>
						<br>
						<br>
						<center style="color:white;font-size:24px;"><a href="loginSignup.php" style="color:#0066ff;">Log in</a> or <a href="loginSignup.php" style="color:#0066ff;">Sign Up</a> to compete!</center>
						<br>
						<input id="upload_video_button" onclick="alert('Login to compete.')" type="submit"name="submit" value="Upload Video" style="margin-left:20px;background-image: url('pictures/carbon.jpg');"/>			
					<?					
					}
				}
				?>
			</section>
		</section>
	</center>
	<br>
	<center>
		<?
		include 'section_2.php';
		//include 'rankings.php';
		//include 'coming_soon.php';
		//include 'footer.php';
		?>
	</center>
</section>






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
	header("location: home.php");
}
include 'index.css';
include 'connect.php';
include 'variables.php';
include 'beforeAll.php';
?>
<br>
<br>
<br>
<section id="section_1">
	<center>
		
		
		<section id="section_1_content">
			<center>
				<section id="battle_top">
					<label id="judge_stats_title">My Judge Stats</label> 
					<center>							
							<table id="battle_top_table">
								<tr><td>Level</td><td>Skill Points</td><td>Win%</td><td>Wins</td><td>Votes</td></tr>
								<tr><td style="color:white;"><?echo$judge_level;?></td><td style="color:white;"><?echo$judge_sp;?></td><td style="color:white;"><?echo$judge_win_percent;?>%</td><td style="color:white;"><?echo$judge_wins;?></td><td style="color:white;"><?echo$judge_votes;?></td></tr>
							</table>
					</center>
				</section>
			</center>
			<section id="battle">
				<?
				include'battle.php';					
				if ($display_battle_id == '') {
					include "need_more_people.php";
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




<!--

<section id="section_2">
	<center>
		<center style="color:white;font-size:24px;"><a href="loginSignup.php" style="color:#3284ff;">Log in</a> or <a href="loginSignup.php" style="color:#3284ff;">Sign Up</a> to compete!</center>
		<br>
		<input id="upload_video_button" onclick="alert('Register to start as a level one singer.')" type="submit"name="submit" value="Upload Video" style="margin-left:20px;background-image: url('pictures/carbon.jpg');"/>
	</center>
					<center>
						<center id="facebook">	
							
								<a href="http://www.facebook.com/talentwarz" target="_blank" id="pleaseClick">Please click</a>
								<a href="http://www.facebook.com/talentwarz" target="_blank">
									<img id="like" src="pictures/like-button.png"></img>
								</a>
							
						</center>
						<center id="coming_soon">
							
							Profiles & rankings coming soon!
							
						</center>
					</center>
				</section>
		
		</div>
	</center>
</section>
-->


</body>
</html>
<!--
<center style="height:800px;background-image: url('pictures/gray-to-black.jpg');border-top:5px solid black;">



	<center>
	<?
	//include 'do_what_you_love.php';
	?>
	</center>

	<center>	
		<a href="http://www.kickstarter.com/talentwarz" target="_blank">
			<img src="pictures/donate-picture.jpg" style="height:450px;width:960px;margin-top:50px;margin-bottom:40px;"></img>
		</a>
	</center>
	

</center>
-->







<script>
	function upload_message() {
		alert("Please sign in or register.");
	}
</script>
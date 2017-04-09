<?
include 'beforeAll.php';
session_start();
$player_id = $_SESSION['player_id'];
if (!$_SESSION['player_id']) {
	header("location: index.php");
}
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
				if ($reported == 0) {

					if ($my_video_battle_total_votes < $votes_to_win) {
						if ($display_live == 1) {
							include'battle.php';
						}
					}
					else {//check if your player 1 or 2 and if p1_ready or p2_ready = 1
						if ($my_video_battle_total_votes >= $votes_to_win) {
							if ($my_video_battle_player_1 == $player_id) {
								if ($my_video_battle_p1_ready == 1) {
									if ($display_live == 1) {
										include'battle.php';
									}
								}
								else {
									include 'win_check_my_video.php';
								}
								if ($my_video_battle_p2_ready == 1) {
									include 'win_check_my_video.php';
								}
							}
							if ($my_video_battle_player_2 == $player_id) {
								if ($my_video_battle_p2_ready == 1) {
									if ($display_live == 1) {
										include'battle.php';
									}
								}
								else {
									include 'win_check_my_video.php';
								}
							}
						}
					}
				}
				else {
					include 'thank_you_for_reporting.php';
				}

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




</body>
</html>








<script>
	function upload_message() {
		alert("Please sign in or register.");
	}
</script>

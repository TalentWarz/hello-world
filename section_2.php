<?
$res = mysqli_query($mysqli, "SELECT * FROM player_info ORDER BY skill_points DESC"); 
$row = mysqli_fetch_assoc($res);	
$rank_1_PID = $row['player_id'];
$rank_1_sp = $row['skill_points'];
		
$res = mysqli_query($mysqli, "SELECT * FROM player_info WHERE skill_points<'".$rank_1_sp."' ORDER BY skill_points DESC"); 
$row = mysqli_fetch_assoc($res);	
$rank_2_PID = $row['player_id'];
$rank_2_sp = $row['skill_points'];

$res = mysqli_query($mysqli, "SELECT * FROM player_info WHERE skill_points<'".$rank_2_sp."' ORDER BY skill_points DESC"); 
$row = mysqli_fetch_assoc($res);	
$rank_3_PID = $row['player_id'];
$rank_3_sp = $row['skill_points'];
?>
<style>
#section_2 {
	width:100%;
	height:500px;
	/*background-image: url("pictures/spotlights.png");
	background-position: center center;
	*/
}
#section_2_content {
	width:960px;
	height:450px;
	background:linear-gradient(
      rgba(5, 0, 0, 0.45), 
      rgba(5, 0, 0, 0.45)
    );
}
#rankings {
	height:420px;
	width: 100%;
}
#rankings table {
	width:100%;
	height:390px;
	border:2px solid black;
	font-size:15px;
}
#rankings_col_1 {
	width:100px;
	font-size:20px;
}
#rankings_col_2 {
	
}
#rankings_col_2 a{
	color:#3284ff;
	font-size:20px;	
	text-decoration:none;
}
#rankings_col_3 {
	
}
#rankings_col_4 {
	color:white;
}
#rankings_col_5 {
	
}
#rankings_col_6 {
	color:white;
}
#rankings_col_7 {
	
}
#rankings_col_8 {
	color:white;
}







@media screen and (max-width:980px) {
#rankings table {
	margin-top:50px;
}
}
</style>

<section id="section_2">
	<center>
		<section id="section_2_content">
			<section id="rankings">
				<table>
					<center style="color:white;font-size:30px;font-weight:bold;">Top 10 Singers</center>
					<tr><td id="rankings_col_1">Rank #1</td><td id="rankings_col_2"><a href="profile.php"><?echo $rank_1_PID?></a></td><td id="rankings_col_3">Level</td><td id="rankings_col_4">50</td><td id="rankings_col_5">Skill Points</td><td id="rankings_col_6"><?echo$rank_1_sp?></td><td id="rankings_col_7">Win %</td><td id="rankings_col_8">80%</td></tr>
					<tr><td id="rankings_col_1">Rank #2</td><td id="rankings_col_2"><a href="profile.php"><?echo $rank_2_PID?></a></td><td id="rankings_col_3">Level</td><td id="rankings_col_4">50</td><td id="rankings_col_5">Skill Points</td><td id="rankings_col_6"><?echo$rank_2_sp?></td><td id="rankings_col_7">Win %</td><td id="rankings_col_8">80%</td></tr>
					<tr><td id="rankings_col_1">Rank #3</td><td id="rankings_col_2"><a href="profile.php"><?echo $rank_3_PID?></a></td><td id="rankings_col_3">Level</td><td id="rankings_col_4">50</td><td id="rankings_col_5">Skill Points</td><td id="rankings_col_6"><?echo$rank_3_sp?></td><td id="rankings_col_7">Win %</td><td id="rankings_col_8">80%</td></tr>
					<tr><td id="rankings_col_1">Rank #4</td><td id="rankings_col_2"><a href="profile.php"><?echo $rank_4_PID?></a></td><td id="rankings_col_3">Level</td><td id="rankings_col_4">50</td><td id="rankings_col_5">Skill Points</td><td id="rankings_col_6"><?echo$rank_1_sp?></td><td id="rankings_col_7">Win %</td><td id="rankings_col_8">80%</td></tr>
					<tr><td id="rankings_col_1">Rank #5</td><td id="rankings_col_2"><a href="profile.php"><?echo $rank_5_PID?></a></td><td id="rankings_col_3">Level</td><td id="rankings_col_4">50</td><td id="rankings_col_5">Skill Points</td><td id="rankings_col_6"><?echo$rank_1_sp?></td><td id="rankings_col_7">Win %</td><td id="rankings_col_8">80%</td></tr>
					<tr><td id="rankings_col_1">Rank #6</td><td id="rankings_col_2"><a href="profile.php"><?echo $rank_6_PID?></a></td><td id="rankings_col_3">Level</td><td id="rankings_col_4">50</td><td id="rankings_col_5">Skill Points</td><td id="rankings_col_6"><?echo$rank_1_sp?></td><td id="rankings_col_7">Win %</td><td id="rankings_col_8">80%</td></tr>
					<tr><td id="rankings_col_1">Rank #7</td><td id="rankings_col_2"><a href="profile.php"><?echo $rank_7_PID?></a></td><td id="rankings_col_3">Level</td><td id="rankings_col_4">50</td><td id="rankings_col_5">Skill Points</td><td id="rankings_col_6"><?echo$rank_1_sp?></td><td id="rankings_col_7">Win %</td><td id="rankings_col_8">80%</td></tr>
					<tr><td id="rankings_col_1">Rank #8</td><td id="rankings_col_2"><a href="profile.php"><?echo $rank_8_PID?></a></td><td id="rankings_col_3">Level</td><td id="rankings_col_4">50</td><td id="rankings_col_5">Skill Points</td><td id="rankings_col_6"><?echo$rank_1_sp?></td><td id="rankings_col_7">Win %</td><td id="rankings_col_8">80%</td></tr>
					<tr><td id="rankings_col_1">Rank #9</td><td id="rankings_col_2"><a href="profile.php"><?echo $rank_9_PID?></a></td><td id="rankings_col_3">Level</td><td id="rankings_col_4">50</td><td id="rankings_col_5">Skill Points</td><td id="rankings_col_6"><?echo$rank_1_sp?></td><td id="rankings_col_7">Win %</td><td id="rankings_col_8">80%</td></tr>
					<tr><td id="rankings_col_1">Rank #10</td><td id="rankings_col_2"><a href="profile.php"><?echo $rank_10_PID?></a></td><td id="rankings_col_3">Level</td><td id="rankings_col_4">50</td><td id="rankings_col_5">Skill Points</td><td id="rankings_col_6"><?echo$rank_1_sp?></td><td id="rankings_col_7">Win %</td><td id="rankings_col_8">80%</td></tr>		
				</table>
			</section>
		</section>
	</center>
</section>

<!--
<style>
#coming_soon {
	float:right;
	width:600px;
	height:420px;
	color:white;
}
#coming_soon label {
	font-size:20px;
}
#coming_soon text {
	font-size:15px;
	float:left;
}
#donate_title {

}





@media screen and (max-width:980px) {

#coming_soon {

}
#coming_soon label {
	font-size:30px;
	margin-bottom:25px;
}
#coming_soon text {
	font-size:20px;
}
#donate_title {
	font-size:30px;
}

}
</style>

<section id="coming_soon">
	<center style="width:100%;">
		<label>Coming soon:</label>
		<center style="width:400px;">
			<br>
			<text>- Profile pictures</text>
			<text>- Add your links (EX: facebook, instagram, website,  etc.)</text>
			<br>
			<text>- Follow others and get followed</text>
			<br><br>
			<text>- A rankings list</text>					
			<br>
			<text>- Share videos</text>
			<br>
			<text>- More Statistics</text>
			<br>
			<text>- Search for friends</text>
			<br>
			<text>- Faster upload speed</text>
		</center>	
	</center>
</section>
-->
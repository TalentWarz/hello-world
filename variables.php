<?PHP
$votes_to_win = 7;
///////////////////////////////////
//my judge stats
if ($_SESSION['player_id'])	{
	$res = mysqli_query($mysqli, "SELECT judge_votes from player_info WHERE player_id='".$player_id."'");
	$row = mysqli_fetch_assoc($res);
	$judge_votes = $row['judge_votes'];
}
else {
	$judge_votes = 0;
}
if ($_SESSION['player_id'])	{
	$res = mysqli_query($mysqli, "SELECT judge_wins from player_info WHERE player_id='".$player_id."'");
	$row = mysqli_fetch_assoc($res);
	$judge_wins = $row['judge_wins'];
}
else {
	$judge_wins = 0;
}
$judge_win_percent = ($judge_wins / $judge_votes) * 100;
if ($_SESSION['player_id'])	{
	$res = mysqli_query($mysqli, "SELECT judge_sp from player_info WHERE player_id='".$player_id."'");
	$row = mysqli_fetch_assoc($res);
	$judge_sp = $row['judge_sp'];
	if ($judge_sp < 0) {
		$judge_sp = 0;
	}
}
else {
	$judge_sp = 0;
}
include 'calculate_judge_level.php';
////////////////////////////////////////////////////////
//my video stats (what is displayed)
if ($_SESSION['player_id'])	{
	$res = mysqli_query($mysqli, "SELECT total_votes FROM player_info WHERE player_id='".$player_id."'");
	$row = mysqli_fetch_assoc($res);
	$video_total_votes = $row['total_votes'];
}
else {
	$video_total_votes = 0;
}
if ($_SESSION['player_id'])	{
	$res = mysqli_query($mysqli, "SELECT skill_points FROM player_info WHERE player_id='".$player_id."'");
	$row = mysqli_fetch_assoc($res);
	$video_sp = $row['skill_points'];
	include 'rankCalculation.php';
	
	
}
else {
	$video_sp = 0;
}
if ($_SESSION['player_id'])	{
	$res = mysqli_query($mysqli, "SELECT wins FROM player_info WHERE player_id='".$player_id."'");
	$row = mysqli_fetch_assoc($res);
	$video_wins = $row['wins'];
}
else {
	$video_wins = 0;
}
if ($_SESSION['player_id'])	{
	$res = mysqli_query($mysqli, "SELECT battles FROM player_info WHERE player_id='".$player_id."'");
	$row = mysqli_fetch_assoc($res);
	$video_battles = $row['battles'];
}
else {
	$video_battles = 0;
}
$video_win_percent = ($video_wins / $video_battles) * 100;
include 'calculate_level.php';
///////////////////////////////////////
//my votes battle id
$res = mysqli_query($mysqli, "SELECT v1_bid FROM player_info WHERE player_id='".$player_id."'"); 
$row = mysqli_fetch_assoc($res);
$v1_bid = $row['v1_bid'];
$res = mysqli_query($mysqli, "SELECT v2_bid FROM player_info WHERE player_id='".$player_id."'"); 
$row = mysqli_fetch_assoc($res);
$v2_bid = $row['v2_bid'];
$res = mysqli_query($mysqli, "SELECT v3_bid FROM player_info WHERE player_id='".$player_id."'"); 
$row = mysqli_fetch_assoc($res);
$v3_bid = $row['v3_bid'];
$res = mysqli_query($mysqli, "SELECT v4_bid FROM player_info WHERE player_id='".$player_id."'"); 
$row = mysqli_fetch_assoc($res);
$v4_bid = $row['v4_bid'];
$res = mysqli_query($mysqli, "SELECT v5_bid FROM player_info WHERE player_id='".$player_id."'"); 
$row = mysqli_fetch_assoc($res);
$v5_bid = $row['v5_bid'];
////////////////////////////////////

/*
if in_battle == 0 than my_video_battle_id = ''
if in_battle == 1 than my_video_battle_id = select battle_id from battles where player_1 = me or player 2 = me
*/
//my battle
//////////////////////////////////
//////////////////////////////////


//my battle
//////////////////////////////////
//////////////////////////////////
$res = mysqli_query($mysqli, "SELECT battle_id FROM battles WHERE player_1='".$player_id."' OR player_2='".$player_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video_battle_id = $row['battle_id'];
$res = mysqli_query($mysqli, "SELECT player_1 FROM battles WHERE battle_id='".$my_video_battle_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video_battle_player_1 = $row['player_1'];
$res = mysqli_query($mysqli, "SELECT player_2 FROM battles WHERE battle_id='".$my_video_battle_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video_battle_player_2 = $row['player_2'];
$res = mysqli_query($mysqli, "SELECT p1_level FROM battles WHERE battle_id='".$my_video_battle_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video_battle_p1_level = $row['p1_level'];
$res = mysqli_query($mysqli, "SELECT p2_level FROM battles WHERE battle_id='".$my_video_battle_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video_battle_p2_level = $row['p2_level'];
$res = mysqli_query($mysqli, "SELECT p1_votes FROM battles WHERE battle_id='".$my_video_battle_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video_battle_p1_votes = $row['p1_votes'];
$res = mysqli_query($mysqli, "SELECT p2_votes FROM battles WHERE battle_id='".$my_video_battle_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video_battle_p2_votes = $row['p2_votes'];
$res = mysqli_query($mysqli, "SELECT total_votes FROM battles WHERE battle_id='".$my_video_battle_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video_battle_total_votes = $row['total_votes'];	
	//skill_points added on win_check
$res = mysqli_query($mysqli, "SELECT p1_win FROM battles WHERE battle_id='".$my_video_battle_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video_battle_p1_win = $row['p1_win'];
$res = mysqli_query($mysqli, "SELECT p2_win FROM battles WHERE battle_id='".$my_video_battle_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video_battle_p2_win = $row['p2_win'];
$res = mysqli_query($mysqli, "SELECT active FROM battles WHERE battle_id='".$my_video_battle_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video_battle_active = $row['active'];
$res = mysqli_query($mysqli, "SELECT live FROM battles WHERE battle_id='".$my_video_battle_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video_battle_live = $row['live'];
$res = mysqli_query($mysqli, "SELECT remove FROM battles WHERE battle_id='".$my_video_battle_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video_battle_remove = $row['remove'];
$res = mysqli_query($mysqli, "SELECT p1_ready FROM battles WHERE battle_id='".$my_video_battle_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video_battle_p1_ready = $row['p1_ready'];
$res = mysqli_query($mysqli, "SELECT p2_ready FROM battles WHERE battle_id='".$my_video_battle_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video_battle_p2_ready = $row['p2_ready'];
//my video
$res = mysqli_query($mysqli, "SELECT video FROM player_info WHERE player_id='".$player_id."'"); 
$row = mysqli_fetch_assoc($res);
$my_video = $row['video'];
$res = mysqli_query($mysqli, "SELECT in_battle FROM player_info WHERE player_id='".$player_id."'"); 
$row = mysqli_fetch_assoc($res);
$in_battle = $row['in_battle'];
if ($my_video_battle_player_1 == $player_id) {
	$my_votes = $my_video_battle_p1_votes;
	$opp_pid = $my_video_battle_player_2;
	$res = mysqli_query($mysqli, "SELECT video FROM player_info WHERE player_id='".$opp_pid."'"); 
	$row = mysqli_fetch_assoc($res);
	$opp_video = $row['video'];
	$opp_votes = $my_video_battle_p2_votes;	
}
if ($my_video_battle_player_2 == $player_id) {
	$my_votes = $my_video_battle_p2_votes;
	$opp_pid = $my_video_battle_player_1;
	$res = mysqli_query($mysqli, "SELECT video FROM player_info WHERE player_id='".$opp_pid."'"); 
	$row = mysqli_fetch_assoc($res);
	$opp_video = $row['video'];
	$opp_votes = $my_video_battle_p1_votes;
}
////////////////////////////////////////////////////////



////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////


///////////////////////////////////////////////////////
//displayed battle

$res = mysqli_query($mysqli, "SELECT battle_id from battles WHERE live=1 && p1_level='".$judge_level."' && p2_level='".$judge_level."' && battle_id!='".$my_video_battle_id."' && battle_id!='".$v1_bid."' && battle_id!='".$v2_bid."' && battle_id!='".$v3_bid."' && battle_id!='".$v4_bid."' && battle_id!='".$v5_bid."'");
$row = mysqli_fetch_assoc($res);
session_start();
$_SESSION['display_battle_id'] = $row['battle_id'];
$display_battle_id = $row['battle_id'];
if ($display_battle_id == $my_video_battle_id) {
	$res = mysqli_query($mysqli, "SELECT battle_id FROM lvl_1 WHERE live=1  && battle_id!='".$my_video_battle_id."'");
	$row = mysqli_fetch_assoc($res);
	$display_battle_id = $row['battle_id'];
}
if ($display_battle_id == '') {
	$res = mysqli_query($mysqli, "SELECT battle_id FROM lvl_1 WHERE live=1  && battle_id>1");
	$row = mysqli_fetch_assoc($res);
	$display_battle_id = $row['battle_id'];	
}



$res = mysqli_query($mysqli, "SELECT player_1 from battles WHERE battle_id='".$display_battle_id."'");
$row = mysqli_fetch_assoc($res);
$player_1 = $row['player_1'];
$res = mysqli_query($mysqli, "SELECT player_2 from battles WHERE battle_id='".$display_battle_id."' && player_1='".$player_1."'");
$row = mysqli_fetch_assoc($res);
$player_2 = $row['player_2'];

$res = mysqli_query($mysqli, "SELECT player_1 from battles WHERE player_1='".$player_1."'");
$row = mysqli_fetch_assoc($res);
$display_player_1 = $row['player_1'];
$res = mysqli_query($mysqli, "SELECT player_2 from battles WHERE player_2='".$player_2."'");
$row = mysqli_fetch_assoc($res);
$display_player_2 = $row['player_2'];

$res = mysqli_query($mysqli, "SELECT p1_votes from battles WHERE battle_id='".$display_battle_id."' && player_1='".$display_player_1."' && player_2='".$display_player_2."'");
$row = mysqli_fetch_assoc($res);
$display_p1_votes = $row['p1_votes'];
$res = mysqli_query($mysqli, "SELECT p2_votes from battles WHERE battle_id='".$display_battle_id."' && player_1='".$display_player_1."' && player_2='".$display_player_2."'");
$row = mysqli_fetch_assoc($res);
$display_p2_votes = $row['p2_votes'];
$res = mysqli_query($mysqli, "SELECT total_votes from battles WHERE battle_id='".$display_battle_id."' && player_1='".$display_player_1."' && player_2='".$display_player_2."'");
$row = mysqli_fetch_assoc($res);
$display_total_votes = $row['total_votes'];
	//skill_points added on display_win_check.php
$res = mysqli_query($mysqli, "SELECT p1_win from battles WHERE battle_id='".$display_battle_id."' && player_1='".$display_player_1."' && player_2='".$display_player_2."'");
$row = mysqli_fetch_assoc($res);
$display_p1_win = $row['p1_win'];
$res = mysqli_query($mysqli, "SELECT p2_win from battles WHERE battle_id='".$display_battle_id."' && player_1='".$display_player_1."' && player_2='".$display_player_2."'");
$row = mysqli_fetch_assoc($res);
$display_p2_win = $row['p2_win'];
$res = mysqli_query($mysqli, "SELECT p1_level from battles WHERE battle_id='".$display_battle_id."' && player_1='".$display_player_1."' && player_2='".$display_player_2."'");
$row = mysqli_fetch_assoc($res);
$display_p1_level = $row['p1_level'];
$res = mysqli_query($mysqli, "SELECT p2_level from battles WHERE battle_id='".$display_battle_id."' && player_1='".$display_player_1."' && player_2='".$display_player_2."'");
$row = mysqli_fetch_assoc($res);
$display_p2_level = $row['p2_level'];
$res = mysqli_query($mysqli, "SELECT video from player_info WHERE player_id='".$display_player_1."'");
$row = mysqli_fetch_assoc($res);
$display_player_1_video = $row['video'];
$res = mysqli_query($mysqli, "SELECT video from player_info WHERE player_id='".$display_player_2."'");
$row = mysqli_fetch_assoc($res);
$display_player_2_video = $row['video'];
$res = mysqli_query($mysqli, "SELECT live from battles WHERE battle_id='".$display_battle_id."' && player_1='".$display_player_1."' && player_2='".$display_player_2."'");
$row = mysqli_fetch_assoc($res);
$display_live = $row['live'];


$res = mysqli_query($mysqli, "SELECT reported from player_info WHERE player_id='".$player_id."'");
$row = mysqli_fetch_assoc($res);
$reported = $row['reported']; 


?>
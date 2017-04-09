<?php
/*==============================================================================
***Code information
**Developed by Alan Gonzalez Heras @ZuruhMX
**Company: Inkworks Design Afiliated - The Coding Monkeys
**Licences and permissions: We grant permission for modification of this code
**To create improvements to the upload process for TalentWarz.com and Afiliated
**Websites.
**
**Version:1.1.1
**Documentation Revision: 3
**Update Date: Monday August 16, 2016
**
**Note: We heavily suggest to anyone modifiying the code to add improvements
**made to the Changelog section located right below this note.
**
**ChangeLog:
***V1.0.0 - August 15, 2016:
****Initial commit
***V1.1.0 - August 16, 2016:
****Added overlooked mysql database connection needed to update player params
***V1.1.1 - August 17, 2016:
****Changed base file name and defined file size constant values
**
/*============================================================================*/
/**Functions section*/
/*============================================================================*/
/**/
function databaseUpdate($filename, $player_id){
  /*Propper MYSQL database CONNECTION SCRIPT*/
  $mysqli = mysqli_connect("127.0.0.1", "RIKERRR", "H3nn3$$3yV3n0mG7", "tw_demo");
  $result = "";
  if (mysqli_connect_errno($mysqli)) {
    $result = "fail";
  }else{
    mysqli_query($mysqli, "UPDATE player_info SET video='".$filename."' WHERE player_id='".$player_id."'");
    $result = "success";
    /*DEBUG*/
    //echo("UPDATE player_info SET video='".$filename."' WHERE player_id='".$player_id."'");
  }
  return $result;
}
/*============================================================================*/
/**Main process*/ //ini_set('upload_max_filesize', '150M');
/*============================================================================*/
/**/
/*We define the constant values of standardized file size conversion*/
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);
/*Next we set the accepted formats using the 80/20 rule to target the most
**common video formats*/
$allowedExts = array("mp4", "webm", "mov", "avi");
/*Next we identify the extension format of the uploaded file*/
$extension = strtolower(end(explode(".", $_FILES["file"]["name"])));
/*We store the filetype and name so we can change it if needed*/
$filetype = strtolower($_FILES["file"]["type"]);
$videoName = strtolower($_FILES["file"]["name"]);
/*Check if we have an IOS uploader*/
if ($extension == "mov" || $extension == "MOV") {
  $extension = "mp4";
  $filetype = "video/mp4";
  $videoName = str_replace(".MOV", ".mp4", $videoName);
  $videoName = str_replace(".mov", ".mp4", $videoName);
}
/*Here we start the identification, the upload process will start if the file
**has the correct file format and weighs less than the upload limit*/
if ((($filetype == "video/mp4") || ($filetype == "video/webm") || ($filetype == "video/mov") || ($filetype == "video/avi")) && ($_FILES["file"]["size"] < 150*MB) && in_array($extension, $allowedExts)){
  /*If no file is received we output an error code*/
  if ($_FILES["file"]["error"] > 0){
    echo "We apologize, but it seems that your file is either empty or corrupt. Please try again. You will be redirected to the homepage in 5 secconds. <script>setTimeout(function(){ window.location = 'home.php'; }, 5000);</script>";
  }else{
    /*These lines are for debug, feel free to un-comment them if needed.
    **echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    **echo "Type: " . $_FILES["file"]["type"] . "<br />";
    **echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    **echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    */
    $fileFinalName = $_POST['playerID']."-".date(mdy)."-".$videoName;
    /*Here we check if the file already exists*/
    if (file_exists("videos/" . $fileFinalName)){
      echo $videoName . " already exists. You will be redirected to the homepage in 5 secconds. <script>setTimeout(function(){ window.location = 'home.php'; }, 5000);</script>";
    }else{
      /*If the file made it all the way to here, it means the upload process
      **will begin*/
      move_uploaded_file($_FILES["file"]["tmp_name"], "videos/" . $fileFinalName);
      /*Here we call a function to update the player video submission*/
      if(databaseUpdate($fileFinalName, $_POST['playerID']) != "fail"){
        echo "Upload successful. You will be redirected to the homepage in 5 secconds. <script>setTimeout(function(){ window.location = 'home.php'; }, 5000);</script>";
		//try this
		//header("location: home.php");
      }else{
        echo "We apologize, but it seems that our databases are down right now, please send this code to our webmaster to update you video submission. You will be redirected to the homepage in 10 secconds. <script>setTimeout(function(){ window.location = 'home.php'; }, 10000);</script>";
        echo "ERROR:".$fileFinalName;
      }
    }
  }
}else{
  echo "Invalid file. You will be redirected to the homepage in 5 secconds. <script>setTimeout(function(){ window.location = 'home.php'; }, 5000);</script>".$_FILES["file"]["error"];
}
?>

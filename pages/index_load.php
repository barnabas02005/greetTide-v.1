<!-- JESUS IS LORD -->
<?php
    session_start();
    include("../config/db.php");

    if(@!isset($_SESSION["displaymail"])) {
        header("location: signin.php?youarenotloggedin");
    }
    require_once("../functions/data.php");
    $memid = $_SESSION["id"];
    //print_r($memdata["id"]);

    //print_r($_SESSION);
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">
      <link rel="stylesheet" href="../assets/css/home.css">
      <link rel="stylesheet" href="../assets/css/reset.css">
      <link rel="stylesheet" href="../assets/css/splash.css">
      <link rel="stylesheet" href="../assets/css/loader.css">

	<!-- theme -->
	<?php if($memdata['theme'] == 0) {
	?>
	<link rel="stylesheet" href="../assets/css/theme/light.css">
	<?php	
	}else if($memdata['theme'] == 1) {
	?>
	<link rel="stylesheet" href="../assets/css/theme/dark.css">
	<?php
	}
	?>
  <script src = "../assets/js/jquery.min.js"></script>
	<script src="../assets/js/splash.js"></script>
  <title>Home</title>
</head>

<body class="app_body">
	<?php include("../includes/splash.php"); ?>
    <!-- Video of card opening, reading content, for sharing card on whatsapp status, instagram stories -->
    <!-- [Print card view[front, inside and back], from website to paper] -->
		<!-- General style 'css' file for all pages -->
    <iframe class="theIframe" id="content-iframe" title="main_view"></iframe>
    <?php include("../includes/bottomtab.php");?>

    <?php include ("../functions/inline-script.php"); ?>
    <script src="../assets/js/cache.js"></script>
    <script defer src="../assets/js/bottomsheet.js"></script>
</body>
</html>

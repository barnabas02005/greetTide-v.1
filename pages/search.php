<!-- JESUS IS LORD -->
<?php
session_start();
include("../config/db.php");

if (@!isset($_SESSION["displaymail"])) {
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
	<link rel="stylesheet" href="../assets/css/search.css">
	<link rel="stylesheet" href="../assets/css/splash.css">
	<!-- theme -->
	<?php if ($memdata['theme'] == 0) {
	?>
		<link rel="stylesheet" href="../assets/css/theme/light.css">
	<?php
	} else if ($memdata['theme'] == 1) {
	?>
		<link rel="stylesheet" href="../assets/css/theme/dark.css">
	<?php
	}
	?>
	<script src="../assets/js/jquery.min.js"></script>
	<title>Searching | GreetTide</title>
</head>

<body>
	<div class="all_appContent">
		<?php include("../includes/bottomtab.php"); ?>
		<div class="container_wrapper">
			<div class="first_sec">
				<div class="FS_head">
					<div class="FSH_first">
						<div class="page_FSHF_title blinkanime"></div>
						<div class="page_FSHF_icon blinkanime"></div>
					</div>
					<div class="FSH_second">
						<div class="FSHS_icon"></div>
						<div class="FSHS_searchBox">
							<input type="text" name="search" id="searchbox" placeholder="searching">
						</div>
					</div>
				</div>
				<div class="FS_body">
					<ul>
						<?php for ($i = 0; $i < 10; $i++) { ?>
							<li>
								<div class="ava_display blinkanime" style="--delay: 0.3s;">
									<!-- <img src="" alt="avatar"> -->
								</div>
								<div class="fullname_display_name">
									<div class="name blinkanime" style="--delay: 0.7s;"></div>
									<div class="display_name blinkanime" style="--delay: 1s;"></div>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="second_sec"></div>
		</div>
		</ /?php include("../includes/bottomsheet.php"); ?>
		</ /?php include("../includes/moremenu.php"); ?>
	</div>

	<script>
		(function() {
			var allContent = document.querySelector('.all_appContent');
			allContent.style.display = "none";
			window.addEventListener('DOMContentLoaded', function() {
				window.setTimeout(function() {
					allContent.style.display = "flex";
				}, 0);
			});
		})();
	</script>
	<script type="module" src="../assets/js/loadBottomsheet.js"></script>
	<script src="../assets/js/nav.js"></script>
	<!-- <script src="../assets/js/bottomsheet.js"></script>
	<script src="../assets/js/more_menu.js"></script> -->
	<!-- <script src="../assets/js/splash.js"></script> -->
</body>

</html>
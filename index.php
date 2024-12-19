<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= no">
	<meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
	<title>Welcome|EcardExT</title>
	<link rel="stylesheet" href="assets/css/index.css">
	<link rel="stylesheet" href="assets/css/loader.css">
	<link rel="stylesheet" href="assets/css/splash.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,600;9..40,800;9..40,1000&family=Poppins:wght@400;500;600;900&family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>

<body>
	<?php include("includes/splash.php"); ?>
	<div class="wrapper">
		<header>
			<div class="left">
				<div class="web_app_icon">
					<img src="assets/img/logo/redesign_greetide_blob.png" alt="">
				</div>
			</div>
			<div class="right"></div>
		</header>
		<main>
			<div class="main_text">
				<p>Crafting</p>
				<p>connections,</p>
				<p>one card at a</p>
				<p>time</p>
			</div>
			<div class="motto_text">
				<p>where you sentiments shines through ✨🌟</p>
			</div>
			<a href="pages/search.php" style="width: 100%; height: auto;text-decoration: none;">
				<div class="get_started_btn">
					<button>Get started</button>
				</div>
			</a>
		</main>
		<footer>
			<ul>
				<li>Contact</li>
				<li>Content Policy</li>
				<li>About</li>
			</ul>
		</footer>
	</div>
	<script src="assets/js/nav.js"></script>
	<script src="assets/js/splash.js"></script>
	<script src="assets/js/1.js"></script>
	</ /?php include("includes/footpage.php");?>
	<script>
		// Function to handle orientation change
		function handleOrientationChange() {
			if (window.orientation === 90 || window.orientation === -90) {
				// Landscape orientation
				alert("Please switch to portrait mode for a better experience.");
			}
		}

		// Attach the orientation change event listener
		window.addEventListener("orientationchange", handleOrientationChange);

		// Initial check for orientation on page load
		handleOrientationChange();


		$(document).on('ready', function() {
			setTimeout(function() {
				$('.wrapper').addClass('active')
			}, 2330);
		});
	</script>
</body>

</html>
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
	<link rel="stylesheet" href="../assets/css/moremenu.css">
	<link rel="stylesheet" href="../assets/css/splash.css">
	<link rel="stylesheet" href="../assets/css/reset.css">
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
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cardo:wght@400;700&family=Jost&family=Poppins:wght@400;500;600;900&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="../assets/img/logo/redesign_greetide_blob.png" type="images/x-icon">
	<script src="../assets/js/jquery.min.js"></script>
	<title>Home | GreeTide</title>
</head>

<body>
	<?php // include("../includes/splash.php"); 
	?>
	<div class="all_appContent" style="display: flex;">
		<?php include("../includes/bottomtab.php"); ?>
		<div class="container_wrapper">
			<div class="overlay_content"></div>
			<?php include("../includes/appHeader.php"); ?>
			<div class="container_body">
				<div class="content">
					<div class="all_posts">
						<?php
						for ($r = 0; $r < rand(2, 2); $r++) {
							echo rand(2, 20)
						?>
							<div class="post_container">
								<div class="PC_head">
									<div class="PC_head_left">
										<div class="member_avatar">
											<img src="../assets/img/loginBg/creative_1.jpg" alt="">
										</div>
										<div class="card_name_mem">
											<div class="card_name">
												<p>
													Birthday card with image
												</p>
											</div>
											<div class="mem_displayname">
												<p>
													@jamesruth
												</p>
												<div class="subscribed_txt">
													<span>• Subscribed</span>
												</div>
											</div>
										</div>
									</div>
									<div class="PC_head_right"></div>
								</div>
								<div class="PC_body">
									<div class="PC_body_content">
										<div class="media_file">
											<img src="../assets/img/cardFP/My Invitation.jpeg" alt="media_file">
										</div>
									</div>
								</div>
								<div class="PC_footer">
									<div class="PCfoot_up">
										<div class="PC_footer_left">
											<div class="like_comment">
												<div class="post_actions">
													<div class="PA_icon checked">
														<!-- Title: “Chat Round Line SVG Vector”
															Author: “Solar Icons“— https://www.svgrepo.com/author/Solar%20Icons/
															Source: “svgrepo.com“— https://www.svgrepo.com/
															License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution -->

														<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
														<svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
															<defs>
																<linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="0%">
																	<stop offest="0%" style="stop-color: rgb(242, 112, 156);stop-opacity: 1"></stop>
																	<stop offest="100%" style="stop-color: rgb(255, 148, 114);stop-opacity: 1"></stop>
																</linearGradient>
															</defs>
															<path d="M9.15316 5.40838C10.4198 3.13613 11.0531 2 12 2C12.9469 2 13.5802 3.13612 14.8468 5.40837L15.1745 5.99623C15.5345 6.64193 15.7144 6.96479 15.9951 7.17781C16.2757 7.39083 16.6251 7.4699 17.3241 7.62805L17.9605 7.77203C20.4201 8.32856 21.65 8.60682 21.9426 9.54773C22.2352 10.4886 21.3968 11.4691 19.7199 13.4299L19.2861 13.9372C18.8096 14.4944 18.5713 14.773 18.4641 15.1177C18.357 15.4624 18.393 15.8341 18.465 16.5776L18.5306 17.2544C18.7841 19.8706 18.9109 21.1787 18.1449 21.7602C17.3788 22.3417 16.2273 21.8115 13.9243 20.7512L13.3285 20.4768C12.6741 20.1755 12.3469 20.0248 12 20.0248C11.6531 20.0248 11.3259 20.1755 10.6715 20.4768L10.0757 20.7512C7.77268 21.8115 6.62118 22.3417 5.85515 21.7602C5.08912 21.1787 5.21588 19.8706 5.4694 17.2544L5.53498 16.5776C5.60703 15.8341 5.64305 15.4624 5.53586 15.1177C5.42868 14.773 5.19043 14.4944 4.71392 13.9372L4.2801 13.4299C2.60325 11.4691 1.76482 10.4886 2.05742 9.54773C2.35002 8.60682 3.57986 8.32856 6.03954 7.77203L6.67589 7.62805C7.37485 7.4699 7.72433 7.39083 8.00494 7.17781C8.28555 6.96479 8.46553 6.64194 8.82547 5.99623L9.15316 5.40838Z" />
														</svg>
													</div>
												</div>
												<div class="post_actions">
													<div class="PA_icon comment">
														<!-- Title: “Like SVG Vector”
																Author: “Solar Icons“— https://www.svgrepo.com/author/Solar%20Icons/
																Source: “svgrepo.com“— https://www.svgrepo.com/
																License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution 
															-->

														<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
														<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22Z" />
															<path d="M8 10.5H16" stroke-linecap="round" />
															<path d="M8 14H13.5" stroke-linecap="round" />
														</svg>
													</div>
													<div class="PA_text_noti">
														<p><?php echo $r; ?></p>
													</div>
												</div>
											</div>
										</div>
										<div class="PC_footer_right">
											<div class="use_design">
												<button class="buy_design">
													<div class="svg_icon">
														<!-- Title: “Shopping Bag 5 SVG Vector”
															Author: “Ankush Syal“— https://www.svgrepo.com/author/Ankush%20Syal/
															Source: “svgrepo.com“— https://www.svgrepo.com/
															License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution -->
														<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
														<svg viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path fill-rule="evenodd" clip-rule="evenodd" d="M5.50063 16.1407C5.46273 18.2335 7.1278 19.9613 9.22063 20.0007H15.7806C17.8735 19.9613 19.5385 18.2335 19.5006 16.1407L19.0636 11.4527C18.9527 9.68529 17.716 8.19053 16.0006 7.75065C15.6432 7.64667 15.2729 7.59348 14.9006 7.59265H10.1006C9.72837 7.59348 9.35808 7.64667 9.00063 7.75065C7.28636 8.19067 6.05026 9.68433 5.93863 11.4507L5.50063 16.1407Z" stroke-linecap="round" stroke-linejoin="round" />
															<path d="M16.0006 9.38862V7.36762C15.9629 5.4718 14.3965 3.96493 12.5006 4.00062C10.6047 3.96493 9.03835 5.4718 9.00061 7.36762V9.38762" stroke-linecap="round" stroke-linejoin="round" />
														</svg>
													</div>
													<p>₦500</p>
												</button>
											</div>
											<span class="right_side_divider"></span>
											<div class="post_actions">
												<div class="PA_icon">
													<!-- Title: “Menu Vertical SVG Vector”
													Author: “Software Mansion“— https://www.svgrepo.com/author/Software%20Mansion/
													Source: “svgrepo.com“— https://www.svgrepo.com/
													License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution -->

													<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
													<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5Z" stroke-linecap="round" stroke-linejoin="round" />
														<path d="M13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12Z" stroke-linecap="round" stroke-linejoin="round" />
														<path d="M13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19Z" stroke-linecap="round" stroke-linejoin="round" />
													</svg>
												</div>

											</div>
										</div>
									</div>
									<div class="PCfoot_down">
										<div class="PCFD_tags">
											<ul>
												<li>
													<p>Greeting</p>
												</li>
												<li>
													<p>Birthday</p>
												</li>
												<li>
													<p>Card</p>
												</li>
												<li>
													<p>Celebrate</p>
												</li>
												<li>
													<p>Design</p>
												</li>
												<li>
													<p>Border-radius</p>
												</li>
												<li>
													<p>N500</p>
												</li>
												<li>
													<p>Victory</p>
												</li>
												<li>
													<p>New age</p>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="post_container">
								<div class="PC_head">
									<div class="PC_head_left">
										<div class="member_avatar">
											<img src="../assets/img/loginBg/87e789b6-db7a-49e4-b605-0a6b149aa488.jpeg" alt="">
										</div>
										<div class="card_name_mem">
											<div class="card_name">
												<p>
													Some cool arts stuffs to play with this holiday
												</p>
											</div>
											<div class="mem_displayname">
												<p>
													@hezekiahJudah
												</p>
												<div class="subscribed_txt">
													<span>• Subscribed</span>
												</div>
											</div>
										</div>
									</div>
									<div class="PC_head_right"></div>
								</div>
								<div class="PC_body">
									<div class="PC_body_content">
										<div class="media_file">
											<img src="../assets/img/card22.png" alt="media_file">
										</div>
									</div>
								</div>
								<div class="PC_footer">
									<div class="PCfoot_up">
										<div class="PC_footer_left">
											<div class="like_comment">
												<div class="post_actions">
													<div class="PA_icon checked">
														<!-- Title: “Chat Round Line SVG Vector”
															Author: “Solar Icons“— https://www.svgrepo.com/author/Solar%20Icons/
															Source: “svgrepo.com“— https://www.svgrepo.com/
															License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution -->

														<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
														<svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
															<defs>
																<linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="0%">
																	<stop offest="0%" style="stop-color: rgb(242, 112, 156);stop-opacity: 1"></stop>
																	<stop offest="100%" style="stop-color: rgb(255, 148, 114);stop-opacity: 1"></stop>
																</linearGradient>
															</defs>
															<path d="M9.15316 5.40838C10.4198 3.13613 11.0531 2 12 2C12.9469 2 13.5802 3.13612 14.8468 5.40837L15.1745 5.99623C15.5345 6.64193 15.7144 6.96479 15.9951 7.17781C16.2757 7.39083 16.6251 7.4699 17.3241 7.62805L17.9605 7.77203C20.4201 8.32856 21.65 8.60682 21.9426 9.54773C22.2352 10.4886 21.3968 11.4691 19.7199 13.4299L19.2861 13.9372C18.8096 14.4944 18.5713 14.773 18.4641 15.1177C18.357 15.4624 18.393 15.8341 18.465 16.5776L18.5306 17.2544C18.7841 19.8706 18.9109 21.1787 18.1449 21.7602C17.3788 22.3417 16.2273 21.8115 13.9243 20.7512L13.3285 20.4768C12.6741 20.1755 12.3469 20.0248 12 20.0248C11.6531 20.0248 11.3259 20.1755 10.6715 20.4768L10.0757 20.7512C7.77268 21.8115 6.62118 22.3417 5.85515 21.7602C5.08912 21.1787 5.21588 19.8706 5.4694 17.2544L5.53498 16.5776C5.60703 15.8341 5.64305 15.4624 5.53586 15.1177C5.42868 14.773 5.19043 14.4944 4.71392 13.9372L4.2801 13.4299C2.60325 11.4691 1.76482 10.4886 2.05742 9.54773C2.35002 8.60682 3.57986 8.32856 6.03954 7.77203L6.67589 7.62805C7.37485 7.4699 7.72433 7.39083 8.00494 7.17781C8.28555 6.96479 8.46553 6.64194 8.82547 5.99623L9.15316 5.40838Z" />
														</svg>
													</div>
												</div>
												<div class="post_actions">
													<div class="PA_icon comment">
														<!-- Title: “Like SVG Vector”
																Author: “Solar Icons“— https://www.svgrepo.com/author/Solar%20Icons/
																Source: “svgrepo.com“— https://www.svgrepo.com/
																License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution 
															-->

														<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
														<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22Z" />
															<path d="M8 10.5H16" stroke-linecap="round" />
															<path d="M8 14H13.5" stroke-linecap="round" />
														</svg>
													</div>
													<div class="PA_text_noti">
														<p><?php echo $r; ?></p>
													</div>
												</div>
											</div>
										</div>
										<div class="PC_footer_right">
											<div class="use_design">
												<button class="buy_design">
													<div class="svg_icon">
														<!-- Title: “Shopping Bag 5 SVG Vector”
															Author: “Ankush Syal“— https://www.svgrepo.com/author/Ankush%20Syal/
															Source: “svgrepo.com“— https://www.svgrepo.com/
															License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution -->
														<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
														<svg viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path fill-rule="evenodd" clip-rule="evenodd" d="M5.50063 16.1407C5.46273 18.2335 7.1278 19.9613 9.22063 20.0007H15.7806C17.8735 19.9613 19.5385 18.2335 19.5006 16.1407L19.0636 11.4527C18.9527 9.68529 17.716 8.19053 16.0006 7.75065C15.6432 7.64667 15.2729 7.59348 14.9006 7.59265H10.1006C9.72837 7.59348 9.35808 7.64667 9.00063 7.75065C7.28636 8.19067 6.05026 9.68433 5.93863 11.4507L5.50063 16.1407Z" stroke-linecap="round" stroke-linejoin="round" />
															<path d="M16.0006 9.38862V7.36762C15.9629 5.4718 14.3965 3.96493 12.5006 4.00062C10.6047 3.96493 9.03835 5.4718 9.00061 7.36762V9.38762" stroke-linecap="round" stroke-linejoin="round" />
														</svg>
													</div>
													<p>₦15000</p>
												</button>
											</div>
											<span class="right_side_divider"></span>
											<div class="post_actions">
												<div class="PA_icon">
													<!-- Title: “Menu Vertical SVG Vector”
													Author: “Software Mansion“— https://www.svgrepo.com/author/Software%20Mansion/
													Source: “svgrepo.com“— https://www.svgrepo.com/
													License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution -->

													<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
													<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5Z" stroke-linecap="round" stroke-linejoin="round" />
														<path d="M13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12Z" stroke-linecap="round" stroke-linejoin="round" />
														<path d="M13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19Z" stroke-linecap="round" stroke-linejoin="round" />
													</svg>
												</div>

											</div>
										</div>
									</div>
									<div class="PCfoot_down">
										<div class="PCFD_tags">
											<ul>
												<li>
													<p>Greeting</p>
												</li>
												<li>
													<p>Birthday</p>
												</li>
												<li>
													<p>Card</p>
												</li>
												<li>
													<p>Celebrate</p>
												</li>
												<li>
													<p>Design</p>
												</li>
												<li>
													<p>Border-radius</p>
												</li>
												<li>
													<p>N500</p>
												</li>
												<li>
													<p>Victory</p>
												</li>
												<li>
													<p>New age</p>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="post_container b">
								<div class="PC_head">
									<div class="PC_head_left">
										<div class="member_avatar">
											<img src="../assets/img/9.png" alt="">
										</div>
										<li class="card_name_mem">
											<div class="card_name">
												<p>
													#Happy days card
												</p>
											</div>
											<div class="mem_displayname">
												<p>
													@joshua.abioye
												</p>

											</div>
										</li>
										<div class="follow_btn">
											<button>
												<p>
													Subscribe
												</p>
											</button>
										</div>
									</div>
									<div class="PC_head_right"></div>
								</div>
								<div class="PC_body">
									<div class="PC_body_content">
										<div class="media_file">
											<img src="../assets/img/card3.png" alt="media_file">
										</div>
									</div>
								</div>
								<div class="PC_footer">
									<div class="PCfoot_up">
										<div class="PC_footer_left">
											<div class="like_comment">
												<div class="post_actions">
													<div class="PA_icon">
														<!-- Title: “Chat Round Line SVG Vector”
															Author: “Solar Icons“— https://www.svgrepo.com/author/Solar%20Icons/
															Source: “svgrepo.com“— https://www.svgrepo.com/
															License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution -->

														<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
														<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M9.15316 5.40838C10.4198 3.13613 11.0531 2 12 2C12.9469 2 13.5802 3.13612 14.8468 5.40837L15.1745 5.99623C15.5345 6.64193 15.7144 6.96479 15.9951 7.17781C16.2757 7.39083 16.6251 7.4699 17.3241 7.62805L17.9605 7.77203C20.4201 8.32856 21.65 8.60682 21.9426 9.54773C22.2352 10.4886 21.3968 11.4691 19.7199 13.4299L19.2861 13.9372C18.8096 14.4944 18.5713 14.773 18.4641 15.1177C18.357 15.4624 18.393 15.8341 18.465 16.5776L18.5306 17.2544C18.7841 19.8706 18.9109 21.1787 18.1449 21.7602C17.3788 22.3417 16.2273 21.8115 13.9243 20.7512L13.3285 20.4768C12.6741 20.1755 12.3469 20.0248 12 20.0248C11.6531 20.0248 11.3259 20.1755 10.6715 20.4768L10.0757 20.7512C7.77268 21.8115 6.62118 22.3417 5.85515 21.7602C5.08912 21.1787 5.21588 19.8706 5.4694 17.2544L5.53498 16.5776C5.60703 15.8341 5.64305 15.4624 5.53586 15.1177C5.42868 14.773 5.19043 14.4944 4.71392 13.9372L4.2801 13.4299C2.60325 11.4691 1.76482 10.4886 2.05742 9.54773C2.35002 8.60682 3.57986 8.32856 6.03954 7.77203L6.67589 7.62805C7.37485 7.4699 7.72433 7.39083 8.00494 7.17781C8.28555 6.96479 8.46553 6.64194 8.82547 5.99623L9.15316 5.40838Z" />
														</svg>
													</div>
												</div>
												<div class="post_actions">
													<div class="PA_icon comment">
														<!-- Title: “Like SVG Vector”
															Author: “Solar Icons“— https://www.svgrepo.com/author/Solar%20Icons/
															Source: “svgrepo.com“— https://www.svgrepo.com/
															License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution -->

														<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
														<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<defs>
																<linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="0%">
																	<stop offest="0%" style="stop-color: rgb(242, 112, 156);stop-opacity: 1"></stop>
																	<stop offest="100%" style="stop-color: rgb(255, 148, 114);stop-opacity: 1"></stop>
																</linearGradient>
															</defs>
															<path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22Z" />
															<path d="M8 10.5H16" stroke-linecap="round" />
															<path d="M8 14H13.5" stroke-linecap="round" />
														</svg>
													</div>
													<div class="PA_text_noti">
														<p><?php echo $r; ?></p>
													</div>
												</div>
											</div>
										</div>
										<div class="PC_footer_right">
											<div class="use_design">
												<button>
													<p>
														Use design
													</p>
												</button>
											</div>
											<span class="right_side_divider"></span>
											<div class="post_actions">
												<div class="PA_icon">
													<!-- Title: “Menu Vertical SVG Vector”
													Author: “Software Mansion“— https://www.svgrepo.com/author/Software%20Mansion/
													Source: “svgrepo.com“— https://www.svgrepo.com/
													License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution -->

													<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
													<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5Z" stroke-linecap="round" stroke-linejoin="round" />
														<path d="M13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12Z" stroke-linecap="round" stroke-linejoin="round" />
														<path d="M13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19Z" stroke-linecap="round" stroke-linejoin="round" />
													</svg>
												</div>

											</div>
										</div>
									</div>
									<div class="PCfoot_down">
										<div class="PCFD_tags">
											<ul>
												<li>
													<p>Greeting</p>
												</li>
												<li>
													<p>Birthday</p>
												</li>
												<li>
													<p>Card</p>
												</li>
												<li>
													<p>Celebrate</p>
												</li>
												<li>
													<p>Victory</p>
												</li>
												<li>
													<p>New age</p>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>

							<li class="page-link-inside-iframe" page-name="message.php" data-fullscreen="false">JESUS IS LORD FOREVER</li>
						<?php
						} ?>
					</div>
				</div>
			</div>
		</div>
		<?php include("../includes/bottomsheet.php"); ?>
		<?php include("../includes/moremenu.php"); ?>
	</div>
	<script type="module" src="../assets/js/loadBottomsheet.js"></script>
	<!-- navabar, feed_suggestion -->
	<!-- like, reply, save -->
	<script>
		(function() {
			// animate on scroll post content
			// Observer
			const observer = new IntersectionObserver((entries) => {
				entries.forEach((entry) => {
					// console.log(entry);
					if (entry.isIntersecting) {
						entry.target.classList.add('show');
					} else {
						// entry.target.classList.remove('show');
					}
				});
			});
			const postContainer = document.querySelectorAll('.post_container');
			postContainer.forEach((post) => observer.observe(post));


			let scrollPos = 0;
			const nav = document.querySelector('.container_header');
			const feedSuggestions = document.querySelector('.feed_suggestion');

			function checkPosition() {
				let windowY = window.scrollY;
				if (windowY < scrollPos) {
					// Scrolling UP
					nav.classList.add('is-visible');
					nav.classList.remove('is-hidden');
					feedSuggestions.classList.add('is-visible');
					feedSuggestions.classList.remove('is-hidden');
				} else {
					// Scrolling DOWN
					nav.classList.add('is-hidden');
					nav.classList.remove('is-visible');
					feedSuggestions.classList.add('is-hidden');
					feedSuggestions.classList.remove('is-visible');
				}
				scrollPos = windowY;
			}

			function debounce(func, wait = 10, immediate = true) {
				let timeout;
				return function() {
					let context = this,
						args = arguments;
					let later = function() {
						timeout = null;
						if (!immediate) func.apply(context, args);
					};
					let callNow = immediate && !timeout;
					clearTimeout(timeout);
					timeout = setTimeout(later, wait);
					if (callNow) func.apply(context, args);
				};
			};

			window.addEventListener('scroll', debounce(checkPosition));
		})();
	</script>
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
	<script src="../assets/js/splash.js"></script>
	<script src="../assets/js/bottomsheet.js"></script>
	<script src="../assets/js/more_menu.js"></script>
	<script src="../assets/js/nav.js"></script>
	<script>
		(function() {
			const flashplayers = document.querySelectorAll(".flash_video_player");
			let pressTimers = {};

			flashplayers.forEach(videoElement => {
				videoElement.addEventListener('mousedown', (event) => startPress(event, videoElement));
				videoElement.addEventListener('mouseup', () => endPress(videoElement));
				videoElement.addEventListener('touchstart', (event) => startPress(event, videoElement));
				videoElement.addEventListener('touchend', () => endPress(videoElement));
			});


			function startPress(event, videoElement) {

				const videoNumber = videoElement.dataset.videoNumber;
				pressTimers[videoNumber] = setTimeout(function() {
					event.preventDefault();
					if (videoElement.paused)
						videoElement.play();
					else
						videoElement.pause();

					//alert("JESUS IS LORD FOREVER");
				}, 500) // Adjust threshold (time) here
			}

			function endPress(videoElement) {
				const videoNumber = videoElement.dataset.videoNumber;
				clearTimeout(pressTimers[videoNumber]);
				if (videoElement.pause)
					videoElement.play();
			}
		})();
	</script>
</body>

</html>
<?php
session_start();
include("../functions/signinfunction.php");
if (@isset($_SESSION["displaymail"])) {
	header("location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">
	<link rel="manifest" href="../manifest.json">
	<link rel="apple-touch-icon" sizes="180x180" href="../assets/img/logo/icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../assets/img/logo/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/img/logo/icons/favicon-16x16.png">
	<link rel="shortcut icon" href="../assets/img/logo/icons/favicon.ico">
	<!-- <link rel="manifest" href="/site.webmanifest"> -->
	<meta name="msapplication-config" content="../assets/img/logo/icons/browserconfig.xml">
	<link rel="mask-icon" href="../assets/img/logo/icons/safari-pinned-tab.png" color="#ffffff">
	<meta name="msapplication-TileColor" content="#ffffff">
	<link rel="stylesheet" href="../assets/css/signin.css">
	<link rel="stylesheet" href="../assets/css/loader.css">
	<link rel="stylesheet" href="../assets/css/languagemodal.css">
	<!-- <link rel="stylesheet" href="../assets/css/signindark.css"> -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cardo:wght@400;700&family=Jost&family=Poppins:wght@400;500;600;900&display=swap" rel="stylesheet">
	<title>Signin | GeeTide</title>
</head>

<body class="login_body" id="contentContainer">
	<main>
		<section id="left">
			<div class="slideshow_container">
				<div class="slide_show fade-down">
					<div class="slide_img">
						<div class="overlay"></div>
						<img src="../assets/img/loginBg/creative_2.jpg" alt="loginBg_2">
					</div>
					<div class="slide_text">
						<div class="main_text fade-slide-right">
							<p>Creative ipsum dolor sit amet consectetur.</p>
						</div>
						<div class="sub_writing fade-down">
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore expedita sunt, ducimus quis impedit tempore cupiditate nemo harum ratione facere?</p>
						</div>
					</div>
				</div>
				<div class="slide_show fade-scale">
					<div class="slide_img">
						<div class="overlay"></div>
						<img src="../assets/img/loginBg/cardDesign_2.jpg" alt="loginBg_2">
					</div>
					<div class="slide_text">
						<div class="main_text fade-up">
							<p>Card design ipsum dolor sit amet consectetur.</p>
						</div>
						<div class="sub_writing fade-down">
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore expedita sunt, ducimus quis impedit tempore cupiditate nemo harum ratione facere?</p>
						</div>
					</div>
				</div>
				<div class="slide_show fade-up">
					<div class="slide_img">
						<div class="overlay"></div>
						<img src="../assets/img/loginBg/planning_2.jpg" alt="loginBg_2">
					</div>
					<div class="slide_text">
						<div class="main_text fade-slide-left">
							<p>Planning event dolor sit amet consectetur.</p>
						</div>
						<div class="sub_writing fade-down">
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore expedita sunt, ducimus quis impedit tempore cupiditate nemo harum ratione facere?</p>
						</div>
					</div>
				</div>
				<div class="slide_show fade-slide-left">
					<div class="slide_img">
						<div class="overlay"></div>
						<img src="../assets/img/loginBg/creative_bg.jpg" alt="loginBg_2">
					</div>
					<div class="slide_text">
						<div class="main_text fade-down">
							<p>Riding the waves of creativity, channel divine inspiration effortlessly.</p>
						</div>
						<div class="sub_writing fade-scale">
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore expedita sunt, ducimus quis impedit tempore cupiditate nemo harum ratione facere?</p>
						</div>
					</div>
				</div>
				<div class="slide_show fade-down">
					<div class="slide_img">
						<div class="overlay"></div>
						<img src="../assets/img/loginBg/online_presence_2.jpg" alt="loginBg_2">
					</div>
					<div class="slide_text">
						<div class="main_text fade-up">
							<p>Online presence dolor sit amet consectetur.</p>
						</div>
						<div class="sub_writing fade-up" style="animation-timing-function: cubic-bezier(0.23, 1, 0.320, 1);">
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore expedita sunt, ducimus quis impedit tempore cupiditate nemo harum ratione facere?</p>
						</div>
					</div>
				</div>
				<div class="slide_show fade-slide-right">
					<div class="slide_img">
						<div class="overlay"></div>
						<img src="../assets/img/loginBg/LiveInTheMoment.jpg" alt="loginBg_2">
					</div>
					<div class="slide_text">
						<div class="main_text fade-slide-left" style="animation-timing-function: cubic-bezier(0.075, 0.82, 0.165, 1)">
							<p>Online event ipsum sit amet consectetur.</p>
						</div>
						<div class="sub_writing fade-slide-left" style="animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);">
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore expedita sunt, ducimus quis impedit tempore cupiditate nemo harum ratione facere?</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="right">
			<div class="LG_place">
				<div class="LG_head">
					<div class="left">
						<div class="webApp_icon">
							<div class="skeleton-loader LG_webApp_icon blinkanime"></div>
							<div class="App_icon content_show">
								<img src="../assets/img/logo/icons/android-chrome-512x512.png" alt="webApp_ICON">
							</div>
						</div>
						<div class="webApp_name">
							<div class="skeleton-loader LG_webApp_name blinkanime"></div>
							<!-- <p class="content_show">GreeTide</p> -->
						</div>
					</div>
					<div class="right">
						<div class="skeleton-loader icon more_settings_icon blinkanime"></div>
						<div class="content_show LG_right_icon">
							<div class="vg_ic">
								<!-- Title: “Translate SVG Vector”
															Author: “Iconsax“— https://www.svgrepo.com/author/Iconsax/
															Source: “svgrepo.com“— https://www.svgrepo.com/
															License: “MIT License”— https://www.svgrepo.com/page/licensing#MIT 
											-->

								<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->

								<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M19.06 18.6699L16.92 14.3999L14.78 18.6699" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M15.1699 17.9099H18.6899" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M16.9201 22.0001C14.1201 22.0001 11.8401 19.73 11.8401 16.92C11.8401 14.12 14.1101 11.8401 16.9201 11.8401C19.7201 11.8401 22.0001 14.11 22.0001 16.92C22.0001 19.73 19.7301 22.0001 16.9201 22.0001Z" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M5.02 2H8.94C11.01 2 12.01 3.00002 11.96 5.02002V8.94C12.01 11.01 11.01 12.01 8.94 11.96H5.02C3 12 2 11 2 8.92999V5.01001C2 3.00001 3 2 5.02 2Z" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M9.00995 5.84985H4.94995" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M6.96997 5.16992V5.84991" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M7.98994 5.83984C7.98994 7.58984 6.61994 9.00983 4.93994 9.00983" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M9.0099 9.01001C8.2799 9.01001 7.61991 8.62 7.15991 8" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M2 15C2 18.87 5.13 22 9 22L7.95 20.25" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M22 9C22 5.13 18.87 2 15 2L16.05 3.75" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</div>
							<div class="language_selected">
								<p>English</p>
							</div>
							<div class="vg_ic">
								<svg viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000" stroke-width="0.528" transform="matrix(1, 0, 0, 1, 0, 0)">
									<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
									<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.048"></g>
									<g id="SVGRepo_iconCarrier">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M12.7071 14.7071C12.3166 15.0976 11.6834 15.0976 11.2929 14.7071L6.29289 9.70711C5.90237 9.31658 5.90237 8.68342 6.29289 8.29289C6.68342 7.90237 7.31658 7.90237 7.70711 8.29289L12 12.5858L16.2929 8.29289C16.6834 7.90237 17.3166 7.90237 17.7071 8.29289C18.0976 8.68342 18.0976 9.31658 17.7071 9.70711L12.7071 14.7071Z" fill="#ffffff"></path>
									</g>
								</svg>
							</div>
						</div>
					</div>
				</div>
				<div class="LG_body">
					<div class="up">
						<div class="LG_tell_text">
							<div class="skeleton-loader bar blinkanime"></div>
							<div class="skeleton-loader bar blinkanime"></div>
							<div class="skeleton-loader bar blinkanime"></div>
							<div class="skeleton-loader bar blinkanime"></div>
							<p class="content_show">
								Riding the tides of <emp class="pink">creativity</emp>, channel <emp class="orange">divine inspiration</emp> effortlessly.
							</p>
						</div>
					</div>
					<div class="down">
						<form action="#" method="POST" id="loginForm">
							<div class="Dinputbox input-box">
								<div class="avatar_icon">
									<div class="blinkanime skeleton-loader"></div>
									<div class="content_show mem_ava_icon">
										<!-- Title: “User SVG Vector”
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
											<circle cx="12" cy="6" r="4" />
											<path d="M19.9975 18C20 17.8358 20 17.669 20 17.5C20 15.0147 16.4183 13 12 13C7.58172 13 4 15.0147 4 17.5C4 19.9853 4 22 12 22C14.231 22 15.8398 21.8433 17 21.5634" stroke-linecap="round" />
										</svg>
									</div>
								</div>
								<div class="blinkanime skeleton-loader"></div>
								<input autocomplete="off" class="inputing Dinput content_show" id="displaymail" name="displaymail" placeholder="Displaymail • Email • Mobilenumber" type="text">
							</div>
							<div class="Pinputbox input-box">
								<div class="avatar_icon">
									<div class="blinkanime skeleton-loader"></div>
									<div class="content_show mem_ava_icon">
										<!-- Title: “Lock Password SVG Vector”
												Author: “Solar Icons“— https://www.svgrepo.com/author/Solar%20Icons/
												Source: “svgrepo.com“— https://www.svgrepo.com/
												License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution -->

										<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
										<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M2 16C2 13.1716 2 11.7574 2.87868 10.8787C3.75736 10 5.17157 10 8 10H16C18.8284 10 20.2426 10 21.1213 10.8787C22 11.7574 22 13.1716 22 16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H8C5.17157 22 3.75736 22 2.87868 21.1213C2 20.2426 2 18.8284 2 16Z" />
											<path opacity="0.5" d="M6 10V8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8V10" stroke-linecap="round" />
											<g opacity="0.5">
												<path d="M9 16C9 16.5523 8.55228 17 8 17C7.44772 17 7 16.5523 7 16C7 15.4477 7.44772 15 8 15C8.55228 15 9 15.4477 9 16Z" />
												<path d="M13 16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16C11 15.4477 11.4477 15 12 15C12.5523 15 13 15.4477 13 16Z" />
												<path d="M17 16C17 16.5523 16.5523 17 16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16Z" />
											</g>
										</svg>
									</div>
								</div>
								<div class="blinkanime skeleton-loader"></div>
								<input autocomplete="off" class="inputing Pinput content_show" id="password" name="password" placeholder="Password" type="password" readonly onfocus="this.removeAttribute('readonly');">
								<div class="showPassword">
									<div class="blinkanime skeleton-loader"></div>
									<div class="content_show show_password">
										<!-- Title: “Eye Alt SVG Vector”
												Author: “Dazzle UI“— https://www.svgrepo.com/author/Dazzle%20UI/
												Source: “svgrepo.com“— https://www.svgrepo.com/
												License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution -->

										<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
										<svg class="open_eye" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M3 14C3 9.02944 7.02944 5 12 5C16.9706 5 21 9.02944 21 14M17 14C17 16.7614 14.7614 19 12 19C9.23858 19 7 16.7614 7 14C7 11.2386 9.23858 9 12 9C14.7614 9 17 11.2386 17 14Z" stroke-linecap="round" stroke-linejoin="round" />
										</svg>

										<!-- Title: “Eye Alt SVG Vector”
												Author: “Dazzle UI“— https://www.svgrepo.com/author/Dazzle%20UI/
												Source: “svgrepo.com“— https://www.svgrepo.com/
												License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution -->

										<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
										<svg class="close_eye nactive" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M9.60997 9.60714C8.05503 10.4549 7 12.1043 7 14C7 16.7614 9.23858 19 12 19C13.8966 19 15.5466 17.944 16.3941 16.3878M21 14C21 9.02944 16.9706 5 12 5C11.5582 5 11.1238 5.03184 10.699 5.09334M3 14C3 11.0069 4.46104 8.35513 6.70883 6.71886M3 3L21 21" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
									</div>
								</div>
							</div>
							<div class="submit-btn input-box">
								<div class="blinkanime skeleton-loader"></div>
								<button class="content_show" type="submit">
									<div class="typing_anime">
										<div class="dots dot1"></div>
										<div class="dots dot2"></div>
										<div class="dots dot3"></div>
									</div>
									<p class="submit_btn_text">Log in</p>
								</button>
							</div>
						</form>
						<div class="forgot_pswd">
							<div class="skeleton-loader blinkanime"></div>
							<div class="forgotPassword_box content_show" id="link-page" data-url="../resizing-objects/long_pressing.html">
								<div class="FPB_icon">
									<!-- Title: “Question Mark SVG Vector”
													Author: “radix-ui“— https://www.svgrepo.com/author/radix-ui/
													Source: “svgrepo.com“— https://www.svgrepo.com/
													License: “MIT License”— https://www.svgrepo.com/page/licensing#MIT -->
									<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
									<svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
										<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
										<g id="SVGRepo_iconCarrier">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M5.07505 4.10001C5.07505 2.91103 6.25727 1.92502 7.50005 1.92502C8.74283 1.92502 9.92505 2.91103 9.92505 4.10001C9.92505 5.19861 9.36782 5.71436 8.61854 6.37884L8.58757 6.4063C7.84481 7.06467 6.92505 7.87995 6.92505 9.5C6.92505 9.81757 7.18248 10.075 7.50005 10.075C7.81761 10.075 8.07505 9.81757 8.07505 9.5C8.07505 8.41517 8.62945 7.90623 9.38156 7.23925L9.40238 7.22079C10.1496 6.55829 11.075 5.73775 11.075 4.10001C11.075 2.12757 9.21869 0.775024 7.50005 0.775024C5.7814 0.775024 3.92505 2.12757 3.92505 4.10001C3.92505 4.41758 4.18249 4.67501 4.50005 4.67501C4.81761 4.67501 5.07505 4.41758 5.07505 4.10001ZM7.50005 13.3575C7.9833 13.3575 8.37505 12.9657 8.37505 12.4825C8.37505 11.9992 7.9833 11.6075 7.50005 11.6075C7.0168 11.6075 6.62505 11.9992 6.62505 12.4825C6.62505 12.9657 7.0168 13.3575 7.50005 13.3575Z" fill="lightgrey"></path>
										</g>
									</svg>
								</div>
								<div class="FPB_text">
									<p>Forgot password</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="LG_foot">
					<div class="or_option">
						<div class="blinkanime skeleton-loader lin_1"></div>
						<div class="content_show line"></div>
						<div class="blinkanime skeleton-loader or_text"></div>
						<div class="content_show text_or">OR</div>
						<div class="blinkanime skeleton-loader lin_2"></div>
						<div class="content_show line"></div>
					</div>

					<!-- create account -->
					<div class="create-acc">
						<div class="CA_btn">
							<div class="blinkanime skeleton-loader CABtn"></div>
							<a href="signup.php">
								<button class="content_show" id="link-page" data-url="signup.php">
									<p>Create account</p>
								</button>
							</a>
						</div>
					</div>

					<div class="social_handle_webApp_links">
						<div class="SHWL_left">
							<ul>
								<li>
									<div class="blinkanime skeleton-loader"></div>
									<div class="content_show svg_icon instagram">
										<!-- Title: “Instagram SVG Vector”
													Author: “Iconsax“— https://www.svgrepo.com/author/Iconsax/
													Source: “svgrepo.com“— https://www.svgrepo.com/
													License: “MIT License”— https://www.svgrepo.com/page/licensing#MIT -->
										<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
										<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke-linecap="round" stroke-linejoin="round" />
											<path d="M12 15.5C13.933 15.5 15.5 13.933 15.5 12C15.5 10.067 13.933 8.5 12 8.5C10.067 8.5 8.5 10.067 8.5 12C8.5 13.933 10.067 15.5 12 15.5Z" stroke-linecap="round" stroke-linejoin="round" />
											<path d="M17.6361 7H17.6477" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
									</div>
								</li>
								<li>
									<div class="blinkanime skeleton-loader"></div>
									<div class="content_show svg_icon facebook">
										<!-- Title: “Facebook SVG Vector”
													Author: “iconoir“— https://www.svgrepo.com/author/iconoir/
													Source: “svgrepo.com“— https://www.svgrepo.com/
													License: “MIT License”— https://www.svgrepo.com/page/licensing#MIT -->
										<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
										<svg viewBox="0 0 24 24" fill="#FFF" xmlns="http://www.w3.org/2000/svg">
											<path d="M17 2H14C12.6739 2 11.4021 2.52678 10.4645 3.46447C9.52678 4.40215 9 5.67392 9 7V10H6V14H9V22H13V14H16L17 10H13V7C13 6.73478 13.1054 6.48043 13.2929 6.29289C13.4804 6.10536 13.7348 6 14 6H17V2Z" stroke="#FFFFFF" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
									</div>
								</li>
								<li>
									<div class="blinkanime skeleton-loader"></div>
									<div class="content_show svg_icon x_corp">
										<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 50 50">
											<path d="M 5.9199219 6 L 20.582031 27.375 L 6.2304688 44 L 9.4101562 44 L 21.986328 29.421875 L 31.986328 44 L 44 44 L 28.681641 21.669922 L 42.199219 6 L 39.029297 6 L 27.275391 19.617188 L 17.933594 6 L 5.9199219 6 z M 9.7167969 8 L 16.880859 8 L 40.203125 42 L 33.039062 42 L 9.7167969 8 z">
											</path>
										</svg>
									</div>
								</li>
								<li>
									<div class="blinkanime skeleton-loader"></div>
									<div class="content_show svg_icon linkdin">
										<!-- Title: “Linkedin SVG Vector”
													Author: “Remix Design“— https://www.svgrepo.com/author/Remix%20Design/
													Source: “svgrepo.com“— https://www.svgrepo.com/
													License: “Apache License”— https://www.svgrepo.com/page/licensing/#Apache -->
										<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
										<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
											<g>
												<path d="M12 9.55C12.917 8.613 14.111 8 15.5 8a5.5 5.5 0 0 1 5.5 5.5V21h-2v-7.5a3.5 3.5 0 0 0-7 0V21h-2V8.5h2v1.05zM5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm-1 2h2V21H4V8.5z" />
											</g>
										</svg>
									</div>
								</li>
								<li>
									<div class="blinkanime skeleton-loader"></div>
									<div class="content_show svg_icon reddit">
										<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 50 50">
											<path d="M 29 3 C 28.0625 3 27.164063 3.382813 26.5 4 C 25.835938 4.617188 25.363281 5.433594 25 6.40625 C 24.355469 8.140625 24.085938 10.394531 24.03125 13.03125 C 19.234375 13.179688 14.820313 14.421875 11.28125 16.46875 C 10.214844 15.46875 8.855469 14.96875 7.5 14.96875 C 6.089844 14.96875 4.675781 15.511719 3.59375 16.59375 C 1.425781 18.761719 1.425781 22.238281 3.59375 24.40625 L 3.84375 24.65625 C 3.3125 26.035156 3 27.488281 3 29 C 3 33.527344 5.566406 37.585938 9.5625 40.4375 C 13.558594 43.289063 19.007813 45 25 45 C 30.992188 45 36.441406 43.289063 40.4375 40.4375 C 44.433594 37.585938 47 33.527344 47 29 C 47 27.488281 46.6875 26.035156 46.15625 24.65625 L 46.40625 24.40625 C 48.574219 22.238281 48.574219 18.761719 46.40625 16.59375 C 45.324219 15.511719 43.910156 14.96875 42.5 14.96875 C 41.144531 14.96875 39.785156 15.46875 38.71875 16.46875 C 35.195313 14.433594 30.800781 13.191406 26.03125 13.03125 C 26.09375 10.546875 26.363281 8.46875 26.875 7.09375 C 27.164063 6.316406 27.527344 5.757813 27.875 5.4375 C 28.222656 5.117188 28.539063 5 29 5 C 29.460938 5 29.683594 5.125 30.03125 5.40625 C 30.378906 5.6875 30.785156 6.148438 31.3125 6.6875 C 32.253906 7.652344 33.695313 8.714844 36.09375 8.9375 C 36.539063 11.238281 38.574219 13 41 13 C 43.75 13 46 10.75 46 8 C 46 5.25 43.75 3 41 3 C 38.605469 3 36.574219 4.710938 36.09375 6.96875 C 34.3125 6.796875 33.527344 6.109375 32.75 5.3125 C 32.300781 4.851563 31.886719 4.3125 31.3125 3.84375 C 30.738281 3.375 29.9375 3 29 3 Z M 41 5 C 42.667969 5 44 6.332031 44 8 C 44 9.667969 42.667969 11 41 11 C 39.332031 11 38 9.667969 38 8 C 38 6.332031 39.332031 5 41 5 Z M 25 15 C 30.609375 15 35.675781 16.613281 39.28125 19.1875 C 42.886719 21.761719 45 25.226563 45 29 C 45 32.773438 42.886719 36.238281 39.28125 38.8125 C 35.675781 41.386719 30.609375 43 25 43 C 19.390625 43 14.324219 41.386719 10.71875 38.8125 C 7.113281 36.238281 5 32.773438 5 29 C 5 25.226563 7.113281 21.761719 10.71875 19.1875 C 14.324219 16.613281 19.390625 15 25 15 Z M 7.5 16.9375 C 8.203125 16.9375 8.914063 17.148438 9.53125 17.59375 C 7.527344 19.03125 5.886719 20.769531 4.75 22.71875 C 3.582031 21.296875 3.660156 19.339844 5 18 C 5.714844 17.285156 6.609375 16.9375 7.5 16.9375 Z M 42.5 16.9375 C 43.390625 16.9375 44.285156 17.285156 45 18 C 46.339844 19.339844 46.417969 21.296875 45.25 22.71875 C 44.113281 20.769531 42.472656 19.03125 40.46875 17.59375 C 41.085938 17.148438 41.796875 16.9375 42.5 16.9375 Z M 17 22 C 14.800781 22 13 23.800781 13 26 C 13 28.199219 14.800781 30 17 30 C 19.199219 30 21 28.199219 21 26 C 21 23.800781 19.199219 22 17 22 Z M 33 22 C 30.800781 22 29 23.800781 29 26 C 29 28.199219 30.800781 30 33 30 C 35.199219 30 37 28.199219 37 26 C 37 23.800781 35.199219 22 33 22 Z M 17 24 C 18.117188 24 19 24.882813 19 26 C 19 27.117188 18.117188 28 17 28 C 15.882813 28 15 27.117188 15 26 C 15 24.882813 15.882813 24 17 24 Z M 33 24 C 34.117188 24 35 24.882813 35 26 C 35 27.117188 34.117188 28 33 28 C 31.882813 28 31 27.117188 31 26 C 31 24.882813 31.882813 24 33 24 Z M 34.15625 33.84375 C 34.101563 33.851563 34.050781 33.859375 34 33.875 C 33.683594 33.9375 33.417969 34.144531 33.28125 34.4375 C 33.28125 34.4375 32.757813 35.164063 31.4375 36 C 30.117188 36.835938 28.058594 37.6875 25 37.6875 C 21.941406 37.6875 19.882813 36.835938 18.5625 36 C 17.242188 35.164063 16.71875 34.4375 16.71875 34.4375 C 16.492188 34.082031 16.066406 33.90625 15.65625 34 C 15.332031 34.082031 15.070313 34.316406 14.957031 34.632813 C 14.84375 34.945313 14.894531 35.292969 15.09375 35.5625 C 15.09375 35.5625 15.863281 36.671875 17.46875 37.6875 C 19.074219 38.703125 21.558594 39.6875 25 39.6875 C 28.441406 39.6875 30.925781 38.703125 32.53125 37.6875 C 34.136719 36.671875 34.90625 35.5625 34.90625 35.5625 C 35.207031 35.273438 35.296875 34.824219 35.128906 34.441406 C 34.960938 34.058594 34.574219 33.820313 34.15625 33.84375 Z"></path>
										</svg>
									</div>
								</li>
							</ul>
						</div>
						<div class="SHWL_right">
							<ul>
								<div class="blinkanime skeleton-loader cT-foot"></div>
								<h3 class="content_show column_title">Tutorial</h3>
								<div class="blinkanime skeleton-loader"></div>
								<li class="content_show">
									<p>Card making</p>
								</li>
								<div class="blinkanime skeleton-loader"></div>
								<li class="content_show">
									<p>Event planning</p>
								</li>
								<div class="blinkanime skeleton-loader"></div>
								<li class="content_show">
									<p>Slideshow Design</p>
								</li>
								<div class="blinkanime skeleton-loader"></div>
								<li class="content_show">
									<p>AI generated filters</p>
								</li>
							</ul>
							<ul>
								<div class="blinkanime skeleton-loader cT-foot"></div>
								<h3 class="content_show column_title">Company</h3>
								<div class="blinkanime skeleton-loader"></div>
								<li class="content_show">
									<p>About Us</p>
								</li>
								<div class="blinkanime skeleton-loader"></div>
								<li class="content_show">
									<p>Contact</p>
								</li>
								<div class="blinkanime skeleton-loader"></div>
								<li class="content_show">
									<p>News & Updates</p>
								</li>
							</ul>
							<ul>
								<div class="blinkanime skeleton-loader cT-foot"></div>
								<h3 class="content_show column_title">Policies & Terms</h3>
								<div class="blinkanime skeleton-loader"></div>
								<li class="content_show">
									<p>Privacy policy</p>
								</li>
								<div class="blinkanime skeleton-loader"></div>
								<li class="content_show">
									<p>Content policy</p>
								</li>
								<div class="blinkanime skeleton-loader"></div>
								<li class="content_show">
									<p>Terms & Conditions</p>
								</li>
								<div class="blinkanime skeleton-loader"></div>
								<li class="content_show">
									<p>Difference Engine</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<?php include("../includes/country_lang_model.php"); ?>
	<script blob-minify="yes" src="../assets/js/auths.js" type="module"></script>
	<script blob-minify="yes" src="../assets/js/country_language_modal.js" type="module"></script>
	<!-- <script blob-minify="yes" src="../assets/js/slide.js" type="module"></script> -->
	<script>
		/*alert("JESUS IS LORD FOREVER");*/
		(async function() {
			document.addEventListener('DOMContentLoaded', async function() {
				const stopReanime = document.querySelectorAll('.skeleton-loader');
				const atOnceContentShow = document.querySelectorAll('.content_show');
				await stopReanime.forEach(stopRE => {
					stopRE.style.display = 'none';
				});
				await atOnceContentShow.forEach(aOCS => {
					aOCS.style.display = 'flex';
					aOCS.classList.add('show');
					aOCS.classList.add('content_show_come_back');
				});
				var contentContainer = document.getElementById('contentContainer');
				var contentToShow = contentContainer.querySelectorAll('.content_show');

				contentToShow.forEach(function(content) {
					/* Find all corresponding skeleton loaders within the same parent*/

					var skeletonLoaders = content.parentElement.querySelectorAll('.skeleton-loader');

					/* Hide content initially */
					content.style.display = 'none';
					content.classList.remove('show');

					/* Show all skeleton loaders */
					skeletonLoaders.forEach(function(skeletonLoader) {
						if (skeletonLoader) {
							skeletonLoader.style.display = 'block';
						}
					});


					requestAnimationFrame(function() {
						setTimeout(function() {
							skeletonLoaders.forEach(function(skeletonLoader) {
								if (skeletonLoader) {
									skeletonLoader.style.display = 'none';
								}
							});


							content.style.display = 'flex';
							content.classList.add('show');
						}, 3000);
					});
				});

				const inputbox = document.querySelectorAll('.inputing');
				const Dinput = document.querySelector('.Dinput');
				const Pinput = document.querySelector('.Pinput');
				const Dinputbox = document.querySelector('.Dinputbox');
				const Pinputbox = document.querySelector('.Pinputbox');
				const submitBtn = document.querySelector('.submit-btn');
				const submitGO = document.querySelector('.submit-btn button');
				const typinganime = document.querySelector('.typing_anime');
				const submitBtnText = document.querySelector('.submit_btn_text');


				window.addEventListener('load', function() {
					if (Dinput) {
						Dinput.value = '';
					} else if (Pinput) {
						Pinput.value = '';
					}
				});

				const eyeOpen = document.querySelector('.open_eye');
				const eyeClose = document.querySelector('.close_eye');

				eyeOpen.addEventListener('click', () => {
					if (Pinput.type === "password") {
						Pinput.type = "text";
						eyeOpen.classList.add('nactive');
						eyeClose.classList.remove('nactive');
					}
				});
				eyeClose.addEventListener('click', () => {
					if (Pinput.type === "text") {
						Pinput.type = "password";
						eyeOpen.classList.remove('nactive');
						eyeClose.classList.add('nactive');
					}
				});

				let typingTimeOut;

				inputbox.forEach(inputen => {
					inputen.addEventListener('keyup', function() {
						/*alert("JESUS IS LORD FOREVER");*/
						typinganime.classList.add('active');
						submitBtnText.classList.add('remove');

						clearTimeout(typingTimeOut);

						typingTimeOut = setTimeout(function() {
							typinganime.classList.remove('active');
							submitBtnText.classList.remove('remove');
						}, 1000)
					});
				});

				Pinputbox.classList.add('not-active');
				submitGO.disabled = true;
				submitBtn.classList.add('no-login');

				Dinput.addEventListener('keyup', function(e) {
					var val = e.target.value;
					if (val.length > 0) {
						/*alert("JESUS IS LORD FOREVER");*/
						Pinputbox.classList.remove('not-active');
						Pinputbox.classList.add('added');
						Pinputbox.classList.remove('removed');
						submitBtn.classList.add('move');
					} else {
						Pinputbox.classList.add('not-active');
						Pinputbox.classList.remove('added');
						Pinputbox.classList.add('removed');
						submitBtn.classList.remove('move');
					}
				});

				window.addEventListener('keyup', function(event) {
					var Dval = Dinput.value;
					var Pval = Pinput.value;
					if (Dval == "" || Pval == "" || Pval.length < 8) {
						submitBtn.classList.add('no-login');
						submitGO.disabled = true;
					} else {
						submitBtn.classList.remove('no-login');
						submitGO.disabled = false;
					}
				});




				document.getElementById("loginForm").addEventListener('keyup', function(e) {
					if (e.keyCode === 13 || e.key === 'ENTER') {
						e.preventDefault();

						var focusedElement = document.activeElement;

						if (focusedElement.tagName === 'INPUT') {
							var nextDiv = focusedElement.parentElement.nextElementSibling;

							if (nextDiv && nextDiv.querySelector('input')) {
								nextDiv.querySelector('input').focus();
							} else if (focusedElement.tagName === 'BUTTON') {
								document.getElementById('loginForm').submit();
								alert("JESUS IS LORD FOREVER");
							}
						}
					}
				});

				submitGO.addEventListener('click', function() {
					document.getElementById('loginForm').submit();
				});


				let slideIndex = 0;

				function showSlides() {
					let i;
					let slides = document.getElementsByClassName("slide_show");
					for (i = 0; i < slides.length; i++) {
						slides[i].style.display = "none";
					}
					slideIndex++;
					if (slideIndex > slides.length) {
						slideIndex = 1;
					}
					slides[slideIndex - 1].style.display = "block";

					setTimeout(showSlides, 5000);

					// console.log("HALLELUJAH");
				}

				new Function(showSlides());
			});
		})();
	</script>
	<script>
		if ('serviceWorker' in navigator) {
			window.addEventListener('DOMContentLoaded', () => {
				navigator.serviceWorker.register('../assets/js/serviceworker.js')
					.then(registration => {
						console.log('Service Worker registered with scope:', registration.scope);
					})
					.catch(error => {
						alert('Service Worker registration failed:', error);
					});
			});
		} else {
			// alert("JESUS REMAINS LORD OVER US ALL FOREVER!");
		}

		const button = document.querySelector('.LG_head .right .LG_right_icon');

		button.addEventListener("click", function() {
			// alert("Button clicked"); // Check if the button click event is triggered

			if ('Notification' in window) {
				console.log("Notification API is supported"); // Check if Notification API is supported
				Notification.requestPermission().then(permission => {
					if (permission === 'granted') {
						console.log("Permission granted"); // Check if permission is granted
						// User granted permission, you can now subscribe them to push notifications
						subscribeUserToPush();
						new Notification("Hello, world!");
					} else {
						console.log("Permission denied or prompt closed"); // Check if permission is denied or prompt closed
						// User denied permission or closed the permission prompt
						// Handle this according to your app's logic
						// alert("Permission denied or prompt closed");
					}
				});
			} else {
				console.log("Notification API is not supported"); // Check if Notification API is not supported
				alert("Notification API is not supported");
			}
		});


		// Function to subscribe the user to push notifications
		function subscribeUserToPush() {
			// Add your code to subscribe the user to push notifications here
		}
	</script>
	<!-- <load rel="emerlad"></load> -->
	<!-- <script src="../assets/js/nav.js"></script> -->
	<script src="../assets/js/nav.js"></script>
	<!-- <script blob-minify="yes" src="../assets/js/route.js" type="module"></script> -->
	<!-- <script src="../assets/js/1.js"></script> -->
	<!-- <script src="../assets/js/jquery.js"></script> -->
</body>

</html>
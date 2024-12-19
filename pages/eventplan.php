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
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Cardo:wght@400;700&family=Jost&family=Poppins:wght@400;500;600;900&display=swap" rel="stylesheet">
      <script src = "../assets/js/jquery.min.js"></script>
      <title>Event|Plan</title>
</head>
<body>
     <div class="container_wrapper">
				<div class="container_header">
					<div class="left">
						<div class="logo">
							<img src="../assets/img/logo/GODISGOOD.png" alt="web_app_icon">
						</div>
					</div>
					<div class="right">
						<div class="icon">
							<div class="noti">
								<div class="CH_right_icon">
									<!-- Title: “Bell SVG Vector”
									Author: “Solar Icons“— https://www.svgrepo.com/author/Solar%20Icons/
									Source: “svgrepo.com“— https://www.svgrepo.com/
									License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution -->
								
									<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M9.10745 2.67414C9.98414 2.24187 10.9649 2 12 2C15.7274 2 18.7491 5.13623 18.7491 9.00497V9.70957C18.7491 10.5552 18.9903 11.3818 19.4422 12.0854L20.5496 13.8095C21.5612 15.3843 20.789 17.5249 19.0296 18.0229C14.4273 19.3257 9.57274 19.3257 4.97036 18.0229C3.21105 17.5249 2.43882 15.3843 3.45036 13.8095L4.5578 12.0854C5.00972 11.3818 5.25087 10.5552 5.25087 9.70957V9.00497C5.25087 7.93058 5.48391 6.91269 5.90039 6.00277" stroke-linecap="round"/>
									<path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C12.2445 22 12.4847 21.9827 12.7192 21.9492M16.5 19C16.2329 19.7126 15.781 20.3428 15.1985 20.8393" stroke-linecap="round"/>
									</svg>
								</div>
								<div class="noti_count">
									<p>888+</p>
								</div>
							</div>
							<div class="noti">
								<div class="CH_right_icon">
									<!-- Title: “Menu Dots SVG Vector”
									Author: “Solar Icons“— https://www.svgrepo.com/author/Solar%20Icons/
									Source: “svgrepo.com“— https://www.svgrepo.com/
									License: “CC Attribution License”— https://www.svgrepo.com/page/licensing#CC%20Attribution -->
								
									<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5 14C6.10457 14 7 13.1046 7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12" stroke-linecap="round"/>
									<circle cx="12" cy="12" r="2" />
									<path d="M21 12C21 13.1046 20.1046 14 19 14C17.8954 14 17 13.1046 17 12C17 10.8954 17.8954 10 19 10" stroke-linecap="round"/>
									</svg>
							  </div>
							 <div class="noti_count">
									<p>8+</p>
							 </div>
						  </div>
						</div>
					</div>
				</div>
				<div class="container_body">
					<div class="content">
						<p style="letter-spacing: 3px;line-height: 3;padding: 10px 20px;">
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
						GOD is good; GOD is faithful.&emsp;&emsp;
					</p>
					</div>
				</div>
     </div>
		 <script src="../assets/js/page_link_route.js"></script>
		 <script>
		 </script>
</body>
</html>
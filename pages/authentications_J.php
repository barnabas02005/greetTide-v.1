<!-- JESUS IS LORD -->
<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">
	<link rel="stylesheet" href="../assets/css/reset.css">
	<link rel="stylesheet" href="../assets/css/splash.css">
	<link rel="stylesheet" href="../assets/css/loader.css">

	<!-- theme -->
	<//?php if($memdata['theme'] == 0) {
	?>
	<!-- <link rel="stylesheet" href="../assets/css/theme/light.css"> -->
	<//?php	
	}else if($memdata['theme'] == 1) {
	?>
	<!-- <link rel="stylesheet" href="../assets/css/theme/dark.css"> -->
	<//?php
	}
	?>
	<title>Hi | GreetTide</title>
	<script src = "../assets/js/jquery.min.js"></script>
	<script src="../assets/js/cache.js"></script>
	<script src="../assets/js/splash.js"></script>

	<style>
		.app_body {
			height: 100vh;
			width: 100%;
			overflow: hidden;
			position: relative;
		}

		iframe
		{
			height: 100%;
			width: 100%;
			overflow: hidden;
			position: relative;
		}

		iframe::-webkit-scrollbar
		{
			display: none;
		}

		.app_body::-webkit-scrollbar
		{
			display: none;
		}
	</style>
</head>

<body class="app_body">
	<?php include("../includes/splash.php"); ?>
  <iframe class="theIframe" id="content-iframe" title="main_view"></iframe>
	
<script>
	document.addEventListener('DOMContentLoaded', function () {
		sessionStorage.setItem('loginloadanime', 0);
    const pageLinks = document.querySelectorAll('.page-link');
    const iframe = document.getElementById('content-iframe');
    const Iframe = document.querySelector('.theIframe');
    
    // Load currentPage every time the page is reloaded
    let currentPage = sessionStorage.getItem('currentPage');
    sessionStorage.setItem('currentPage', currentPage);

		if(currentPage === null || currentPage === '')
		{
			 sessionStorage.setItem('currentPage', 'signin.php');
		}
    
    // Initialize history array in session storage if not already initialized
    let history = JSON.parse(sessionStorage.getItem('history')) || [];
    
    // Define loadPageInIframe function in the parent window's scope
    window.loadPageInIframe = function (destination, isFullscreen) {
        iframe.src = destination;
        
        // Update 'active' class for the corresponding link
        pageLinks.forEach(link => {
            const linkDestination = link.getAttribute('page-name');
            link.classList.remove('active');
            if (linkDestination === destination) {
                link.classList.add('active');
            }
        });
        
        // go_event.classList.remove('show');
        Iframe.classList.remove('pane-opened');
        
        if (isFullscreen) {
            iframe.classList.add('fullscreen');
        } else {
            iframe.classList.remove('fullscreen');
        }
    };
    
    // Function to handle link clicks
    function handleLinkClick() {
        const destination = this.getAttribute('page-name');
        const isFullscreen = this.getAttribute('data-fullscreen') === 'true';
        
        // Store previous page in sessionStorage
        const previousPage = sessionStorage.getItem('currentPage');
        sessionStorage.setItem('previousPage', previousPage);
        
        // Update current page in sessionStorage
        sessionStorage.setItem('currentPage', destination);
        currentPage = destination;
        
        // Add current page to history
        history.push(currentPage);
        sessionStorage.setItem('history', JSON.stringify(history));
        
        // Load the clicked page into the iframe
        loadPageInIframe(destination, isFullscreen);
    }
    
    // Add event listener for page link clicks
    pageLinks.forEach(link => {
        link.addEventListener('click', handleLinkClick);
    });
    
    // Function to handle page change based on current URL pathname
    function handlePageChange() {
        const currentPathname = window.location.pathname;
        pageLinks.forEach(link => {
            const linkDestination = link.getAttribute('page-name');
            link.classList.remove('active');
            if (currentPathname === linkDestination) {
                link.classList.add('active');
            }
        });
    }
    
    // Add event listener for beforeunload event to update sessionStorage
    window.addEventListener('beforeunload', function () {
			
			loadPageInIframe("JESUS LOVE ME AND US ALL", isFullscreen);
			alert("JESUS IS LORD");
        const previousPage = sessionStorage.getItem('previousPage');
        sessionStorage.setItem('currentPage', previousPage);
        handlePageChange();
    });
    
    // Add event listener for popstate event to handle browser back/forward buttons
    window.addEventListener('popstate', function (event) {
        if (event.state) {
					alert("JESUS IS LORD FOREVER");
            // const previousPage = sessionStorage.getItem('previousPage');
            // sessionStorage.setItem('currentPage', event.state.page);
            // loadPageInIframe(event.state.page, false);
            // currentPage = event.state.page;
            // handlePageChange();
        }
    });
    
    // Initial page loading
    handlePageChange();
    loadPageInIframe(currentPage, false);
    
    // Start tracking page changes on page load
    window.onload = function () {
        sessionStorage.setItem('history', JSON.stringify([currentPage])); // Start tracking from current page
    };
});

	</script>
</body>
</html>

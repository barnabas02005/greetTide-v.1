<script>
	document.addEventListener('DOMContentLoaded', function () {
			const pageLinks = document.querySelectorAll('.page-link');
			const iframe = document.getElementById('content-iframe');
			const go_event = document.querySelector('.go_app_event');
			const Iframe = document.querySelector('.theIframe');
			let currentPage = sessionStorage.getItem('currentPage') || 'home.php'; // Set default page to home.php if currentPage doesn't exist

			// Attach the function to the window object
			window.loadPageInIframe = function (destination, isFullscreen) {
					const iframe = window.frames['content-iframe'];

					if (iframe) {
							iframe.src = destination;
							console.log("Function is available:", window.loadPageInIframe);

							// Update 'active' class for the corresponding link
							pageLinks.forEach(link => {
									const linkDestination = link.getAttribute('page-name');
									link.classList.remove('active');
									if (linkDestination === destination) {
											link.classList.add('active');
									}
							});
					} else {
							console.error("Iframe element not found in the window frames");
					}
			};

			function loadPage(destination, isFullscreen) {
					const iframe = window.frames['content-iframe'];

					if (iframe) {
							window.loadPageInIframe(destination, isFullscreen);
					} else {
							console.error("Iframe element not found in the window frames");
					}


					go_event.classList.remove('show');
					Iframe.classList.remove('pane-opened');

					if (isFullscreen) {
							iframe.classList.add('fullscreen');
					} else {
							iframe.classList.remove('fullscreen');
					}
			}

			function handleLinkClick() {
					const destination = this.getAttribute('page-name');
					const isFullscreen = this.getAttribute('data-fullscreen') === 'true';
					sessionStorage.setItem('previousPage', currentPage);
					sessionStorage.setItem('currentPage', destination);
					currentPage = destination;
					pageLinks.forEach(link => {
							const linkDestination = link.getAttribute('page-name');
							link.classList.remove('active');
							if (linkDestination === destination) {
									link.classList.add('active');
							}
					});
					loadPage(destination, isFullscreen);
			}

			pageLinks.forEach(link => {
					link.addEventListener('click', handleLinkClick);
			});

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

			window.addEventListener('beforeunload', function ()
			{
					const previousPage = sessionStorage.getItem('previousPage');
					sessionStorage.setItem('currentPage', previousPage);
					handlePageChange();
			});

			window.addEventListener('popstate', function (event) {
					if (event.state) {
							const previousPage = sessionStorage.getItem('previousPage');
							sessionStorage.setItem('currentPage', event.state.page);
							loadPage(event.state.page, false);
							currentPage = event.state.page;
							handlePageChange();
					}
			});

			handlePageChange();

			if (currentPage) {
					const isFullscreen = document.querySelector(`[page-name="${currentPage}"]`).getAttribute('data-fullscreen') === 'true';
					pageLinks.forEach(link => {
							const linkDestination = link.getAttribute('page-name');
							link.classList.remove('active');
							if (linkDestination === currentPage) {
									link.classList.add('active');
							}
					});
					loadPage(currentPage, isFullscreen);
			}
	});

	// Disable pull-to-refresh
	document.body.addEventListener('touchmove', function (e) {
			if (e.touches.length > 1) {
					e.preventDefault();
			}
	}, { passive: false });

	// Disable pull-to-refresh
	document.body.addEventListener('touchmove', function (e) {
			if (e.touches.length > 1) {
					e.preventDefault();
			}
	}, { passive: false });



	// $(document).on('ready', function () {
	// 			setTimeout(function () {
	// 						$('.splash_screen').fadeOut(4000);
	// 			}, 50000);
	// });


	$(".page-link").each(function() {
		if (this.href == window.location) {
			$(this).addClass("active");
		};
	});

</script>
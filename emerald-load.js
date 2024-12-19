console.info("JESUS IS LORD FOREVER!");

// Maintain a history of visited pages
(function() {
    // Check if emerald.js is loaded by searching for a unique identifier
    var scriptTags = document.getElementsByTagName('script');
    var isEmeraldLoaded = false;

    for (var i = 0; i < scriptTags.length; i++) {
        var src = scriptTags[i].getAttribute('src');
        if (src && src.includes('emerald-load.js')) {
            isEmeraldLoaded = true;
            break;
        }
    }

    // If emerald.js is not loaded, exit the function
    if (!isEmeraldLoaded) {
        alert("JESUS IS LORD FOREVER");
        return;
    }

		// Your existing code for emerald.js goes here
		var visitedPages = [];
		window.addEventListener('load', function() {
			const currentPageName = window.location.pathname;
			const filename = currentPageName.split('/').pop();
			const currentUrl = window.location.href;
			addVisitedPage(filename, currentUrl);

			console.log(window.location.protocol);
		});

// Load visitedPages array from session storage if available
var visitedPages = JSON.parse(sessionStorage.getItem('visitedPages')) || [];

    // Your existing code for emerald.js goes here

    // Load visitedPages array from session storage if available
    var visitedPages = JSON.parse(sessionStorage.getItem('visitedPages')) || [];

    // Function to add a visited page to the array and session storage
    function addVisitedPage(pageName, newUrl) {
        // Check if the page already exists in the array
        const existingPageIndex = visitedPages.findIndex(page => page.url === newUrl || page.path === pageName);

        // If the page already exists, remove it from its current position
        if (existingPageIndex !== -1) {
            visitedPages.splice(existingPageIndex, 1);
        }

        // Add the page to the end of the array
        visitedPages.push({ path: pageName, url: newUrl });

        // Store the updated array in session storage
        sessionStorage.setItem('visitedPages', JSON.stringify(visitedPages));
    }

    // Function to fetch and replace page content
    function fetchAndReplacePage(pageName, newUrl, side) {
        fetch(pageName)
            .then(response => response.text())
            .then(htmlContent => {
                // Clear the current document
                document.open(); 
                // Write the new document's HTML to the current document
                document.write(htmlContent);
                document.close();

                // Update the URL
                if (!newUrl.startsWith(window.location.origin)) {
                    newUrl = window.location.origin + newUrl; // Append origin if missing
                }
                window.history.pushState({}, '', newUrl);

                // Add the visited page to the array and session storage
                addVisitedPage(pageName, newUrl);
                console.log("Visited Page fetch:", visitedPages);

                // Reattach event listeners to the new content
                attachEventListeners();
            })
            .catch(error => {
                if (side === 'a') {
                    console.error('Error fetching HTML content:', error);
                }
                console.log("New URL:", newUrl);
                console.log("Visited Page (Error):", visitedPages);
                // Reattach event listeners to handle subsequent navigation
                attachEventListeners();
            });
    }

    // Function to attach event listeners specific to emerald.js
    function attachEventListeners() {
        // Check if emerald should be active on this page
        var body = document.querySelector('body');
        if (body && body.classList.contains('emerald-active')) {
            // Add event listener for navigation links
            var ulisting = document.querySelector('.ulist');
            if (ulisting) {
                ulisting.addEventListener('click', handleNavigation);
            }
        }
    }


// Function to handle navigation based on link type
function handleNavigation(event) {
	if (event.target.classList.contains('link')) {
			event.preventDefault(); // Prevent default link behavior

			const pageName = event.target.getAttribute('page-name');
			// Check if it's an external link
			if (pageName.startsWith('http://') || pageName.startsWith('https://')) {
					// Create a new iframe to load the external page
					const iframe = document.createElement('iframe');
					iframe.style.display = 'none';
					iframe.onload = function() {
							// Optional: Do something after the iframe has loaded
					};
					document.body.appendChild(iframe);
					iframe.src = pageName; // Load the external page
			} else {
					// Construct newUrl dynamically based on current path
					const path = window.location.pathname.replace(/\/[^/]*$/, ''); // Get current path without the last segment
					const newUrl = window.location.origin + path + '/' + pageName;
					// Fetch and replace the content of the page
					fetchAndReplacePage(pageName, newUrl, 'a');
			}
	}
}


// Call attachEventListeners initially to attach event listeners to the initial content
attachEventListeners();



// Handle the popstate event
window.addEventListener('popstate', function(event) {
	if (event.state !== null) {
			// Retrieve the visitedPages array from session storage
			const visitedPages = JSON.parse(sessionStorage.getItem('visitedPages')) || [];
			// Get the URL of the current page
			const currentPageIndex = visitedPages.findIndex(page => page.url === window.location.href);

			console.log(currentPageIndex);

			// If the current page is not found in the visited pages, log an error
			if (currentPageIndex === -1) {
					console.error('Current page not found in visited pages.');
					return;
			}

			// If the current page is not the first page, navigate to the previous page
			if (currentPageIndex >= 1) {
					const previousPage = visitedPages[currentPageIndex - 1]; // Get the previous page
					const previousUrl = previousPage.url;

					// Remove the current page from the array and add it to the beginning
					visitedPages.splice(currentPageIndex, 1)[0]; // Remove current page and get it
					visitedPages.unshift({ path: previousPage.path, url: previousPage.url});
					// Store the updated array in session storage
					sessionStorage.setItem('visitedPages', JSON.stringify(visitedPages));

					// Manipulate the history stack to go back to the previous page
					history.pushState({ page: previousUrl }, '', previousUrl);

					// Fetch and replace the content of the previous page
					fetchAndReplacePage(previousPage.path, previousUrl, 'b');

					console.log("Navigating back to:", previousUrl);
			} else {
					// If we're already at the first page, log a message
					console.log('Already at the first page.');
			}
	} else {
			this.alert("JESUS IS LORD FOREVER");
	}
});

})();
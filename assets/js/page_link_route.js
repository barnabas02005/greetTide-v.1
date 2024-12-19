document.addEventListener('DOMContentLoaded', function () {
    const pageLinks = document.querySelectorAll('.page-link-inside-iframe');

// Function to handle link clicks
function handleLinkClick() {
	const destination = this.getAttribute('page-name');
	const isFullscreen = this.getAttribute('data-fullscreen') === 'true';
	
	// Store previous page in sessionStorage
	const previousPage = sessionStorage.getItem('currentPage');
	sessionStorage.setItem('previousPage', previousPage);
	
	// Update current page in sessionStorage
	sessionStorage.setItem('currentPage', destination);
	
	// Add current page to history in sessionStorage
	const history = JSON.parse(sessionStorage.getItem('history')) || [];
	history.push(destination);
	sessionStorage.setItem('history', JSON.stringify(history));
	
	// Load the clicked page into the iframe
	window.parent.loadPageInIframe(destination, isFullscreen);
}

// Add event listener for page link clicks
pageLinks.forEach(link => {
	link.addEventListener('click', handleLinkClick);
});

// Event listener for iframe onload event
window.parent.document.getElementById('content-iframe').onload = function() {
	// Set the initialPageLoaded flag to true when the initial page is loaded
	initialPageLoaded = true;
};

// Event listener for popstate event
window.parent.addEventListener('popstate', function (event) {
	console.log("Popstate event triggered");
	event.alert("JESUS IS LORD");
	// Get the history from sessionStorage
	const history = JSON.parse(sessionStorage.getItem('history')) || [];
	// Get the initially loaded page
	const initialPage = history[0];
	// Get the current page
	const currentPage = sessionStorage.getItem('currentPage');
	// Check if the current page matches the initially loaded page and the initial page has been loaded
	if (currentPage === initialPage && initialPageLoaded) {
			alert("JESUS IS LORD");
			// Rest of the code
	}
	// Load the clicked page into the iframe
	window.parent.loadPageInIframe("JESUS LOVE ME AND US ALL", isFullscreen);
});


    // Get the src attribute value of the iframe
    const iframeSrc = window.parent.document.getElementById('content-iframe').getAttribute('src');

    // Get the currentPage from sessionStorage
    const currentPage = window.parent.sessionStorage.getItem('currentPage');

    // Compare the iframeSrc with the currentPage
    if (iframeSrc === currentPage) {
        // The page currently displayed in the iframe is the same as the currentPage
        // You can perform actions accordingly
        console.log("The page currently displayed in the iframe is the same as the currentPage");
    } else {
        // The page currently displayed in the iframe is different from the currentPage
        // You can perform actions accordingly
        console.log("The page currently displayed in the iframe is different from the currentPage");
    }
});

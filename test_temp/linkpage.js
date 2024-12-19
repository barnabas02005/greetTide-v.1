// Get references to elements
const navLinks = document.querySelectorAll('nav li');
const contentContainer = document.getElementById('content');

function loadPage(pageName) {
      const allowedExtensions = ['.html', '.php', '.txt']; // Add more extensions as needed
  
      // Check if the provided pageName has an allowed extension
      if (allowedExtensions.some(ext => pageName.endsWith(ext))) {
          fetch(pageName)
              .then(response => response.text())
              .then(data => {
                  contentContainer.innerHTML = data;
              })
              .catch(error => {
                  console.error(`Error loading page: ${error}`);
                  // You can handle errors here (e.g., display an error message).
              });
      } else {
          console.error(`Unsupported file extension: ${pageName}`);
          // Handle unsupported file extensions here (e.g., display an error message).
      }
}

// Event listener for menu clicks
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        const pageName = link.getAttribute('data-page');
        loadPage(pageName);
        history.pushState({ page: pageName }, null, pageName);
    });
});

// Event listener for back/forward navigation
window.addEventListener('popstate', (event) => {
    const pageName = event.state ? event.state.page : 'canva';
    loadPage(pageName);
});

// Initial load of the default page
loadPage('canva');

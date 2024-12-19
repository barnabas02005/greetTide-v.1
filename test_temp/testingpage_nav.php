<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Page Application</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <ul>
            <li data-page="home">Home</li>
            <li data-page="about">About</li>
            <li data-page="contact">Contact</li>
        </ul>
    </nav>
    <script>
        // Get references to elements
        const navLinks = document.querySelectorAll('nav li');
        
        // Function to load a page
        function loadPage(pageName) {
            const allowedExtensions = ['.html', '.php', '.txt']; // Add more extensions as needed

            // Check if the provided pageName has an allowed extension or is empty (default page)
            if (pageName === '' || allowedExtensions.some(ext => pageName.endsWith(ext))) {
                fetch(pageName || 'home.html') // Use 'home.html' as the default page
                    .then(response => response.text())
                    .then(data => {
                        // Replace the entire document's body content with the fetched page content
                        document.documentElement.innerHTML = data;

                        // Optional: Update the page title
                        document.title = pageName || 'Home';
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
            const pageName = event.state ? event.state.page : '';
            loadPage(pageName);
        });

        // Initial load of the default page
        loadPage('');
    </script>
</body>
</html>

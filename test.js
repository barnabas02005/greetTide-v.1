document.body.addEventListener('click', (ev) => {
  let target = ev.target;

  let tag = target.localName;

  if(tag === 'p' || tag === 'h1' || tag === 'body')
  {
    // let htmlString = target.outerHTML;
    // const parser = new DOMParser();
    // const doc = parser.parseFromString(htmlString, 'text/html');
    // let parsedHTML = doc.documentElement;
    // document.replaceChild(parsedHTML, document.documentElement);
  }
});

async function loadNewPage(filename) {
  try {
      const response = await fetch(filename); // Fetch the HTML content from the file
      if (!response.ok) {
          throw new Error('Failed to load HTML file');
      }
      const htmlString = await response.text(); // Get the HTML content as a string
      
      // Clear the current document's content completely
      document.documentElement.innerHTML = '';

      // Create new html, head, and body elements
      const newHtml = document.createElement('html');
      const newHead = document.createElement('head');
      const newBody = document.createElement('body');

      // Append new html, head, and body elements to the document
      document.documentElement.appendChild(newHtml);
      newHtml.appendChild(newHead);
      newHtml.appendChild(newBody);

      // Parse the fetched HTML content and append its content to the new head and body elements
      const tempElement = document.createElement('div');
      tempElement.innerHTML = htmlString;
      const newHeadContent = tempElement.querySelector('head').innerHTML;
      const newBodyContent = tempElement.querySelector('body').innerHTML;
      newHead.innerHTML = newHeadContent;
      newBody.innerHTML = newBodyContent;

      // Update the browser's history state
      window.history.pushState({}, '', filename);
  } catch (error) {
      console.error(error);
  }
}




document.getElementById('loadFromFile').addEventListener('click', async () => {
  // const filename = 'pages/signin.php'; // Change to the filename you want to load
  // try {
  //   const response = await fetch(filename); // Fetch the HTML content from the file
  //   if (!response.ok) {
  //     throw new Error('Failed to load HTML file');
  //   }
  //   const htmlString = await response.text(); // Get the HTML content as a string
    
    // // Create a new iframe element
    // const iframe = document.createElement('iframe');
    
    // // Set the iframe's src to the fetched HTML file
		// iframe.src = filename;
		// iframe.style.display = 'none'; // Hide the iframe initially
    // iframe.style.height = "100vh";
    // iframe.style.width = "100%";
    // iframe.style.border = "none";

		// const parser = new DOMParser();
    // const doc = parser.parseFromString(htmlString, 'text/html');
    // let parsedHTML = doc.documentElement;
    // // document.replaceChild(parsedHTML, document.documentElement);
		// document.documentElement.innerHTML = parsedHTML;

    // Add any necessary HTML content using document.write() or other methods
    // For example:
		// document.open();
    // document.write(htmlString);
		// document.close();

		// window.history.pushState({}, '', filename);
    // // Create a new base tag and set its href attribute to the current page's URL
    // const baseTag = document.createElement('base');
    // // Construct newUrl dynamically based on current path
    // const path = window.location.pathname.split('/'); // Split the pathname into segments
    // baseTag.setAttribute('href', window.location.origin + '/' + path[1] + '/');
    // console.log("Base: ", window.location.origin + path[0] + '/');
    // document.head.appendChild(baseTag);

    // // Adjust relative paths in the fetched content
    // const elementsWithRelativePaths = document.querySelectorAll('link[href], script[src], img[src], video[src]');
    // elementsWithRelativePaths.forEach(element => {
    //   const originalUrl = element.getAttribute('href') || element.getAttribute('src');
      
    //   if (originalUrl && !originalUrl.startsWith('http') && !originalUrl.startsWith('https')) {
    //     // Remove leading '../' or '/' from the originalUrl
    //     let cleanUrl = originalUrl.replace(/^(\.\.\/|\/)*/, ''); 
    //     const baseUrl = window.location.origin + '/' + path[1] + '/';
    //     const absoluteUrl = new URL(cleanUrl, baseUrl).href;
    //     console.log("Original URL: ", originalUrl);
    //     console.log("Absolute URL: ", absoluteUrl);
    //     console.log("Base URL: ", baseUrl);
    //     if (element.tagName.toLowerCase() === 'link') {
    //       element.setAttribute('href', absoluteUrl);
    //     } else {
    //       element.setAttribute('src', absoluteUrl);
    //     }
    //   }
    // });

    
    // // Append the iframe to the document
    // document.body.appendChild(iframe);
    // document.body.style.padding = '0';
    // document.body.style.margin = '0';
    // document.body.style.boxSizing = 'border-box';
		
		// // Remove any existing shortcut-icon
		// const existingShortcutIcon = document.querySelector('link[rel="shortcut icon"]');
		// if (existingShortcutIcon) {
		// 	existingShortcutIcon.remove();
		// }

    // // Wait for the iframe to finish loading its content
    // iframe.onload = function() {
    //   // Retrieve the head element from the iframe's document
    //   const iframeHead = iframe.contentDocument.head;
    //   const iframeBody = iframe.contentDocument.body;
    //   // Clone each element within the iframe's head and append it to the parent document's head
    //   Array.from(iframeHead.children).forEach(child => {
    //     document.head.appendChild(child.cloneNode(true));
				
    //   });

		// 	// Clone each element within the iframe's head and append it to the parent document's head
		// 	Array.from(iframeBody.children).forEach(child => {
		// 		document.body.appendChild(child.cloneNode(true));
		// 	});

		// 	// Retrieve the lang attribute from the new document (iframe)
		// 	const iframeLang = iframe.contentDocument.documentElement.getAttribute('lang');

		// 	// Create a new HTML element
		// 	const newHtml = document.createElement('html');

		// 	// Set the lang attribute on the new HTML element
		// 	if (iframeLang) {
		// 			newHtml.setAttribute('lang', iframeLang);
		// 	}

      
    //   // Remove the head element and its content from the iframe
    //   iframeHead.remove();

		// 	// Remove the head element and its content from the iframe
		// 	iframeBody.remove();

		// 	// Remove the iframe itself
		// 	iframe.remove();
      
    //   // Update the browser's history state
    //   window.history.pushState({}, '', filename);
      
    //   // Remove the onload handler to avoid memory leaks
    //   iframe.onload = null;
		// };
			// } catch (error) {
			// console.error(error);
			// }

      // Example usage: Load a new page
      const filename = 'pages/signin.php'; // Change to the filename you want to load
      loadNewPage(filename);
});


// Plan and work hard all to the glory of GOD
//a sensible person learns by being instructed.

/*
Be sensible and store up
precious treasures—
don't waste them
like a fool.
*/
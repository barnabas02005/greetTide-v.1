/* EMERALD JS (LOAD PAGE) */

// Get html code content of the page clicked
// The minify the code
// The parse the file into the  '' Emerald scriptBuilder ''
// Then Create the same version of the html code content gotten, in the browser DOM, loading links, script, images, videos or other resources,
// Update the URL to the page directory






////////////////////////////////////////////////////////
  // ||||||||||| Emerald scriptBuilder ||||||||||| //
////////////////////////////////////////////////////////

/*


  * Get a tag and the value, 
  * Get the atrribute(s) and the value in relation to the tag
  * Get the position of the tag, if it is a parent tag or child tag and if it has a parent tag or siblings
  * Once a tag position, type(Element) and atrribute(s)(with value(s)) is determined by the scriptBuilder, then create the page
  * Get all resources of the page (Links(external or inline), script(inline or external), images, videos and other resources) _ _ _ _ _ _ _ Load the script in modules(Sandboxing like feature to stop script interferance of variables, functions, and eventListener)
  * Load the the code (Minified)
  * update the page URL to the 'page-name' directory
  * 
  * ALL BY GOD'S GRACE, THE PAGE IS LOADED GREAT!!!🚀🚀(GOD DID IT!)

*/  


// document.addEventListener('DOMContentLoaded', function() {
//   var p = this.createElement('p');
//   p.textContent = "Hallelujah!, JESUS IS RISEN";
//   p.setAttribute('style', 'color: red;font-size: 1rem;text-align: center;');
//   document.body.appendChild(p);
// });
// replaceDoctypeModule.js

// Function to minify HTML content
function minifyHTML(html) {
  return html.replace(/[\r\n\t]+/g, ' ') // Replace newlines, carriage returns, and tabs with spaces
             .replace(/\s{2,}/g, ' ') // Replace multiple consecutive spaces with a single space
             .replace(/<!--[\s\S]*?-->/g, ''); // Remove HTML comments
}
export const fetchAndReplaceDocument = async function(pageName) {
  try {
    const response = await fetch(pageName);
    if (!response.ok) {
      throw new Error('Failed to fetch HTML content');
    }
    let htmlContent = await response.text();

    // Minify HTML content
    var minifiedhtmlContent = minifyHTML(htmlContent);

    // Parse HTML content into a DOM document
    const parser = new DOMParser();
    const doc = parser.parseFromString(minifiedhtmlContent, 'text/html');

    // removeAllEventListeners(document.body);

    parseHTML(minifiedhtmlContent);



    // Extract doctype from the parsed document
    const newDoctype = doc.doctype;

    // Create new doctype element
    const newDoctypeNode = document.implementation.createDocumentType(
      newDoctype.name,
      newDoctype.publicId,
      newDoctype.systemId
    );

    // Replace current document's doctype with the new doctype
    const oldDoctypeNode = document.doctype;
    const parentNode = oldDoctypeNode.parentNode;
    parentNode.replaceChild(newDoctypeNode, oldDoctypeNode);

    // Dynamically load and execute the content of route.js if needed
    // if (htmlContent.includes('<load rel="emerlad"></load>')) {
    //   const script = document.createElement('script');
    //   script.type = 'module';
    //   script.defer = true;
    
    //   // Function to fetch the content of route.js and set it as textContent of the script element
    //   async function loadRouteContent() {
    //     try {
    //       const response = await fetch('http://127.0.0.1:5500/version_1/assets/js/route.js');
    //       if (!response.ok) {
    //         throw new Error('Failed to fetch route.js');
    //       }
    //       const routeContent = await response.text();
    //       script.textContent = routeContent;
    //     } catch (error) {
    //       console.error('Error loading route.js:', error);
    //     }
    //   }
    
    //   // Call the function to load route.js content
    //   loadRouteContent();
    
    //   // Append the script element to the document body
    //   document.head.appendChild(script);
    // }
    

    // Extract page directory from pageName
    const pageDirectory = pageName.substring(0, pageName.lastIndexOf('/') + 1);

    // Update URL to the page-name directory
    history.pushState({}, '', pageName);

  } catch (error) {
    console.error('Error: ', error);
  }
}

let headRemoved = false;

async function parseHTML(htmlString) {
  // Minify the HTML content

  // Create a new HTML document using DOMParser
  const parser = new DOMParser();
  const doc = parser.parseFromString(htmlString, 'text/html');

  // Create head element
  const parsedHead = document.createElement('head');

  // Set attributes for head element
  for (let attr of doc.head.attributes) {
    parsedHead.setAttribute(attr.name, attr.value);
  }

  // Create body element
  const parsedBody = document.createElement('body');

  // Set attributes for body element
  for (let attr of doc.body.attributes) {
    parsedBody.setAttribute(attr.name, attr.value);
  }

  // Process head content
  const headProcessingPromises = Array.from(doc.head.childNodes).map(node => processNode(node, parsedHead));
  await Promise.all(headProcessingPromises);

  // Process body content
  const bodyProcessingPromises = Array.from(doc.body.childNodes).map(node => processNode(node, parsedBody));
  await Promise.all(bodyProcessingPromises);

    
  // Replace existing head with parsed head
  const existingHead = document.querySelector('head');
  // Replace existing body with parsed body
  const existingBody = document.querySelector('body');
  var parentOfExistingHead;
  if (existingHead) {

    // Store a reference to the parent node of existingHead
    parentOfExistingHead = existingHead.parentNode;

    setTimeout(function() {
      // Remove existing head
      existingHead.parentNode.removeChild(existingHead);
    }, 50);
    // Append parsed head content
    document.documentElement.prepend(parsedHead);

  }

  var parentOfExistingBody;
  if (existingBody) {
    // Store a reference to the parent node of existingBody
    parentOfExistingBody = existingBody.parentNode;

    // Remove existing body
    existingBody.parentNode.removeChild(existingBody);

    setTimeout(function() {       

        // Append parsedBody to the parent node of existingBody
        parentOfExistingBody.appendChild(parsedBody);

        // Store the body element, for referencing
        const body = document.body;

        // Create an array to store reference to the original script elements
        const originalScripts = [];


      var isScriptExecuted = false;

      // parsedBody.querySelectorAll('script').forEach(script => {
      //     // Check if the script is an external script (has src attribute) and is a blob URL
      //     if (script.src && script.src.startsWith('blob:')) {
      //         fetch(script.src)
      //             .then(response => {
      //                 if (!response.ok) {
      //                     throw new Error('Failed to fetch script content');
      //                 }
      //                 return response.text();
      //             })
      //             .then(scriptContent => {

      //                 // Store reference to the original script
      //                 originalScripts.push(script);

      //                 // Dynamically create a new script element
      //                 const dynamicScript = document.createElement('script');
      //                 dynamicScript.textContent = scriptContent;
      //                 dynamicScript.type = 'module';
      
      //                 // Append the script to the document head to execute it
      //                 document.body.appendChild(dynamicScript);
      
      //                 isScriptExecuted = true;
      
      //                 // Check if the script content contains 'DOMContentLoaded'
      //                 if (scriptContent.includes('DOMContentLoaded')) {
      //                     dispatchDOMContentLoaded();
      //                     console.log("Script executed successfully: ", isScriptExecuted);
      //                 }
      //             })
      //             .catch(error => {
      //                 console.error('Error fetching script content:', error);
      //             });
      //     }
      // });


    // Iterate over each script tag in parsedBody
    parsedBody.querySelectorAll('script').forEach(script => {
      // Check if the script is an inline script (no src attribute)
      if (!script.src) {
        // Execute the inline script content
        if (script.textContent.includes('DOMContentLoaded')) {
          dispatchDOMContentLoaded();
      }

      // Store reference to the original script
      originalScripts.push(script);

      // Dynamically create a new script element
      const dynamicScript = document.createElement('script');
      dynamicScript.textContent = script.textContent;
      dynamicScript.type = 'module';

      // Append the script to the document body to execute it
      body.appendChild(dynamicScript);
      }
    });

    // Remove the original script element from the DOM
    originalScripts.forEach(script => { 
      script.parentNode.removeChild(script) 
      console.log(script); });
  }, 120);  
  }
}


async function processNode(node, parent) {
    // If the node is an element
    if (node.nodeType === 1) 
    {
      const tagName = node.tagName.toLowerCase();
      const element = document.createElement(tagName);
      if(tagName === "svg")
      {
        // Clone the SVG element
        const clonedSVG = node.cloneNode(true);
  
        // console.log("Cloned SVG", node);
        // Create a new XML document for the SVG element
        // const svgDoc = document.implementation.createDocument('http://www.w3.org/2000/svg', 'svg', null);
        // Add a 'class' to the existing svg
        element.classList.add('svgremove');
        // Import the cloned SVG element into the new XML document
        // svgDoc.documentElement.appendChild(svgDoc.importNode(clonedSVG, true));
        // Append the SVG document to the parent element
        appendSVGToParent(clonedSVG, parent);
  
        // Remove existing SVG elements
        // removeExistingSVG(node, parent);
      }
      else
      {
      // Iterate over each attribute of the element and set them
      for (let i = 0; i < node.attributes.length; i++) {
        const attr = node.attributes[i];
        element.setAttribute(attr.nodeName, attr.nodeValue);
      }
  
      // Handle external CSS and JS files
      if (tagName === 'link' && node.getAttribute('rel') === 'stylesheet') {
        const href = node.getAttribute('href');
        await fetchAndProcessResource(href, 'style', element);
      } else if (tagName === 'script' && node.getAttribute('src')) {
        var blobMinify = node.getAttribute('blob-minify');
        if(blobMinify === null)
        {
          blobMinify = "no"
        }
        const src = node.getAttribute('src');
        await fetchAndProcessResource(src, 'script', element, blobMinify);
      }
  
      // Handle inline scripts and styles
      if ((tagName === 'script' && !node.getAttribute('src')) || tagName === 'style') {

        const content = node.textContent;
        // console.log(content);
        node.textContent = '';
        // You can access its parent node using parentNode property
        const patNode = node.parentNode;

        // If you want to access the parent node of the parent node (grandparent node)
        const grandparentNode = patNode.parentNode;



        await fetchAndProcessResourceInline(content, tagName, element, parent);
      }
  
          
          /*if (tagName === 'svg') {
        // Clone the SVG element
        const clonedSVG = node.cloneNode(true);
  
        // console.log("Cloned SVG", node);
        // Create a new XML document for the SVG element
        // const svgDoc = document.implementation.createDocument('http://www.w3.org/2000/svg', 'svg', null);
        // Add a 'class' to the existing svg
        element.classList.add('svgremove');
        // Import the cloned SVG element into the new XML document
        // svgDoc.documentElement.appendChild(svgDoc.importNode(clonedSVG, true));
        // Append the SVG document to the parent element
        // appendSVGToParent(clonedSVG, parent);
  
        // Remove existing SVG elements
        removeExistingSVG(node, parent);
      }*/
  
      parent.appendChild(element);
  
      // Process child nodes recursively
      for (let childNode of node.childNodes)
          {
        await processNode(childNode, tagName === 'svg' ? element : element);
      }
    }
  }
    // If the node is a text node and not empty
    else if (node.nodeType === 3 && node.nodeValue.trim() !== '') {
      // Minify text content before creating text node
      const minifiedText = node.nodeValue;
      const textNode = document.createTextNode(minifiedText);
      parent.appendChild(textNode);
    }
  
  }
  
async function appendSVGToParent(svgDoc, parent) {
    // Convert SVG XML to string
    const serializer = new XMLSerializer();
    const svgString = serializer.serializeToString(svgDoc);
  
    // Create a temporary div element
    const tempDiv = document.createElement('div');
    // Set the innerHTML of the div to the SVG string
    tempDiv.innerHTML = svgString;
    tempDiv.firstChild.setAttribute('eme', 'yes');
  
    // Append the first child of the temporary div to the parent
    parent.appendChild(tempDiv.firstChild);
  }

async function removeExistingSVG(parent) {
  // Log the parent element to ensure it's correct
  // console.log('Parent element:', parent);

  // Select and log all existing SVG elements
  const existingSVGs = parent.querySelectorAll('svg');
  // console.log('Existing SVG elements:', existingSVGs);

  // Remove each SVG element
  existingSVGs.forEach(svg => {
    // console.log('Removing SVG:', svg);
    // svg.parentNode.removeChild(svg);
  });
}
async function fetchAndProcessResource(url, type, element, blminify) {
    try {
      const response = await fetch(url);
      if (!response.ok) {
        throw new Error('Failed to fetch resource');
      }

      const content = await response.text();

      if(blminify === "yes")
      {
        const minifiedContent = minifyContent(content, type);

        const blob = new Blob([minifiedContent], { type: getMimeType(type) });
        const blobURL = URL.createObjectURL(blob);

        if (type === 'style') {
          element.setAttribute('href', blobURL);
        } else if (type === 'script') {
          element.setAttribute('src', blobURL);
          element.type = 'module';
          // loadNewScript(blobURL);
        }
        preloadResource(element, type);
      }
      else if (blminify === "no")
      {
        element.src = url;
        element.setAttribute('blob-minify', 'no');
      }
    } catch (error) {
      console.error('Error fetching or processing resource:', error);
    }
}

async function fetchAndProcessResourceInline(content, type, element, parent) {
  try {
    const minifiedContent = minifyContent(content, type);

    if (type === 'style') {
      element.textContent = content;
    } else if(type === 'script') {
			await loadNewModuleInlinScript(parent, content);
			// console.log("Head content: ", parent);
			// Check if the script content contains the DOMContentLoaded event listener
			var scriptContent = content;

      if (scriptContent.includes('DOMContentLoaded'))
      {
        dispatchDOMContentLoaded();
      }

			// console.log('JESUS IS LORD FOREVER!');

			// element.textContent = scriptContent;
	}
    

    // preloadResource(element, type);
  } catch (error) {
    console.error('Error fetching or processing resource:', error);
  }
}

function dispatchDOMContentLoaded() {
		console.log('Dispatching DOMContentLoaded event');
		var event = new Event('DOMContentLoaded');
		document.dispatchEvent(event);
		console.log('DOMContentLoaded event dispatched');
}

function removeDOMContentLoadedFromScript(scriptContent) {
	// Regular expression to match the DOMContentLoaded event listener
	const regex = /document\.addEventListener\('DOMContentLoaded',\s*function\s*\(\)\s*{\s*[^}]*}\);?/g;
	
	// Remove the matched part from the script content
	return scriptContent.replace(regex, '');
}

function minifyContent(content, type) {
  // Implement minification logic based on resource type (CSS or JavaScript)
  // Example: CSS minification
  if (type === 'style') {
    return content.replace(/\/\*[\s\S]*?\*\/|([^:]|^)\/\/.*$/gm, '').replace(/\s+/g, ' ').trim()
    .replace(/\/\*[\s\S]*?\*\//g, '') // Remove CSS comments
    .replace(/\s{2,}/g, ' '); // Replace multiple consecutive spaces with a single space
  }
  // Example: JavaScript minification
  else if (type === 'script') {
    return content.replace(/\/\*[\s\S]*?\*\/|([^:]|^)\/\/.*$/gm, '').replace(/\s+/g, ' ').trim()
    .replace(/\/\/.*?\n|\/\*[\s\S]*?\*\//g, '');
  }
  return content;
}

function getMimeType(type) {
  if (type === 'style') {
    return 'text/css';
  } else if (type === 'script') {
    return 'application/javascript';
  }
  return '';
}

function preloadResource(element, asType) {
  element.rel = 'stylesheet';
  element.as = asType;
  element.crossOrigin = 'anonymous'; // Set crossOrigin if needed
  element.async = true; // Add the async attribute
  // Append the preload attribute to the element
  element.setAttribute('preload', 'true');
}

// Function to load the new script
async function loadNewScript(newScriptSrc) {
  try {
      // Dynamically import the script as a module
      
      await import(newScriptSrc);
  } catch (error) {
      console.error('Error loading script:', error);
  }
}

async function loadNewModuleInlinScript(element, newScriptContent) {
try {
  // Execute the script content immediately without waiting for DOMContentLoaded
  // executeScript(newScriptContent);
  // Create a Blob containing the script content
  const blob = new Blob([newScriptContent], { type: 'application/javascript' });;
  // Create a URL for the Blob
  const blobURL = URL.createObjectURL(blob);
  

  // Create a new script element


  const script = document.createElement('script');
  script.textContent = newScriptContent;
  script.type = 'module';
  if (script.textContent.includes('DOMContentLoaded'))
  {
    dispatchDOMContentLoaded();
  }


  element.appendChild(script);


  // Return the created script element
  // return script;
} catch (error) {
  console.error('Error loading module script:', error);
  return null;
}
}


function executeScript(scriptContent) {
try {
  // Evaluate the script content in the global scope
  eval(scriptContent);
  console.log('Script executed successfully.');
} catch (error) {
  console.error('Error executing script:', error);
}
}

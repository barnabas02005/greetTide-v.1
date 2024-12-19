// // Function to minify HTML code
// function minifyHTML(html) {
//   return html.replace(/>\s+</g, '><').trim();
// }

// // Function to minify JavaScript code
// function minifyJavaScript(code) {
//     // Remove comments
//     code = code.replace(/(\/\*[\s\S]*?\*\/|\/\/.*)/g, '');

//     // Remove whitespace characters
//     code = code.replace(/\s+/g, ' ');

//     return code;
// }

// document.addEventListener('DOMContentLoaded', function () {
//   // Keep track of loaded scripts
//   var loadedScripts = {};

// // Function to handle AJAX navigation
// function navigateTo(destination) {
//   // Create a new iframe element
//   var iframe = document.createElement('iframe');
//   iframe.style.display = 'none'; // Hide the iframe from view
//   document.body.appendChild(iframe);

//   // Function to execute after the iframe has loaded
//   iframe.onload = function() {
//       // Fetch the content of the new page
//       fetch(destination)
//           .then(function(response) {
//               if (!response.ok) {
//                   throw new Error('Network response was not ok');
//               }
//               return response.text();
//           })
//           .then(function(html) {
//               // Minify the HTML code
//               var minifiedHtml = minifyHTML(html);

//               // Write the new content to the iframe
//               iframe.contentDocument.open();
//               iframe.contentDocument.write(minifiedHtml);
//               iframe.contentDocument.close();

//               // Update the URL to the new page's URL
//               history.pushState(null, null, destination);

//               // Extract the content from the iframe
//               var iframeContent = iframe.contentDocument.documentElement.outerHTML;

//               // Replace the current document content with the content of the iframe
//               document.open();
//               document.write(iframeContent);
//               document.close();

//               // Remove the iframe from the document
//               document.body.removeChild(iframe);
//           })
//           .catch(function(error) {
//               console.error('Error fetching data:', error);
//           });
//   };

//   // Set the iframe source to the destination URL
//   iframe.src = destination;
// }


//   // Function to attach event listeners to dynamically loaded content
//   function attachEventListeners() {
//       // Add click event listener to elements with page-name attribute
//       Array.from(document.querySelectorAll('[page-name]')).forEach(function(element) {
//           element.addEventListener('click', function(e) {
//               e.preventDefault();
//               var destination = this.getAttribute('page-name');
//               navigateTo(destination);
//           });
//       });
//   }
  
//   // Function to execute scripts in the new content
//   function executeScripts(html) {
//       // Create a new HTML document
//       var parser = new DOMParser();
//       var htmlDoc = parser.parseFromString(html, 'text/html');

//       // Find and execute inline scripts in the new content
//       Array.from(htmlDoc.querySelectorAll('script:not([src])')).forEach(function(script) {
//           // Execute the inline script content directly
//           eval(script.textContent);
//       });

//       // Find and load external scripts in the new content
//       var externalScripts = htmlDoc.querySelectorAll('script[src]');
//       var loadedScriptsCount = 0;

//       Array.from(externalScripts).forEach(function(script) {
//           var src = script.src;
//           // Load the script only if it's not already loaded
//           if (!loadedScripts[src]) {
//               loadedScripts[src] = true;

//               // Create a new <script> element
//               var newScript = document.createElement('script');
//               newScript.src = src;

//               // Listen for the load event of the external script
//               newScript.onload = function() {
//                   // Increment the count of loaded scripts
//                   loadedScriptsCount++;

//                   // If all external scripts have loaded, dispatch DOMContentLoaded event
//                   if (loadedScriptsCount === externalScripts.length) {
//                       dispatchDOMContentLoaded();
//                   }
//               };

//               // Append the new <script> element to the document body
//               document.body.appendChild(newScript);
//           }
//       });
//   }

//   // Function to manually trigger DOMContentLoaded event
//   function dispatchDOMContentLoaded() {
//       console.log('Dispatching DOMContentLoaded event');
//       var event = new Event('DOMContentLoaded');
//       document.dispatchEvent(event);
//       console.log('DOMContentLoaded event dispatched');
//   }

//   // Attach event listeners to initial content
//   attachEventListeners();
// });



// // 'use strict';

// // // Namespace for the navigation module
// // var Navigation = {
// //     // Function to handle AJAX navigation
// //     navigateTo: function(destination) {
// //         // Update link text to indicate loading
// //         Array.from(document.querySelectorAll('[page-name]')).forEach(function(element) {
// //             element.textContent = 'Loading...';
// //         });

// //         // Clear variables and functions from the previous page
// //         // this.clearPageState();

// //         // Fetch the content of the page
// //         fetch(destination)
// //             .then(function(response) {
// //                 if (!response.ok) {
// //                     throw new Error('Network response was not ok');
// //                 }
// //                 return response.text();
// //             })
// //             .then(function(html) {
// //                 // Minify the HTML code
// //                 var minifiedHtml = this.minifyHTML(html);

// //                 // Update the document content with the fetched content
// //                 document.documentElement.innerHTML = minifiedHtml;

// //                 // Update the URL to the new page's URL
// //                 history.pushState(null, null, destination);

// //                 // Execute scripts in the new content
// //                 this.executeScripts(html);
// //             }.bind(this))
// //             .catch(function(error) {
// //                 console.error('Error fetching data:', error);
// //             });
// //     },

// //     // Function to clear variables and functions from the previous page
// //     clearPageState: function() {
// //         // Clear global variables and functions
// //         for (var prop in window) {
// //             if (window.hasOwnProperty(prop)) {
// //                 delete window[prop];
// //             }
// //         }
// //     },

// //     // Function to execute scripts in the new content
// //     executeScripts: function(html) {
// //         // Find and execute inline scripts in the new content
// //         var parser = new DOMParser();
// //         var htmlDoc = parser.parseFromString(html, 'text/html');
// //         var inlineScripts = htmlDoc.querySelectorAll('script:not([src])');
// //         inlineScripts.forEach(function(script) {
// //             // Execute the inline script content directly
// //             eval(script.textContent);
// //         });
// //     },

// //     // Function to minify HTML code
// //     minifyHTML: function(html) {
// //         // Minify the HTML code
// //         return html.replace(/>\s+</g, '><').trim();
// //     }
// // };

// // // Event delegation for click events on elements with page-name attribute
// // document.addEventListener('click', function(event) {
// //     var target = event.target;
// //     if (target.matches('[page-name]')) {
// //         event.preventDefault();
// //         var destination = target.getAttribute('page-name');
// //         Navigation.navigateTo(destination);
// //     }
// // });




// /// NEW




// // Function to minify HTML content
// function minifyHTML(html) {
//     return html.replace(/[\r\n\t]+/g, ' ') // Replace newlines, carriage returns, and tabs with spaces
//                .replace(/\s{2,}/g, ' ') // Replace multiple consecutive spaces with a single space
//                .replace(/<!--[\s\S]*?-->/g, ''); // Remove HTML comments
//   }
//   export const fetchAndReplaceDocument = async function(pageName) {
//     try {
//       const response = await fetch(pageName);
//       if (!response.ok) {
//         throw new Error('Failed to fetch HTML content');
//       }
//       let htmlContent = await response.text();
  
//       // Minify HTML content
//       var minifiedhtmlContent = minifyHTML(htmlContent);
  
//       // Parse HTML content into a DOM document
//       const parser = new DOMParser();
//       const doc = parser.parseFromString(minifiedhtmlContent, 'text/html');
  
//       // removeAllEventListeners(document.body);
  
//       parseHTML(htmlContent);
  
  
  
//       // Extract doctype from the parsed document
//       const newDoctype = doc.doctype;
  
//       // Create new doctype element
//       const newDoctypeNode = document.implementation.createDocumentType(
//         newDoctype.name,
//         newDoctype.publicId,
//         newDoctype.systemId
//       );
  
//       // Replace current document's doctype with the new doctype
//       const oldDoctypeNode = document.doctype;
//       const parentNode = oldDoctypeNode.parentNode;
//       parentNode.replaceChild(newDoctypeNode, oldDoctypeNode);
  
//       // Dynamically load and execute the content of route.js if needed
//       // if (htmlContent.includes('<load rel="emerlad"></load>')) {
//       //   const script = document.createElement('script');
//       //   script.type = 'module';
//       //   script.defer = true;
      
//       //   // Function to fetch the content of route.js and set it as textContent of the script element
//       //   async function loadRouteContent() {
//       //     try {
//       //       const response = await fetch('http://127.0.0.1:5500/version_1/assets/js/route.js');
//       //       if (!response.ok) {
//       //         throw new Error('Failed to fetch route.js');
//       //       }
//       //       const routeContent = await response.text();
//       //       script.textContent = routeContent;
//       //     } catch (error) {
//       //       console.error('Error loading route.js:', error);
//       //     }
//       //   }
      
//       //   // Call the function to load route.js content
//       //   loadRouteContent();
      
//       //   // Append the script element to the document body
//       //   document.head.appendChild(script);
//       // }
      
  
//       // Extract page directory from pageName
//       const pageDirectory = pageName.substring(0, pageName.lastIndexOf('/') + 1);
  
//       // Update URL to the page-name directory
//       history.pushState({}, '', pageName);
  
//     } catch (error) {
//       console.error('Error: ', error);
//     }
//   }
  
  
  
//   export async function parseHTML(htmlString) {
//     // Minify the HTML content
  
//     // Create a new HTML document using DOMParser
//     const parser = new DOMParser();
//     const doc = parser.parseFromString(htmlString, 'text/html');
  
//     // Create head element
//     const parsedHead = document.createElement('head');
  
//     // Set attributes for head element
//     for (let attr of doc.head.attributes) {
//       parsedHead.setAttribute(attr.name, attr.value);
//     }
  
//     // Create body element
//     const parsedBody = document.createElement('body');
  
//     // Set attributes for body element
//     for (let attr of doc.body.attributes) {
//       parsedBody.setAttribute(attr.name, attr.value);
//     }
  
//     // Process head content
//     const headProcessingPromises = Array.from(doc.head.childNodes).map(node => processNode(node, parsedHead));
//     await Promise.all(headProcessingPromises);
  
//     // Process body content
//     const bodyProcessingPromises = Array.from(doc.body.childNodes).map(node => processNode(node, parsedBody));
//     await Promise.all(bodyProcessingPromises);
  
  
//     var headRemoved = false;
  
//     // Replace existing head with parsed head
//     const existingHead = document.querySelector('head');
//     const existingBody = document.querySelector('body');
//     var parentOfExistingHead;
  
//     if (existingHead) {
//       // Store a reference to the parent node of existingHead
//       parentOfExistingHead = existingHead.parentNode;
    
//       existingBody.style.display = "none";
    
//       // Remove existing head
//       existingHead.parentNode.removeChild(existingHead);
    
//       // Append parsed head content
//       document.documentElement.prepend(parsedHead);
  
//       // parentOfExistingHead.appendChild(parsedHead);
  
  
    
//       // Iterate over each script tag in parsedBody
//       parsedHead.querySelectorAll('script').forEach(script => {
//         // Check if the script is an inline script (no src attribute)
//         if (script.src) {
//           if (script.textContent.includes('DOMContentLoaded')) {
//             dispatchDOMContentLoaded();
//           }
//           // eval(script.textContent);
//         }
//       });
    
//       // const headLoadTime = calculateHeadLoadTime(); // You need to implement this function
//       // // console.log("Head tag and content Load time = ", headLoadTime);
//       // // var time;
//       // var timePromise = headLoadTime.then(result => {
//       // //   // console.log("Head tag and content Load time = ", result);
//       //   return result;
//       // });
  
//       // timePromise.then(time => {
//       //   //   // Now you can use `time` here
//       //   // // Set headRemoved to true after a delay
//       //   setTimeout(() => {
//       //       // headRemoved = true;
  
//       //       // Remove existing body
//       //       existingBody.parentNode.removeChild(existingBody);
  
//       //       // Append parsedBody to the parent node of existingBody
//       //       parentOfExistingBody.appendChild(parsedBody);
//       //   }, time);
//       // });
//     }
  
//     var parentOfExistingBody;
  
//     if (existingBody) {
//       // Store a reference to the parent node of existingBody
//       parentOfExistingBody = existingBody.parentNode;
  
//       // Remove existing body
//       existingBody.parentNode.removeChild(existingBody);
  
//       // Append parsedBody to the parent node of existingBody
//       parentOfExistingBody.appendChild(parsedBody);
  
//       // Reset headRemoved
//       headRemoved = false;
  
  
  
//       parsedBody.querySelectorAll('script').forEach(async script => {
//         // Check if the script is an external script (has src attribute)
//         if (script.src) {
//             try {
//                 const response = await fetch(script.src);
//                 if (!response.ok) {
//                     throw new Error('Failed to fetch script content');
//                 }
//                 const scriptContent = await response.text();
//                 console.log('Script content:', scriptContent);
  
//                 if (scriptContent.includes('DOMContentLoaded'))
//                 {
//                   dispatchDOMContentLoaded();
//                 }
//                 // Now you can do whatever you want with the script content
//             } catch (error) {
//                 console.error('Error fetching script content:', error);
//             }
//         } else {
//             // This is an inline script, handle it accordingly
//             if (script.textContent.includes('DOMContentLoaded')) {
//                 dispatchDOMContentLoaded();
//             }
//             // Avoid using eval if possible
//             // console.log(script.textContent);
//         }
//     });
    
  
//     }
//   }
  
//   function calculateHeadLoadTime() {
//     // Create a promise that resolves when all resources in the head are loaded
//     const headLoadPromise = new Promise(resolve => {
//       // Get all resources in the head (scripts and stylesheets)
//       const headResources = Array.from(document.head.querySelectorAll('script, link[rel="stylesheet"]'));
  
//       // Count the number of resources that are still loading
//       let remainingResources = headResources.length;
  
//       // Function to check if all resources are loaded
//       const checkAllResourcesLoaded = () => {
//         remainingResources--;
//         if (remainingResources === 0) {
//           // Resolve the promise when all resources are loaded
//           resolve();
//         }
//       };
  
//       // Add event listeners to each resource to track when it is loaded
//       headResources.forEach(resource => {
//         if (resource.tagName === 'SCRIPT') {
//           // For scripts, listen for the load event
//           resource.addEventListener('load', checkAllResourcesLoaded);
//         } else if (resource.tagName === 'LINK') {
//           // For stylesheets, listen for the load event or the load event of the corresponding stylesheet
//           resource.addEventListener('load', checkAllResourcesLoaded);
//           // For older versions of Internet Explorer, where the load event may not fire for stylesheets
//           if ('sheet' in resource) {
//             if (resource.sheet) {
//               if (resource.sheet.cssRules.length > 0) {
//                 checkAllResourcesLoaded();
//               } else {
//                 resource.sheet.addEventListener('load', checkAllResourcesLoaded);
//               }
//             }
//           } else {
//             // For other browsers, we'll have to wait for the load event
//             resource.addEventListener('load', checkAllResourcesLoaded);
//           }
//         }
//       });
//     });
  
//     // Measure the time it takes for the promise to resolve
//     const startTime = performance.now();
//     return headLoadPromise.then(() => {
//       const endTime = performance.now();
//       const loadTime = endTime - startTime;
//       return loadTime;
//     });
//   }
  
  
  
//   export async function processNode(node, parent) {
//     // If the node is an element
//     if (node.nodeType === 1) 
//     {
//       const tagName = node.tagName.toLowerCase();
//       const element = document.createElement(tagName);
//       if(tagName === "svg")
//       {
//         // Clone the SVG element
//         const clonedSVG = node.cloneNode(true);
  
//         // console.log("Cloned SVG", node);
//         // Create a new XML document for the SVG element
//         // const svgDoc = document.implementation.createDocument('http://www.w3.org/2000/svg', 'svg', null);
//         // Add a 'class' to the existing svg
//         element.classList.add('svgremove');
//         // Import the cloned SVG element into the new XML document
//         // svgDoc.documentElement.appendChild(svgDoc.importNode(clonedSVG, true));
//         // Append the SVG document to the parent element
//         appendSVGToParent(clonedSVG, parent);
  
//         // Remove existing SVG elements
//         // removeExistingSVG(node, parent);
//       }
//       else
//       {
//       // Iterate over each attribute of the element and set them
//       for (let i = 0; i < node.attributes.length; i++) {
//         const attr = node.attributes[i];
//         element.setAttribute(attr.nodeName, attr.nodeValue);
//       }
  
//       // Handle external CSS and JS files
//       if (tagName === 'link' && node.getAttribute('rel') === 'stylesheet') {
//         const href = node.getAttribute('href');
//         await fetchAndProcessResource(href, 'style', element);
//       } else if (tagName === 'script' && node.getAttribute('src')) {
//         var blobMinify = node.getAttribute('blob-minify');
//         if(blobMinify === null)
//         {
//           blobMinify = "no"
//         }
//         const src = node.getAttribute('src');
//         await fetchAndProcessResource(src, 'script', element, blobMinify);
//       }
  
//       // Handle inline scripts and styles
//       if ((tagName === 'script' && !node.getAttribute('src')) || tagName === 'style') {
//         const content = node.textContent;
  
//         // console.log(content);
//         node.textContent = '';
//               // You can access its parent node using parentNode property
//               const patNode = node.parentNode;
  
//               // If you want to access the parent node of the parent node (grandparent node)
//               const grandparentNode = patNode.parentNode;
//         await fetchAndProcessResourceInline(content, tagName, element, parent);
//       }
  
          
//           /*if (tagName === 'svg') {
//         // Clone the SVG element
//         const clonedSVG = node.cloneNode(true);
  
//         // console.log("Cloned SVG", node);
//         // Create a new XML document for the SVG element
//         // const svgDoc = document.implementation.createDocument('http://www.w3.org/2000/svg', 'svg', null);
//         // Add a 'class' to the existing svg
//         element.classList.add('svgremove');
//         // Import the cloned SVG element into the new XML document
//         // svgDoc.documentElement.appendChild(svgDoc.importNode(clonedSVG, true));
//         // Append the SVG document to the parent element
//         // appendSVGToParent(clonedSVG, parent);
  
//         // Remove existing SVG elements
//         removeExistingSVG(node, parent);
//       }*/
  
//       parent.appendChild(element);
  
//       // Process child nodes recursively
//       for (let childNode of node.childNodes)
//           {
//         await processNode(childNode, tagName === 'svg' ? element : element);
//       }
//     }
//   }
//     // If the node is a text node and not empty
//     else if (node.nodeType === 3 && node.nodeValue.trim() !== '') {
//       // Minify text content before creating text node
//       const minifiedText = node.nodeValue;
//       const textNode = document.createTextNode(minifiedText);
//       parent.appendChild(textNode);
//     }
  
//   }
  
//   export async function appendSVGToParent(svgDoc, parent) {
//     // Convert SVG XML to string
//     const serializer = new XMLSerializer();
//     const svgString = serializer.serializeToString(svgDoc);
  
//     // Create a temporary div element
//     const tempDiv = document.createElement('div');
//     // Set the innerHTML of the div to the SVG string
//     tempDiv.innerHTML = svgString;
//     tempDiv.firstChild.setAttribute('eme', 'yes');
  
//     // Append the first child of the temporary div to the parent
//     parent.appendChild(tempDiv.firstChild);
//   }
  
//   export async function removeExistingSVG(element, parent) {
//     // Log the parent element to ensure it's correct
//       console.log('Parent element:', parent);
//       console.log('Removing SVG:', element);
//       // Remove the SVG element from its parent node
//       parent.removeChild(element);
//       console.log('Removed svg');
//   }
//   export async function fetchAndProcessResource(url, type, element, blminify) {
//       try {
//         const response = await fetch(url);
//         if (!response.ok) {
//           throw new Error('Failed to fetch resource');
//         }
  
//         const content = await response.text();
  
//         if(blminify === "yes")
//         {
//           const minifiedContent = minifyContent(content, type);
  
//           const blob = new Blob([content], { type: getMimeType(type) });
//           const blobURL = URL.createObjectURL(blob);
  
//           if (type === 'style') {
//             element.setAttribute('href', blobURL);
//           } else if (type === 'script') {
//             element.setAttribute('src', blobURL);
//             element.type = 'module';
//             loadNewScript(blobURL);
//           }
//           preloadResource(element, type);
//         }
//         else if (blminify === "no")
//         {
//           element.src = url;
//           element.setAttribute('blob-minify', 'no');
//           console.log("Auth code", content);
//           loadNewModuleInlinScript(element, content);
//         }
//       } catch (error) {
//         console.error('Error fetching or processing resource:', error);
//       }
//   }
  
//   export async function fetchAndProcessResourceInline(content, type, element, parent) {
//     try {
//       const minifiedContent = minifyContent(content, type);
  
//       if (type === 'style') {
//         element.textContent = content;
//       } else if(type === 'script') {
//               await loadNewModuleInlinScript(parent, content)
//               // console.log("Head content: ", parent);
//               // Check if the script content contains the DOMContentLoaded event listener
//               var scriptContent = content;
  
//               // console.log('JESUS IS LORD FOREVER!');
      
//         // Simulate DOMContentLoaded event if the script content contains it
//         if (scriptContent.includes('DOMContentLoaded')) {
//         }
//               // element.textContent = scriptContent;
//       }
      
  
//       // preloadResource(element, type);
//     } catch (error) {
//       console.error('Error fetching or processing resource:', error);
//     }
//   }
  
//   function dispatchDOMContentLoaded() {
//           console.log('Dispatching DOMContentLoaded event');
//           var event = new Event('DOMContentLoaded');
//           document.dispatchEvent(event);
//           console.log('DOMContentLoaded event dispatched');
//   }
  
//   function removeDOMContentLoadedFromScript(scriptContent) {
//       // Regular expression to match the DOMContentLoaded event listener
//       const regex = /document\.addEventListener\('DOMContentLoaded',\s*function\s*\(\)\s*{\s*[^}]*}\);?/g;
      
//       // Remove the matched part from the script content
//       return scriptContent.replace(regex, '');
//   }
  
//   function minifyContent(content, type) {
//     // Implement minification logic based on resource type (CSS or JavaScript)
//     // Example: CSS minification
//     if (type === 'style') {
//       return content.replace(/\/\*[\s\S]*?\*\/|([^:]|^)\/\/.*$/gm, '').replace(/\s+/g, ' ').trim()
//       .replace(/\/\*[\s\S]*?\*\//g, '') // Remove CSS comments
//       .replace(/\s{2,}/g, ' '); // Replace multiple consecutive spaces with a single space
//     }
//     // Example: JavaScript minification
//     else if (type === 'script') {
//       return content.replace(/\/\*[\s\S]*?\*\/|([^:]|^)\/\/.*$/gm, '').replace(/\s+/g, ' ').trim()
//       .replace(/\/\/.*?\n|\/\*[\s\S]*?\*\//g, '');
//     }
//     return content;
//   }
  
//   function getMimeType(type) {
//     if (type === 'style') {
//       return 'text/css';
//     } else if (type === 'script') {
//       return 'application/javascript';
//     }
//     return '';
//   }
  
//   function preloadResource(element, asType) {
//     element.rel = 'stylesheet';
//     // element.as = asType;
//     // element.crossOrigin = 'anonymous'; // Set crossOrigin if needed
//     // element.async = true; // Add the async attribute
//     // Append the preload attribute to the element
//     // element.setAttribute('preload', 'true');
//   }
  
//   // Function to load the new script
//   export async function loadNewScript(newScriptSrc) {
//   try {
//       // Dynamically import the script as a module
//       await import(newScriptSrc);
//   } catch (error) {
//       console.error('Error loading script:', error);
//   }
//   }
  
//   export async function loadNewModuleInlinScript(element, newScriptContent) {
//   try {
//     // Execute the script content immediately without waiting for DOMContentLoaded
//     // executeScript(newScriptContent);
//     // Create a Blob containing the script content
//     const blob = new Blob([newScriptContent], { type: 'application/javascript' });;
//     // Create a URL for the Blob
//     const blobURL = URL.createObjectURL(blob);
  
//     // Create a new script element
//     const script = document.createElement('script');
//     script.textContent = newScriptContent;
  
//       // Add the defer flag
//       // script.defer = true;
  
//       // script.type = 'module';
  
//     // Get the last child of the head element
//     const lastChild = element.lastElementChild;
  
//     // Append the script element to the document's head
//     var doc = element.parentNode;
  
//       element.append(script);
  
//       // console.log("Element: ", element);
  
    
//     // Log success message
//     // console.log('Script executed successfully.');
  
//     // Log success message
//     // console.log('Script element appended to document head.', script);
  
//     // Return the created script element
//     return script;
//   } catch (error) {
//     console.error('Error loading module script:', error);
//     return null;
//   }
//   }
  
  
//   function executeScript(scriptContent) {
//   try {
//     // Evaluate the script content in the global scope
//     eval(scriptContent);
//     console.log('Script executed successfully.');
//   } catch (error) {
//     console.error('Error executing script:', error);
//   }
//   }
  
  
  
//   // Example usage:
//   // var newScriptSrc = './auths.js'; // Replace with the actual path to the new script file
  
//   // // Load the new script
//   // loadNewScript(newScriptSrc);
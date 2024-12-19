document.addEventListener("DOMContentLoaded", function () {
      var isLoading = false;
  
      // Enhance link navigation with a loading screen
      var linkElements = document.querySelectorAll("a");
      linkElements.forEach(function (link) {
          link.addEventListener("click", function (e) {
              e.preventDefault();
  
              if (!isLoading) {
                  isLoading = true;
  
                  // Show a loading screen
                  var loaderScreen = document.createElement("div");
                  loaderScreen.className = "loading-screen";
                  var loader = document.createElement("div");
                  loader.className = "loader";
                  loaderScreen.appendChild(loader);
                  document.body.appendChild(loaderScreen);
  
                  var destination = this.href;
  
                  // Simulate content loading with a delay
                  setTimeout(function () {
                      // Redirect to the destination URL
                      window.location.href = destination;
                  }, 1000);
              }
          });
      });
  
      // Handle the back button to restore previous content
      window.addEventListener("popstate", function (e) {
          if (!isLoading) {
              isLoading = true;
  
              // Show loading screen while navigating back
              var loaderScreen = document.createElement("div");
              loaderScreen.className = "loading-screen";
              var loader = document.createElement("div");
              loader.className = "loader";
              loaderScreen.appendChild(loader);
              document.body.appendChild(loaderScreen);
  
              var previousContent = e.state ? e.state.content : null;
              if (previousContent !== null) {
                  // Restore the previous content
                  document.body.innerHTML = previousContent;
  
                  isLoading = false;
              }
          }
      });
  });
  
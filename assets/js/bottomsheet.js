
document.addEventListener('DOMContentLoaded', async () => {
  const {
    loadTemplate,
    creativesheet,
    moremenusheet,
    postoptionsheet,
    commentsheet
  } = await import('./loadBottomsheet.js');

	// add_create button function
	const create_buttonbs = document.querySelector('.add_create');
  const moreMenubs =  document.querySelector('.container_header .right .more_menu');
  const postMoreOptionbs = document.querySelectorAll('.PC_footer_right .post_actions');
  const commentbs = document.querySelectorAll('.like_comment .post_actions .comment');
	const bottomSheet = document.querySelector('.go_app_event');
	const sheetContent = document.querySelector('.gae_bottomsheet');
	const sheetContentbody = sheetContent.querySelector('.gae_bottomsheet .body .gae_B_body');
	const theBody = document.querySelector('.theIframe');
	const sheetOverlay = bottomSheet.querySelector('.overlay_bottomsheet');
	const dragIcon = bottomSheet.querySelector('.gae_H_bar');

  console.log("Number of post", postMoreOptionbs.length);
  // Global variables for tracking drag events
  let isDragging = false, startY, startHeight;
  var actualSheetContentHeight;

  const showBottomSheet = (type) => {
    bottomSheet.classList.add("show");
    // theBody.classList.toggle("pane-opened");
    create_buttonbs.classList.toggle("close_gpe");

    var id = bottomSheet.getAttribute("data-id");
    var i = this;

    bottomSheet.classList.add("show");
    window.history.pushState({id:type}, null, "?active=" + "#" + type);
    window.addEventListener("popstate", hideBottomSheet);
    // console.log("BottomSheet actual height: ", getElementHeight(sheetContent));
    document.body.style.overflowY = "";
    actualSheetContentHeight = getElementHeight(sheetContent);
    // console.log("ac ", getElementHeight(sheetContent));

    updateSheetHeight(0);
  }

  const hideBottomSheet = () => {
    bottomSheet.classList.remove("show");
    document.body.style.overflowY = "initial";
    sheetContent.style.height = '';
    sheetContent.style.maxHeight = '';
    const url = new URL(window.location.href);
    url.search = '';
    url.hash = '';
    
    // Replace the state with the modified URL
    window.history.replaceState(null, null, url.toString());
  }

  // Add a check to ensure the 'popstate' event listener is only added once
  if (!window.__hideBottomSheetListenerAdded) {
    window.addEventListener("popstate", hideBottomSheet);
    window.__hideBottomSheetListenerAdded = true;
  }



  const updateSheetHeight = (height) => {
    if(height === 0)
    {
      sheetContent.style.height = `${updateSheetHeight(getElementHeight(sheetContent))}vh`;
      sheetContent.style.maxHeight = 'auto';
    }
    else
    {
      if(height >= 90)
      {
        sheetContent.style.height = `90vh`;
        sheetContent.style.maxHeight = `90vh`;
      }
      else
      {
        sheetContent.style.height = `${height}vh`;
        sheetContent.style.maxHeight = `${actualSheetContentHeight}vh`;
      }
    }
    sheetContent.classList.toggle("fullscreen", height === 100)
  }
  
  // Sets initial drag position and sheetcontent height
  const dragStart = (e) => {
    isDragging = true;
    startY = e.pageY || e.touches?.[0].pageY;
    startHeight = parseInt(sheetContent.style.height);
    bottomSheet.classList.add("dragging");
  }

  // Calculates the new height for the sheet content and call the updateSheetHeight function
  const dragging = (e) => {
    if(!isDragging) return;
    const delta = startY - (e.pageY || e.touches?.[0].pageY);
    const newHeight = startHeight + delta / window.innerHeight * 100;
    updateSheetHeight(newHeight);
    // console.log("Drag (newHEIGHT): ", newHeight);
  }

  // Determines whether to hide, set fullscreen or set default
  // height based on the current height of the sheet content

  const dragStop= () => {
    isDragging = false;
    bottomSheet.classList.remove("dragging");
    const sheetHeight = parseInt(sheetContent.style.height);
    var actualSheetContentHeightresized = (actualSheetContentHeight >= 90) ? 90 : actualSheetContentHeight;
    // console.log("sh", (actualSheetContentHeightresized / 2));
    if(sheetHeight < (actualSheetContentHeightresized / 2)) { 
      hideBottomSheet();
    }
    else if(sheetHeight >= (actualSheetContentHeightresized / 2) && sheetHeight < actualSheetContentHeight)
    {
      // console.log("Actual shetHeight", actualSheetContentHeight);
      updateSheetHeight(actualSheetContentHeight);
    }
    else if(sheetHeight >= 90)
    { 
      updateSheetHeight(100);
    }
  }

  dragIcon.addEventListener("mousedown", dragStart);
  document.addEventListener("mousemove", dragging);
  document.addEventListener("mouseup", dragStop);

  dragIcon.addEventListener("touchstart", dragStart);
  document.addEventListener("touchmove", dragging);
  document.addEventListener("touchend", dragStop);



 

  // Open BottomSheet
	create_buttonbs.addEventListener("click", function() {
    sheetContentbody.innerHTML = ''; // Clear the 'sheetcontent' div first, before adding the new content

    bottomSheet.classList.add('creativeSheetactive');

    // pass a flag into the addHCode code
    // addHCode("creativeSheet", "one");
    loadTemplate(creativesheet);

    showBottomSheet('creativeSheet');
  });

  moreMenubs.addEventListener("click", function() {
    sheetContentbody.innerHTML = ''; // Clear the 'sheetcontent' div first, before adding the new content

    bottomSheet.classList.add('moreMenuAppactive');

    // pass a flag into the addHCode code
    // addHCode("moremenuApp", "one");
    loadTemplate(moremenusheet);

    showBottomSheet('moremenuApp');
  });

  postMoreOptionbs.forEach(element => {
      element.addEventListener("click", function() {
        sheetContentbody.innerHTML = ''; // Clear the 'sheetcontent' div first, before adding the new content

        bottomSheet.classList.add('postoptionsactive');

        // pass a flag into the addHCode code
       // addHCode("postoption", "one");

        loadTemplate(postoptionsheet);

        showBottomSheet('postoptions');
      });
  });

  commentbs.forEach(element => {
    element.addEventListener("click", function() {
      sheetContentbody.innerHTML = ''; // Clear the 'sheetcontent' div first, before adding the new content

      bottomSheet.classList.add('commentSheet');

      // pass a flag into the addHCode code
      // addHCode("commentsheet", "one");
      loadTemplate(commentsheet);

      showBottomSheet('commentsheet');
    });
});

	sheetOverlay.addEventListener("click", hideBottomSheet);
  sheetOverlay.addEventListener('click', function() {
    // Set the URL without query parameters and fragment identifier
    hideBottomSheet();
  })

  // document.addEventListener('DOMContentLoaded', function() {
	// 	create_button.addEventListener('click', function()
  //   {
  //       // var id = $(".go_app_event").attr("data-id");


	// 	});
	// });

	function removeBottomSheet() {
		go_app_event.classList.remove("show");
	}

  function getElementHeight(element)
  {
    // Get the computed style of the element
    var computedStyle = window.getComputedStyle(element);

    // Get the computed height of the element in pixels
    var computedHeightPx = parseFloat(computedStyle.getPropertyValue('height')); // Parse to float to remove 'px'

    // Get the height of the viewport
    var viewportHeight = window.innerHeight;

    // Calculate the height of the element in vh
    var heightInVh = (computedHeightPx / viewportHeight) * 100;

    // console.log(heightInVh + 'vh'); // Output the result in vh units

    return heightInVh;
  }
  
  let addingCode;
  // Function to add Html code to the appropriate div according to the flag name selected
function addHCode(flag, step)
{

   // Create a temporary container element
   var tempContainer = document.createElement('div');
   // Set its innerHTML to the addingCode content
   tempContainer.innerHTML = addingCode;

   console.log("a:::: ", addingCode);

   // Append the children of the temporary container to the parent element
	 if(step === "one")
	 {
			while (tempContainer.firstChild) {
					sheetContentbody.appendChild(tempContainer.firstChild);
			}
	 }
}
});
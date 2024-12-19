const ell = document.querySelectorAll(".item");
const handlers = document.querySelectorAll(".handlers");
const rotateBall = document.querySelectorAll(".rotate_cirl");
let isResizing = false;
let currentResizer;
let prevX;
let prevY;
let zIndexCounter = 1; // Initial value for z-index

const typeableDiv = document.getElementById('typeable-div');

typeableDiv.onclick = function() {
        // Remove 'active' class from all elements when clicking outside
       let nxt = document.activeElement.nextElementSibling;
       console.log(nxt);
        // Remove 'active' class from all elements
        handlers.forEach(el => el.classList.remove('active'));
        nxt.classList.add('active');
}

function handleClick(event)
{
     // Remove 'active' class from all elements
     handlers.forEach(el => el.classList.remove('active'));

    // Add 'active' class to the clicked element
    event.currentTarget.classList.add('active');
    
    // Stop the event from propagating to the document click event
    event.stopPropagation();
}

// Attach the click event to each 'el' element
handlers.forEach(el => {
    el.onclick = handleClick;
});

// Handle clicks anywhere else in the document
ell.forEach(el => {
    el.onclick = function() {
        // Remove 'active' class from all elements when clicking outside
        // handlers.forEach(el => el.classList.remove('active'));
    };
});


// Rotate Item
let isDragging = false;
let previousMouseX = 0;
let rotationAngle = 0;

rotateBall.forEach(ball => {
    ball.addEventListener('mousedown', (event) => {
        isDragging = true;
        previousMouseX = event.clientX; // Store the initial mouse X position
    });
});

document.addEventListener('mousedown', (event) => {
    if(isDragging)
    {
        const currentMouseX = event.clientX;
        const deltaX = currentMouseX - previousMouseX;

        // Update the rotation angle based on mouse movement
        rotationAngle += deltaX;

        // Aply the rotation style to the item
        ell.forEach(el => {
            el.style.transform = `rotate(${rotationAngle}deg)`;
        });

        // Update previousMouseX to the current position
        previousMouseX = currentMouseX;
    }
});

document.addEventListener('mouseup', () => {
    isDragging = false; // Stop dragging when the mouse is released
});

for (let el of ell) {

    let elc = el.querySelector(".item-child");

    // Intialize height and width for item-child based on what type of item
    let itemType = elc.dataset.itemtype;

    switch(itemType) {
        case 'image':
            elc.style.height = "500px";
            elc.style.width = "350px";
            break;

        case 'text':
            elc.style.height = "auto";
            elc.style.width = "auto";
            elc.style.overflow = "hidden";
            elc.style.textAlign = "center";

            // Hide specific resizers
            ['.tm', '.bm'].forEach(seletor => {
                const element = el.querySelector(seletor);
                if(element) {
                    element.style.display = 'none';
                }
            });
            break;

        default:
            elc.style.height = "auto";
            elc.style.width = "auto";
    }

    el.style.zIndex = zIndexCounter++;
    el.addEventListener('mousedown', mousedown);

    function mousedown(e) {
        if (!e.target.classList.contains('resizer')) {
            window.addEventListener('mousemove', mousemove);
            window.addEventListener('mouseup', mouseup);

            el.style.zIndex = zIndexCounter++;

            prevX = e.clientX;
            prevY = e.clientY;

            function mousemove(e) {
                if (!isResizing) {
                    let newX = prevX - e.clientX;
                    let newY = prevY - e.clientY;
                    const rect = el.getBoundingClientRect();
                    el.style.left = rect.left - newX + "px";
                    el.style.top = rect.top - newY + "px";
                    prevX = e.clientX;
                    prevY = e.clientY;
                }
            }

            function mouseup() {
                window.removeEventListener('mousemove', mousemove);
                window.removeEventListener('mouseup', mouseup);
            }
        }
    }

    const resizers = el.querySelectorAll(".resizer");

    for (let resizer of resizers) {
        resizer.addEventListener('mousedown', mousedown);

        function mousedown(e) {
            currentResizer = e.target;
            isResizing = true;

            el.style.zIndex = zIndexCounter++;

            prevX = e.clientX;
            prevY = e.clientY;

            window.addEventListener('mousemove', mousemove);
            window.addEventListener('mouseup', mouseup);

            function mousemove(e) {
                const rect = el.getBoundingClientRect();
            
                if (currentResizer.classList.contains('se')) {
                    if(itemType === 'text') {
                        // For text: Adjust font size
                        let fontSize = window.getComputedStyle(elc, null).getPropertyValue('font-size');
                        let currentFontSize = parseFloat(fontSize);
                        elc.style.fontSize = (currentFontSize + (e.clientX - prevX) * 0.1) + "px";
                        // elc.style.transform = `scale(${}, ${})`
                    }
                    else {
                        elc.style.height = rect.height - (prevY - e.clientY) + "px";
                        elc.style.width = rect.width - (prevX - e.clientX) + "px";
                    }
                    
                    
                } 
                else if (currentResizer.classList.contains('sw')) {
                    if(itemType === 'text') {
                        // For text: Adjust font size
                        let fontSize = window.getComputedStyle(elc, null).getPropertyValue('font-size');
                        let currentFontSize = parseFloat(fontSize);
                        elc.style.fontSize = (currentFontSize + (prevX - e.clientX) * 0.1) + "px";
                    }
                    else {
                        elc.style.height = rect.height - (prevY - e.clientY) + "px";
                        elc.style.width = rect.width + (prevX - e.clientX) + "px";
                        el.style.left = rect.left - (prevX - e.clientX) + "px";
                    }
                } 
                else if (currentResizer.classList.contains('ne')) {
                    if(itemType === 'text') {
                        // For text: Adjust font size
                        let fontSize = window.getComputedStyle(elc, null).getPropertyValue('font-size');
                        let currentFontSize = parseFloat(fontSize);
                        elc.style.fontSize = (currentFontSize + (e.clientY - prevY) * 0.1) + "px";
                    }
                    else
                    {
                        elc.style.height = rect.height + (prevY - e.clientY) + "px";
                        elc.style.width = rect.width - (prevX - e.clientX) + "px";
                    }
                        el.style.top = rect.top - (prevY - e.clientY) + "px"; 
                    
                } 
                else if (currentResizer.classList.contains('nw')) {
                    if(itemType === 'text') {
                        // For text: Adjust font size
                        let fontSize = window.getComputedStyle(elc, null).getPropertyValue('font-size');
                        let currentFontSize = parseFloat(fontSize);
                        elc.style.fontSize = (currentFontSize + (prevY - e.clientY) * 0.1) + "px";
                    }
                    else
                    {
                        elc.style.height = rect.height + (prevY - e.clientY) + "px";
                        elc.style.width = rect.width + (prevX - e.clientX) + "px";
                    }
                        el.style.top = rect.top - (prevY - e.clientY) + "px";
                        el.style.left = rect.left - (prevX - e.clientX) + "px";
                    

                }
                else if (currentResizer.classList.contains('lm')) {
                    // For text: resizer
                    if(itemType === "text")
                    {
                        elc.style.height = "auto";
                    }
                    else {
                        // Reset the height adjustment and only modify width
                        elc.style.height = rect.height + "px";  // Maintain height
                    }
                    
                    elc.style.width = rect.width + (prevX - e.clientX) + "px";
                    el.style.left = rect.left - (prevX - e.clientX) + "px";
                } 
                else if (currentResizer.classList.contains('rm')) {
                    // For text: resizer
                    if(itemType === "text") {
                        elc.style.height = "auto";
                    }
                    else {
                        elc.style.height = rect.height + "px";  // Maintain height
                    }
                    elc.style.width = rect.width + (e.clientX - prevX) + "px";
                } 
                else if (currentResizer.classList.contains('tm')) {
                    // Reset the width adjustment and only modify height
                    elc.style.width = rect.width + "px";  // Maintain width
                    elc.style.height = rect.height + (prevY - e.clientY) + "px";
                    el.style.top = rect.top - (prevY - e.clientY) + "px";
                } 
                else if (currentResizer.classList.contains('bm')) {
                    elc.style.width = rect.width + "px";  // Maintain width
                    elc.style.height = rect.height + (e.clientY - prevY) + "px";
                }
            
                prevX = e.clientX;
                prevY = e.clientY;
            }
            

            function mouseup() {
                window.removeEventListener('mousemove', mousemove);
                window.removeEventListener('mouseup', mouseup);
                isResizing = false;
            }
        }
    }
}



const div = document.getElementById('typeable-div');
let content = '';
let cursorPosition = 0;
let selectedRange = { start: null, end: null };

div.textContent = "Heading";
content = "Heading";
div.style.fontFamily = "Helvetica, Arial";
div.style.fontSize = "32px";

// Create blinking cursor element
const cursor = document.createElement('span');
cursor.classList.add('blinking-cursor');
cursor.textContent = '|';

// Insert cursor initially
div.appendChild(cursor);

// Handle clicks on the div to make it focusable and move cursor
div.addEventListener('click', function (event) {
  div.focus();
  moveCursorToEnd();
});

// Move the cursor to the end
function moveCursorToEnd() {
  cursorPosition = content.length;
  updateDisplay();
}

// Handle keydown events
div.addEventListener('keydown', function (event) {
  event.preventDefault();
  const key = event.key;

  // Handle character input
  if (key.length === 1 && !event.ctrlKey && !event.metaKey) {
    insertTextAtCursor(key);
  } else if (key === 'Backspace') {
    handleBackspace();
  } else if (key === 'ArrowLeft') {
    handleArrowLeft(event);
  } else if (key === 'ArrowRight') {
    handleArrowRight(event);
  } else if (key === 'ArrowUp' || key === 'ArrowDown') {
    // Handle Up and Down (Optional: extend for line-based navigation)
  } else if (key === 'Enter') {
    insertTextAtCursor('\n');
  } else if (key === 'Delete') {
    handleDelete();
  } else if (event.ctrlKey && (key === 'ArrowLeft' || key === 'ArrowRight')) {
    handleCtrlArrow(key);
  }

  updateDisplay();
});

// Handle backspace key
function handleBackspace() {
  if (selectedRange.start !== null && selectedRange.end !== null) {
    deleteSelectedText();
  } else if (cursorPosition > 0) {
    content = content.slice(0, cursorPosition - 1) + content.slice(cursorPosition);
    cursorPosition--;
  }
}

// Handle arrow left key
function handleArrowLeft(event) {
  if (event.ctrlKey) {
    moveCursorToPreviousWord();
  } else {
    if (cursorPosition > 0) cursorPosition--;
  }
}

// Handle arrow right key
function handleArrowRight(event) {
  if (event.ctrlKey) {
    moveCursorToNextWord();
  } else {
    if (cursorPosition < content.length) cursorPosition++;
  }
}

// Handle delete key
function handleDelete() {
  if (selectedRange.start !== null && selectedRange.end !== null) {
    deleteSelectedText();
  } else if (cursorPosition < content.length) {
    content = content.slice(0, cursorPosition) + content.slice(cursorPosition + 1);
  }
}

// Handle Ctrl + Arrow keys (jumping between words)
function handleCtrlArrow(key) {
  if (key === 'ArrowLeft') {
    moveCursorToPreviousWord();
  } else if (key === 'ArrowRight') {
    moveCursorToNextWord();
  }
}

// Insert text at the cursor position
function insertTextAtCursor(text) {
  content = content.slice(0, cursorPosition) + text + content.slice(cursorPosition);
  cursorPosition += text.length;
  clearSelection(); // Clear any text selection
}

// Move cursor to the previous word
function moveCursorToPreviousWord() {
  const leftContent = content.slice(0, cursorPosition);
  const match = leftContent.match(/\b\w+$/);
  if (match) {
    cursorPosition -= match[0].length;
  }
}

// Move cursor to the next word
function moveCursorToNextWord() {
  const rightContent = content.slice(cursorPosition);
  const match = rightContent.match(/^\w+\b/);
  if (match) {
    cursorPosition += match[0].length;
  }
}

// Delete selected text
function deleteSelectedText() {
  const start = Math.min(selectedRange.start, selectedRange.end);
  const end = Math.max(selectedRange.start, selectedRange.end);
  content = content.slice(0, start) + content.slice(end);
  cursorPosition = start;
  clearSelection();
}

// Clear text selection
function clearSelection() {
  selectedRange.start = selectedRange.end = null;
}

// Update the displayed content and reposition cursor
function updateDisplay() {
  div.textContent = content;

  // Insert cursor at the current cursor position
  const beforeCursor = content.slice(0, cursorPosition);
  const afterCursor = content.slice(cursorPosition);

  div.innerHTML = beforeCursor + '<span class="blinking-cursor">|</span>' + afterCursor;
}
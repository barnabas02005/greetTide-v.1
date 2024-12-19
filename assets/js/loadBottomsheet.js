import {
  moremenusheet}
from '../../templates/moremenusheet.js';
import {creativesheet} from '../../templates/creativesheet.js';
import {postoptionsheet} from '../../templates/postoptionsheet.js';
import {commentsheet} from '../../templates/commentsheet.js';
// Function to load a specific templates
export async function loadTemplate(template) {
  const bottomSheetContent = document.querySelector('.gae_bottomsheet .body .gae_B_body');
  if (bottomSheetContent) {
    bottomSheetContent.innerHTML = template;
  }
}

export {moremenusheet, creativesheet, postoptionsheet, commentsheet};  // Re-export to ensure availability in index.html
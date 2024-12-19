import {verifymobilenomodal} from '../../templates/verifymobilenomodal.js';
import {cleaner} from '../../templates/cleaner.js';
// Function to load a specific templates
export async function loadTemplate(template) {
  const modalVariablesDiv = document.querySelector('.modal_variables');
  if (modalVariablesDiv) {
    modalVariablesDiv.innerHTML = template;
  }
}

export {verifymobilenomodal, cleaner};  // Re-export to ensure availability in index.html
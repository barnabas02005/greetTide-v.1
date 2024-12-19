const languageModalClick = document.querySelector('.LG_right_icon');
const languageModal = document.querySelector('.language_modal');
const closeLanguageModal = document.querySelector('.close_btn');

languageModalClick.addEventListener('click', function() {
  languageModal.classList.add('active');
});

closeLanguageModal.addEventListener('click', function() {
  languageModal.classList.remove('active');
});

window.addEventListener('click', function(o) {
  if(o.target == languageModal)
  {
    languageModal.classList.remove('active');
  }
});

window.addEventListener('keydown', function(r) {
    if(r.key === 'Escape')
    {
      languageModal.classList.remove('active');
    }
});
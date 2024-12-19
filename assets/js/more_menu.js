const moreMenu = document.querySelector('.container_header .right .more_menu');
const moreMenuSideBar = document.querySelector('.mm_content');
const mainContent = document.querySelector('.container_body');
const feedSuggestion = document.querySelector('.feed_suggestion');

const overlayContent = document.querySelector('.overlay_content');

const closeBtn = document.querySelector('.mmchl_back_btn');


moreMenu.addEventListener('click', function() {
  moreMenuSideBar.classList.add('active');
  mainContent.classList.add('allow_moremenu');
  feedSuggestion.classList.add('allow_moremenu');
  overlayContent.style.cursor = "pointer";
});

overlayContent.addEventListener('click', function() {
  moreMenuSideBar.classList.remove('active');
  mainContent.classList.remove('allow_moremenu');
  feedSuggestion.classList.remove('allow_moremenu');
});

// Close more menu
closeBtn.addEventListener('click', function() {
  moreMenuSideBar.classList.remove('active');
  mainContent.classList.remove('allow_moremenu');
  feedSuggestion.classList.remove('allow_moremenu');
  overlayContent.style.cursor = "pointer";
});

// moreMenu.addEventListener('click', () => {
//   Notification.requestPermission().then((result) => {
//     if (result === "granted")
//     {
//       randomNotification();
//     }
//   })
// });

// function randomNotification()
// {
//   const randomItem = Math.floor(Math.random() * games)
// }
alert("JESUS IS MY LORD FOREVER AND EVER, I STAY WITH HIM");
var pressTimer;
var elementMy = document.getElementById('myElement');
function startPress(event) {
  event.preventDefault();

  pressTimer = setTimeout(function () {
   elementMy.style.backgroundColor = "orangered";
   elementMy.style.transition = "all 0.8s ease-in-out";
  }, 1000);
}

function endPress() {
  clearTimeout(pressTimer);
  elementMy.style.backgroundColor = "blue";
}
const listVal = document.querySelector(".list-val");
const listValMenu = document.querySelector(".list-val-menu");
const toggle = document.querySelector(".updown-toggle");
toggle.addEventListener("click", function (event) {
  event.target.classList.toggle("fa-angle-up");
  event.target.classList.toggle("fa-angle-down");
  listValMenu.classList.toggle("active");
});

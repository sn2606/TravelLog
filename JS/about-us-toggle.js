function menuToggle() {
  var nav = document.getElementById('menu-overlay');
  nav.classList.toggle('active');
  var nav1 = document.getElementById('toggle');
  nav1.classList.toggle('active');
};

const toTop = document.querySelector(".toTop");
window.addEventListener("scroll", () => {
  if (window.pageYOffset > 300) {
    toTop.classList.add("active");
  } else {
    toTop.classList.remove("active");
  }
})

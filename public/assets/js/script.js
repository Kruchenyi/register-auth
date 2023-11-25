let links = document.querySelectorAll(".nav-link");
for (let link of links) {
  if (link.href === window.location.href) {
    link.classList.add("active");
  }
}
let homeLink = document.querySelector(".navbar-brand");
if (homeLink.href === window.location.href) {
  homeLink.style = "color:white";
} else {
  homeLink.style = "color:rgba(255, 255, 255, 0.55)";
}

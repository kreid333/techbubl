const hamburger = document.querySelector(".nav__hamburger");
const mobileMenu = document.querySelector(".mobile-menu");
const body = document.querySelector("body");
const deletePostBtn = document.querySelectorAll(".delete-btn");
const modal = document.querySelector(".modal");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("nav__hamburger--active");
  mobileMenu.classList.toggle("mobile-menu--active");

  if (
    hamburger.classList.contains("nav__hamburger--active") &&
    mobileMenu.classList.contains("mobile-menu--active")
  ) {
    body.style.position = "fixed";
  } else {
    body.removeAttribute("style");
  }
});

url = new URL(window.location.href);
if (url.searchParams.has("id") && window.location.href.includes("/admin/deleteeditor")) {
  modal.classList.add("modal--active");
  body.style.position = "fixed";
}

window.addEventListener("resize", () => {
  if (window.innerWidth >= 768) {
    hamburger.classList.remove("nav__hamburger--active");
    mobileMenu.classList.remove("mobile-menu--active");

    if (
      body.hasAttribute("style") &&
      !modal.classList.contains("modal--active")
    ) {
      body.removeAttribute("style");
    }
  }
});

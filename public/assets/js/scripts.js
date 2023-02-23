const hamburger = document.querySelector(".nav__hamburger");
const mobileMenu = document.querySelector(".mobile-menu");
const body = document.querySelector("body");
const deletePostBtn = document.querySelectorAll(".delete-btn");
const modal = document.querySelector(".modal");
const searchModal = document.querySelector(".search-modal");
const searchModalInput = document.querySelector(".search-modal__card .nav-search input");
const searchModalClose = document.querySelector(".search-modal__close");
const navSearchBtn = document.querySelector(".nav__search-btn");

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

if (url.searchParams.has("id") && window.location.href.includes("/admin/deletepost")) {
  modal.classList.add("modal--active");
  body.style.position = "fixed";
}

if (url.searchParams.has("id") && window.location.href.includes("/admin/deletecategory")) {
  modal.classList.add("modal--active");
  body.style.position = "fixed";
}

window.addEventListener("resize", () => {
  if (window.innerWidth >= 768) {
    hamburger.classList.remove("nav__hamburger--active");
    mobileMenu.classList.remove("mobile-menu--active");
    searchModal.classList.remove("search-modal--active");

    if (
      body.hasAttribute("style") &&
      !modal.classList.contains("modal--active") &&
      !searchModal.classList.contains("search-modal--active")
    ) {
      body.removeAttribute("style");
    }
  }
});

navSearchBtn.addEventListener("click", () => {
  searchModal.classList.add("search-modal--active");
  body.style.position = "fixed";
  searchModalInput.focus();
});

searchModalClose.addEventListener("click", () => {
  searchModal.classList.remove("search-modal--active");
  body.removeAttribute("style");
})

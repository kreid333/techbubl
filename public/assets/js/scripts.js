const hamburger = document.querySelector(".nav__hamburger");
const mobileMenu = document.querySelector(".mobile-menu");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("nav__hamburger--active");
    mobileMenu.classList.toggle("mobile-menu--active");
})
window.addEventListener("resize", () => {
    if (window.innerWidth >= 768) {
        hamburger.classList.remove("nav__hamburger--active");
        mobileMenu.classList.remove("mobile-menu--active");
    }
});
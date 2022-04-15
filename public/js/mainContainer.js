/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/mainContainer.js ***!
  \***************************************/
// ==============Function for navbar==================
var subNavbarContainer = document.querySelector(".sub-navbar-container");
var mainContainer = document.querySelector(".main-container");
var navbarContainer = document.querySelector(".navbar-container");
var dropdownList = document.querySelector(".dropdown-list");
var logoList = document.querySelector(".logo-list");
var attribute = document.querySelector(".attribute");
var height;
window.addEventListener("scroll", function () {
  logoList.classList.remove("show");
  dropdownList.classList.remove("show");
  var navHeight = window.scrollY;

  if (height > navHeight) {
    subNavbarContainer.classList.remove("stick");
    navbarContainer.classList.remove("stick");
    attribute.classList.remove("hide");
  } else {
    subNavbarContainer.classList.add("stick");
    navbarContainer.classList.add("stick");
    attribute.classList.add("hide");
  }

  height = window.scrollY;
}); // ===============Function for slider==================

var smallImg = document.querySelector(".small-img-container");
var scrollPerClick = 3 * smallImg.clientWidth + 10;
var slideRow = document.querySelectorAll(".slides-row");
slideRow.forEach(function (row) {
  var scrollAmount = 0;
  var slides = row.querySelector(".slides");
  var switchLeft = row.querySelector(".switch-left");
  var switchRight = row.querySelector(".switch-right");
  var allslides = slides.querySelectorAll(".small-img-container");
  var slideLength = allslides.length * smallImg.clientWidth + 5;
  switchLeft.addEventListener("click", function () {
    slides.scrollTo({
      bottom: 0,
      left: scrollAmount -= scrollPerClick,
      behavior: "smooth"
    });

    if (scrollAmount < 0) {
      scrollAmount = 0;
      switchLeft.classList.remove("show");
    }
  });
  switchRight.addEventListener("click", function () {
    slides.scrollTo({
      bottom: 0,
      left: scrollAmount += scrollPerClick,
      behavior: "smooth"
    });

    if (scrollAmount > slideLength) {
      scrollAmount = slideLength;
    }

    console.log(scrollAmount);

    if (scrollAmount > 0) {
      switchLeft.classList.add("show");
    }
  });
});
/******/ })()
;
/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/navbar.js ***!
  \********************************/
var dropdownBtn = document.querySelector(".dropdown-btn");
var dropdownList = document.querySelector(".dropdown-list");
dropdownBtn.addEventListener("click", function () {
  dropdownList.classList.toggle("show");
  logoList.classList.remove("show");
});
var logoImg = document.querySelector(".logo-img");
var logoList = document.querySelector(".logo-list");
logoImg.addEventListener("click", function () {
  logoList.classList.toggle("show");
  dropdownList.classList.remove("show");
});
var searchInput = document.querySelector(".search-input");
var searchBtn = document.querySelector(".search-btn");
var formSearch = document.querySelector(".search-container");
searchInput.addEventListener("input", function (e) {
  e.preventDefault();
  searchBtn.style.zIndex = 5;
  searchBtn.style.color = "white";
});
searchBtn.addEventListener("click", function () {
  searchBtn.style.zIndex = 0;
});
/******/ })()
;
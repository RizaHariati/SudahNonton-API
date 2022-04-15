const dropdownBtn = document.querySelector(".dropdown-btn");
const dropdownList = document.querySelector(".dropdown-list");

dropdownBtn.addEventListener("click", () => {
    dropdownList.classList.toggle("show");
    logoList.classList.remove("show");
});

const logoImg = document.querySelector(".logo-img");
const logoList = document.querySelector(".logo-list");

logoImg.addEventListener("click", () => {
    logoList.classList.toggle("show");
    dropdownList.classList.remove("show");
});

const searchInput = document.querySelector(".search-input");
const searchBtn = document.querySelector(".search-btn");
const formSearch = document.querySelector(".search-container");
searchInput.addEventListener("input", (e) => {
    e.preventDefault();
    searchBtn.style.zIndex = 5;
    searchBtn.style.color = "white";
});

searchBtn.addEventListener("click", () => {
    searchBtn.style.zIndex = 0;
});


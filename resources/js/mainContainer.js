// ==============Function for navbar==================

const subNavbarContainer = document.querySelector(".sub-navbar-container");
const mainContainer = document.querySelector(".main-container");
const navbarContainer = document.querySelector(".navbar-container");
const dropdownList = document.querySelector(".dropdown-list");
const logoList = document.querySelector(".logo-list");
const attribute = document.querySelector(".attribute");

let height;
window.addEventListener("scroll", () => {
    logoList.classList.remove("show");
    dropdownList.classList.remove("show");
    let navHeight = window.scrollY;

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
});

// ===============Function for slider==================

const smallImg = document.querySelector(".small-img-container");
const scrollPerClick = 3 * smallImg.clientWidth + 10;

const slideRow = document.querySelectorAll(".slides-row");
slideRow.forEach((row) => {
    let scrollAmount = 0;

    const slides = row.querySelector(".slides");
    const switchLeft = row.querySelector(".switch-left");
    const switchRight = row.querySelector(".switch-right");
    const allslides = slides.querySelectorAll(".small-img-container");
    const slideLength = allslides.length * smallImg.clientWidth + 5;

    switchLeft.addEventListener("click", () => {
        slides.scrollTo({
            bottom: 0,
            left: (scrollAmount -= scrollPerClick),
            behavior: "smooth",
        });
        if (scrollAmount < 0) {
            scrollAmount = 0;
            switchLeft.classList.remove("show");
        }
    });

    switchRight.addEventListener("click", () => {
        
        slides.scrollTo({
            bottom: 0,
            left: (scrollAmount += scrollPerClick),
            behavior: "smooth",
          
        }); 
        if (scrollAmount > slideLength ) {
            scrollAmount = slideLength;
        }
         console.log(scrollAmount);
        if (scrollAmount > 0) {
            switchLeft.classList.add("show");
        }
    });
});

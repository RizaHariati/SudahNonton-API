// ==============Function for navbar==================

const subNavbarContainer = document.querySelector(".sub-navbar-container");
const mainContainer = document.querySelector(".main-container");
const navbarContainer = document.querySelector(".navbar-container");

let height;
window.addEventListener("scroll", () => {
    let navHeight = window.scrollY;

    if (height > navHeight) {
        subNavbarContainer.classList.remove("stick");
        navbarContainer.classList.remove("stick");
    } else {
        subNavbarContainer.classList.add("stick");
        navbarContainer.classList.add("stick");
    }

    height = window.scrollY;
});

// ===============Function for slider==================

const smallImg = document.querySelector(".small-img-container");
const slides = document.querySelector(".slides");
const switchLeft = document.querySelector(".switch-left");
const switchRight = document.querySelector(".switch-right");
const scrollPerClick = smallImg.clientWidth + 10;

let scrollAmount = 0;

switchRight.addEventListener("click", clickRight);
switchLeft.addEventListener("click", clickLeft);
function clickLeft() {
    slides.scrollTo({
        top: 0,
        left: (scrollAmount -= scrollPerClick),
        behavior: "smooth",
    });
    if (scrollAmount < 0) {
        scrollAmount = 0;
        switchLeft.classList.remove("show");
    }
}

function clickRight() {
    if (scrollAmount <= slides.scrollWidth - slides.clientWidth) {
        slides.scrollTo({
            top: 0,
            left: (scrollAmount += scrollPerClick),
            behavior: "smooth",
        });
    }
    if (scrollAmount > 0) {
        switchLeft.classList.add("show");
    }
}

// ===============Function for grabbing==================

const slideRow = document.querySelector(".slider");
let pressing = false;
let startX;
let x;

slideRow.addEventListener("mousedown", (e) => {
    pressing = true;
    startX = e.offsetX - slides.offsetLeft;
    slideRow.style.cursor = "grabbing";
});

slideRow.addEventListener("mouseenter", () => {
    slideRow.style.cursor = "grab";
});

slideRow.addEventListener("mouseup", () => {
    slideRow.style.cursor = "grab";
});

window.addEventListener("mouseup", () => {
    pressing = false;
});

slideRow.addEventListener("mousemove", (e) => {
    console.log(e.offsetX);
    e.preventDefault();
    if (!pressing) return;
    else {
        x = e.offsetX;
        slides.style.left = `${x - startX}px`;
      //   checkboundary();
    }
});

function checkboundary() {
    let outer = slideRow.getBoundingClientRect();
    let inner = slides.getBoundingClientRect();

    if (parseInt(slides.style.left) > 0) {
        slides.style.left = "0px";
    } else if (inner.right < outer.right) {
        slides.style.left = "0px";
    }
}

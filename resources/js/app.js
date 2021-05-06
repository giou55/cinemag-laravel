require("./bootstrap");

// change colors when mouseover on svg
var svgDiv = document.querySelector(".arrow-svg");
var svgText = document.querySelector(".desktop-feed-arrow-text-fill");
var svgMain = document.querySelector(".desktop-feed-arrow-main-fill");
var svgBg = document.querySelector(".desktop-feed-arrow-background-fill");

if (svgDiv) {
    svgDiv.addEventListener("mouseover", changeColor);
    svgDiv.addEventListener("mouseout", resetColor);
}

function changeColor() {
    svgText.style.fill = "white";
    svgMain.style.fill = "black";
    svgBg.style.fill = "#00bff3";
}

function resetColor() {
    svgText.style.fill = "black";
    svgMain.style.fill = "#00bff3";
    svgBg.style.fill = "black";
}

// toggle menu popup when button clicked
var openMenuBtn = document.querySelector(".open-menu");
var closeMenuBtn = document.querySelector(".close-menu");
var menuContent = document.querySelector(".menu-content");
var app = document.querySelector("#app");

openMenuBtn.addEventListener("click", openMenu);
closeMenuBtn.addEventListener("click", closeMenu);

window.addEventListener("click", function (event) {
    if (event.target == app) {
        menuContent.style.display = "none";
    }
});

// var app = document.getElementById("app");

// window.onclick = function (event) {
//     if (event.target == app) {
//         menuContent.style.display = "none";
//     }
// };

function openMenu() {
    menuContent.style.display = "block";
}
function closeMenu() {
    menuContent.style.display = "none";
}


// toggle search popup when button clicked
var openSearchBtn = document.querySelector(".open-search");
var closeSearchBtn = document.querySelector(".close-search");
var searchContainer = document.querySelector(".search-container");
var app = document.querySelector("#app");

openSearchBtn.addEventListener("click", openSearch);
closeSearchBtn.addEventListener("click", closeSearch);

window.addEventListener("click", function (event) {
    if (event.target == app) {
        searchContainer.style.display = "none";
    }
});

// var app = document.getElementById("app");

// window.onclick = function (event) {
//     if (event.target == app) {
//         menuContent.style.display = "none";
//     }
// };


function openSearch() {
    searchContainer.style.display = "block";
}
function closeSearch() {
    searchContainer.style.display = "none";
}


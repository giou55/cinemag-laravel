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

// toggle popup menu when button clicked
var openBtn = document.querySelector(".open-button");
var closeBtn = document.querySelector(".close-button");
var menuContent = document.querySelector(".menu-content");

openBtn.addEventListener("click", openMenu);
closeBtn.addEventListener("click", closeMenu);

// document.addEventListener("click", function () {
//         menuContent.style.display = "none";
//     }
// );

// var menu = ocument.querySelector(".menu"); 
// window.onclick = function (event) {
//     if (event.target == menu) {
//         menuContent.style.display = "none";
//     }
// };


function openMenu() {
    menuContent.style.display = "block";
}

function closeMenu() {
    menuContent.style.display = "none";
}

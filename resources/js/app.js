require("./bootstrap");

var svgDiv = document.querySelector(".arrow-svg");
var svgText = document.querySelector(".desktop-feed-arrow-text-fill");
var svgMain = document.querySelector(".desktop-feed-arrow-main-fill");
var svgBg = document.querySelector(".desktop-feed-arrow-background-fill");

svgDiv.addEventListener("mouseover", changeColor);
svgDiv.addEventListener("mouseout", resetColor);

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

// var openBtn = document.querySelectorAll(".open-button");
// var closeBtn = document.querySelector(".close-button");
var menuContent = document.querySelector(".menu-content");

// openBtn.addEventListener("click", openMenu);
// closeBtn.addEventListener("click", closeMenu);

// for (var i = 0; i < openBtn.length; i++) {
//     openBtn[i].addEventListener("click", openMenu);
// }

// for (var i = 0; i < closeBtn.length; i++) {
//     closeBtn[i].addEventListener("click", closeMenu);
// }

document.querySelectorAll(".open-button").forEach((item) => {
    item.addEventListener("click", openMenu);
});

document.querySelectorAll(".close-button").forEach((item) => {
    item.addEventListener("click", closeMenu);
});

function openMenu() {
    // menuContent.style.display = "block";
    document.querySelectorAll(".menu-content").forEach((item) => {
        item.style.display = "block";
    });
}

function closeMenu() {
    // menuContent.style.display = "none";
    document.querySelectorAll(".menu-content").forEach((item) => {
        item.style.display = "none";
    });
}

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

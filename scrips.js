let slideIndex = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function showSlides() {
    slides.forEach((slide, index) => {
        slide.style.display = 'none';
    });

    slideIndex++;
    if (slideIndex > totalSlides) {slideIndex = 1}

    slides[slideIndex-1].style.display = 'block';
    setTimeout(showSlides, 3000); // Change image every 3 seconds
}

showSlides();
function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
}

function openRightNav() {
    document.getElementById("rightSidebar").style.width = "250px";
}

function closeRightNav() {
    document.getElementById("rightSidebar").style.width = "0";
}
function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
}

function openRightNav() {
    document.getElementById("rightSidebar").style.width = "250px";
}

function closeRightNav() {
    document.getElementById("rightSidebar").style.width = "0";
}

// Progress Bar Animation
document.addEventListener("DOMContentLoaded", function() {
    var progressBar = document.querySelector(".progress-bar .progress");
    var progressPercentage = 50; // Example progress percentage
    progressBar.style.width = progressPercentage + "%";
});

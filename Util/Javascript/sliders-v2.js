// -- Top Slider du debut page --
const slides = document.querySelectorAll(".Slide");
let current = 0;
function showSlide(index) {
slides.forEach((slide, i) => {
slide.classList.toggle("active", i === index);
const borders = slide.querySelectorAll(".border");
borders.forEach((b, j) => {
b.classList.toggle("active", i === index && j === index);
}); });
current = index;
}
// -- Time To slide betwen eatch --
setInterval(() => {
let next = (current + 1) % slides.length;
showSlide(next);
}, 5000);
// -- utilisable slider direct du buttons --
slides.forEach((slide, index) => {
const borders = slide.querySelectorAll(".border");
borders.forEach((border, bIndex) => {
border.addEventListener("click", () => {
showSlide(bIndex);
}); });
showSlide(current);
});

// Partenaria slider
const track = document.getElementById("logosTrack");
const leftBtn = document.getElementById("leftBtn");
const rightBtn = document.getElementById("rightBtn");
if (track && leftBtn && rightBtn) {
// visibilité logo + largeur
const visibleCount = 6;
const logoWidth = 100;
let currentIndex = 0;
const totalLogos = track.children.length;
const maxIndex = totalLogos - visibleCount;
function updateSlide() {
const offset = currentIndex * logoWidth;
track.style.transform = `translateX(-${offset}px)`;
}
// gestion clic gauche
leftBtn.addEventListener("click", () => {
if (currentIndex > 0) {
currentIndex--;
} else {
currentIndex = maxIndex;
}
updateSlide();
});
// gestion clic droite
rightBtn.addEventListener("click", () => {
if (currentIndex < maxIndex) {
currentIndex++;
} else {
currentIndex = 0;
}
updateSlide();
});
}
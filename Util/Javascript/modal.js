// No letter will be allowed
const priceInput = document.getElementById('Price');
priceInput.addEventListener('input', () => {
// Remove any character that is not a digit
priceInput.value = priceInput.value.replace(/\D/g, '');
});


// open/close box
const personToggle = document.getElementById("personToggle");
const personBox = document.getElementById("personBox");
personToggle.addEventListener("click", () => {
personBox.style.display = personBox.style.display === "none" ? "block" : "none";
});
function closePersonBox() {
personBox.style.display = "none";
}

// change counters
function changeCount(type, delta) {
const span = document.getElementById(type);
let value = parseInt(span.textContent) + delta;

// set limits
if (type === "adult") {
if (value < 1) value = 1;   // minimum 1 adult
if (value > 6) value = 6;   // maximum 6 adults
} else if (type === "child") {
if (value < 0) value = 0;   // minimum 0 children
if (value > 4) value = 4;   // maximum 4 children
}
span.textContent = value;

// update hidden inputs
if (type === "adult") {
document.getElementById("adulteInput").value = value;
} else {
document.getElementById("enfantInput").value = value;
}

// update button text 👤
const adult = document.getElementById("adult").textContent;
const child = document.getElementById("child").textContent;
personToggle.textContent = `👤 ${adult} Adulte(s), ${child} Enfant(s)`;
}

// fermer si on clique en dehors du box
document.addEventListener("click", function(e) {
if (!personBox.contains(e.target) && !personToggle.contains(e.target)) {
personBox.style.display = "none";
}
});
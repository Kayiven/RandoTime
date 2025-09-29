// Redact pages
const items = {
"acceuil": "../../Seassion/Inscrit/Home.php",
"apropos": "../../Seassion/Inscrit/About.php",
"destination": "../../Seassion/Inscrit/Destination.php",
"evenements": "#",
"galarie": "../../Seassion/Inscrit/Picture.php",
"contact": "../../Seassion/Inscrit/Support.php",
"faq": "../../Seassion/Inscrit/Question.php",
};

const input = document.getElementById("searchInput");
const suggestionsBox = document.getElementById("suggestions");

// Show suggestions
input.addEventListener("input", () => {
const value = input.value.toLowerCase().trim();
suggestionsBox.innerHTML = "";
if (!value) {
suggestionsBox.style.display = "none";
return;
}

const matches = Object.keys(items).filter(k =>
k.includes(value));

if (matches.length === 0) {
suggestionsBox.style.display = "none";
return;
}

matches.forEach(k => {
const div = document.createElement("div");
div.textContent = k;
div.onclick = () => {
window.location.href = items[k];
};
suggestionsBox.appendChild(div);
});
suggestionsBox.style.display = "block";
});

// Enter to open
input.addEventListener("keydown", (event) => {
if (event.key === "Enter") {
const value = input.value.toLowerCase().trim();
if (items[value]) {
window.location.href = items[value];
} else {
alert("❌ Page ' " + input.value + " ' does not exist.");}
}});

// Hide when clicking outside
document.addEventListener("click", (e) => {
if (!e.target.closest(".search-box")) {
suggestionsBox.style.display = "none";
}});




// Dropdown On click
function more(){
//Calling the target from id
const box = document.getElementById("box-flexplus");
const textTrigger = document.getElementById("More");
//Show the box invisible
textTrigger.addEventListener("click", function (event) {
box.style.display = "flex";
event.stopPropagation(); 
});
// Keep open same box invisible when click inside
box.addEventListener("click", function (event) {
event.stopPropagation();
});
// Close Box invisible when click outiside
document.addEventListener("click", function () {
box.style.display = "none";
});
}

// Custom selector Extension
document.querySelectorAll('.custom-select').forEach(select => {
const selected = select.querySelector('.selected');
const options = select.querySelector('.options');
const emailInput = select.parentElement.querySelector('input[name="register-email"]');
const fullEmailInput = select.parentElement.querySelector('#register-full-email');

// toggle dropdown
selected.addEventListener('click', () => {
options.style.display = options.style.display === 'block' ? 'none' : 'block';
});

// choose an option
options.querySelectorAll('div').forEach(option => {
option.addEventListener('click', () => {
const val = option.dataset.value;
selected.textContent = option.textContent;        // show selection
selected.dataset.value = val;                     // store selected domain
fullEmailInput.value = emailInput.value + val;    // combine email + domain
options.style.display = 'none';
}); });

// update hidden input while typing
emailInput.addEventListener('input', () => {
fullEmailInput.value = emailInput.value + selected.dataset.value;
});

// close if click outside
document.addEventListener('click', e => {
if (!select.contains(e.target)) options.style.display = 'none';
}); });
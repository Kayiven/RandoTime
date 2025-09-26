
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

// collect your dropdowns
const dropdowns = [
{ trigger: "seasion-compte3", box: "seasion-op" },
{ trigger: "More", box: "box-flexplus" }];

// function to close all dropdowns
function closeAll(except = null) {
dropdowns.forEach(d => {
const box = document.getElementById(d.box);
if (box && box !== except) box.style.display = "none";
});}

// setup dropdowns
dropdowns.forEach(d => {
const trigger = document.getElementById(d.trigger);
const box = document.getElementById(d.box);
if (!trigger || !box) return;

// click trigger → toggle its box
trigger.onclick = function(e) {
e.stopPropagation();
if (box.style.display === "block") {
box.style.display = "none";
} else {
closeAll(box); // close others
box.style.display = "block";
}};

// click inside box → don’t close
box.onclick = function(e) { e.stopPropagation(); }
});

// click outside → close all
document.onclick = function() { closeAll(); }
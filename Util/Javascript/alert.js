// Faire disparaître après 5 secondes
document.querySelectorAll('.Failed.show, .success.show').forEach(el => {
setTimeout(() => {
el.classList.remove('show');
}, 5000);
});
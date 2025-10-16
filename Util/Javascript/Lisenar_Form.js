// gérer les formulaires d’édition
document.querySelectorAll('.edit-btn').forEach(btn => {
btn.addEventListener('click', () => {
const field = btn.dataset.field;
document.getElementById('form_' + field).style.display = 'inline';
btn.style.display = 'none';
document.getElementById('text_' + field).style.display = 'none';
}); });

document.querySelectorAll('.cancel-btn').forEach(btn => {
btn.addEventListener('click', () => {
const form = btn.closest('.edit-form');
const field = form.id.replace('form_', '');
form.style.display = 'none';
document.querySelector('[data-field="' + field + '"]').style.display = 'inline';
document.getElementById('text_' + field).style.display = 'inline';
}); });

setTimeout(() => {
const msg = document.getElementById('update-msg');
if (msg) {
msg.style.transition = 'opacity 0.5s';
msg.style.opacity = '0';
setTimeout(() => msg.remove(), 500);
}}, 5000); // 5 second
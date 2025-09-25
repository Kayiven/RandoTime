// Card Filp
function flipCard(card) {
card.classList.remove('flipped');
// Trigger reflow to restart animation
void card.offsetWidth;
card.classList.add('flipped');
}

// Input Animation
const inputs = document.querySelectorAll('input');
inputs.forEach(input => {
// Trigger when click or type inside
input.addEventListener('focus', () => input.classList.add('active'));
document.addEventListener('click', (e) => {
// If nathing type box will close
if (!input.contains(e.target) && input.value === '') {
input.classList.remove('active');
}});
});

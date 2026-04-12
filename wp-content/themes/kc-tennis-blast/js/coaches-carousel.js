document.addEventListener('DOMContentLoaded', function() {
const slides = document.querySelectorAll('.coach-slide');
const thumbs = document.querySelectorAll('.coach-thumb');
let currentIndex = 0;
let autoPlayInterval;
// Failsafe: if the blocks aren't on this page, stop running to prevent errors.
if(slides.length === 0 || thumbs.length === 0) return;
// Core function: Hides all, shows target
function showSlide(index) {
slides.forEach(slide => slide.classList.remove('active'));
thumbs.forEach(thumb => thumb.classList.remove('active'));
slides[index].classList.add('active');
thumbs[index].classList.add('active');
currentIndex = index;
}
// Initialize: Show the first coach immediately
showSlide(0);
// Click functionality for thumbnails
thumbs.forEach((thumb, index) => {
thumb.addEventListener('click', () => {
showSlide(index);
resetAutoPlay(); // Pause the timer if the user takes control
});
});
// Auto-play timer (Cycles every 4 seconds)
function startAutoPlay() {
autoPlayInterval = setInterval(() => {
let nextIndex = (currentIndex + 1) % slides.length;
showSlide(nextIndex);
}, 4000);
}
// Resets the timer
function resetAutoPlay() {
clearInterval(autoPlayInterval);
startAutoPlay();
}
// Start the engine
startAutoPlay();
});
3

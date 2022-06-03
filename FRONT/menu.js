const toggle = document.querySelector('.toggle');
const toggle2 = document.querySelector('.toggle2');
const links = document.querySelector('.links');
const card = document.querySelector('.cardView');

toggle.addEventListener('click', () => {
    toggle.classList.toggle('rotate')
    links.classList.toggle('active')
    card.classList.toggle('blur')
});

toggle2.addEventListener('click', () => {
    toggle2.classList.toggle('rotate')
    links.classList.toggle('active')
    card.classList.toggle('blur')
});
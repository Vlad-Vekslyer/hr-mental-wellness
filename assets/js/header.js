const hamburgerBtn = document.querySelector('.hamburger');
const closeBtn = document.querySelector('.mobile-sitenav > button');
const mobileNav = document.querySelector('.mobile-sitenav');

hamburgerBtn.addEventListener('click', () => mobileNav.classList.add('show'));
closeBtn.addEventListener('click', () => mobileNav.classList.remove('show'));

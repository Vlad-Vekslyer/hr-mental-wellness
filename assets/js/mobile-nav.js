// Toggle mobile nav menu visibility at the touch of the hamburger bar
const hamburgerBtn = document.querySelector('.hamburger');
const closeBtn = document.querySelector('.mobile-sitenav > button');
const mobileNav = document.querySelector('.mobile-sitenav');

hamburgerBtn.addEventListener('click', () => mobileNav.classList.add('show'));
closeBtn.addEventListener('click', () => mobileNav.classList.remove('show'));

// Toggle sub-menu visibility inside of the mobile nav menu
const nestedLinks = document.querySelectorAll('.mobile-menu > .menu-item-has-children > a');

for(let i = 0; i < nestedLinks.length; i++) {
  nestedLinks.item(i).addEventListener('click', function(event) {
    event.preventDefault();
    const siblings = Array.from(this.parentElement.children);
    const currentSubMenu = document.querySelector('.sub-menu.show');
    if(currentSubMenu) currentSubMenu.classList.remove('show');
    const subMenu = siblings.find(sibling => sibling.nodeName === 'UL' && sibling.classList.contains('sub-menu'));
    subMenu.classList.add('show');
  })
}

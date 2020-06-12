// Toggle mobile nav menu visibility at the touch of the hamburger bar
const hamburgerBtn = document.querySelector('.hamburger');
const closeBtn = document.querySelector('.mobile-sitenav > button');
const mobileNav = document.querySelector('.mobile-sitenav');

hamburgerBtn.addEventListener('click', () => mobileNav.classList.add('show'));
closeBtn.addEventListener('click', () => mobileNav.classList.remove('show'));

// Toggle sub-menu visibility inside of the mobile nav menu
const nestedLinks = document.querySelectorAll('.mobile-menu > .menu-item-has-children');

for(let i = 0; i < nestedLinks.length; i++) {
  nestedLinks.item(i).addEventListener('click', function(event) {
    event.preventDefault();
    const children = Array.from(this.children);
    const currentSubMenu = document.querySelector('.sub-menu.show');
    if(currentSubMenu) currentSubMenu.classList.remove('show');
    const subMenu = children.find(child => child.nodeName === 'UL' && child.classList.contains('sub-menu'));
    subMenu.classList.add('show');
  })
}

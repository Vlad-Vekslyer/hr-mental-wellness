// ************************
// FUNCTIONS
// ************************

// splits an HTML collection into groups of elements in separate divs
// @elements is the HTML collection
// @limit is the max number of elemnts per group
function splitToDivs(elements, limit) {
  const splitDivs = Array.from(elements).reduce((acc, element, idx) => {
    if(idx % limit === 0 || idx === 0) {
      const div = document.createElement('DIV');
      div.id = `slide-${acc.length}`
      div.appendChild(element);
      return [...acc, div];
    } else {
      acc[acc.length - 1].appendChild(element);
      return acc;
    }
  }, []);
  return splitDivs;
}

// sets the class of all elements in a slider depending on which element is the active element
function setClasses(activeElem, allElems) {
  const activeNum = parseInt(activeElem.id.slice(-1));
  // remove next and prev class from all elements
  allElems.forEach(elem => {
    const elemId = elem.id.slice(-1);
    elem.classList.remove('next');
    elem.classList.remove('prev');
  });
  if(activeNum === 0) allElems[1].classList.add('next');
  else if(!allElems[activeNum + 1]) {
    allElems[0].classList.add('next');
    allElems[activeNum -1].classList.add('prev');
  }
  else {
    allElems[activeNum - 1].classList.add('prev');
    allElems[activeNum + 1].classList.add('next');
  }
}

// HOF that returns the click handler for the control buttons in the slider
function getHandler(type) {
  return () => {
    const active = document.querySelector('div.active');
    const inactive = document.querySelector(`div.${type}`);
    active.classList.remove('active');
    active.classList.add(type === 'next' ? 'prev' : 'next');
    inactive.classList.remove(type);
    inactive.classList.add('active');
    if(splitQuotes.length >= 3) { prevBtn.disabled = inactive.id === 'slide-0'; }
    setClasses(inactive, splitQuotes);
  }
}

// returns the element with the largest height in an array of elements
function getHighestElem(elements) {
  const highestElem = elements.reduce((acc, elem) => {
      const maxHeight = acc.getBoundingClientRect().height;
      const currentHeight = elem.getBoundingClientRect().height;
      return maxHeight >= currentHeight ? acc : elem;
  });
  return {
    element: highestElem,
    height: highestElem.getBoundingClientRect().height
  };
}

// ************************
// SETUP CODE
// ************************
const quoteElements = document.querySelectorAll('#testimonials blockquote');
const slider = document.querySelector('#testimonials .slider');
slider.innerHTML = '';

const splitQuotes = splitToDivs(quoteElements, 4);
splitQuotes[0].classList.add('active');
if(splitQuotes[1]) splitQuotes[1].classList.add('next');
splitQuotes.forEach(div => slider.appendChild(div));

const nextBtn = document.getElementById('next');
const prevBtn = document.getElementById('prev');
prevBtn.disabled = true;
nextBtn.addEventListener('click', getHandler('next'));
prevBtn.addEventListener('click', getHandler('prev'));

// set the slider's height to be the height of the highest slide
const maxHeight = getHighestElem(splitQuotes).height;
slider.style.height = maxHeight;
slider.setAttribute('style', `height: ${maxHeight}px`);

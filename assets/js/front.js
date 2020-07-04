function splitToDivs(elements, limit) {
  const splitDivs = Array.from(elements).reduce((acc, element, idx) => {
    if(idx % limit === 0 || idx === 0) {
      const div = document.createElement('DIV');
      div.appendChild(element);
      return [...acc, div];
    } else {
      acc[acc.length - 1].appendChild(element);
      return acc;
    }
  }, []);
  return splitDivs;
}

function addClasses(elements) {
  elements[0].classList.add('active');
  if(elements[1]) elements[1].classList.add('next');
}

const quoteElements = document.querySelectorAll('#testimonials blockquote');
const slider = document.querySelector('#testimonials .slider');
slider.innerHTML = '';
const splitQuotes = splitToDivs(quoteElements, 4);
addClasses(splitQuotes);
splitQuotes.forEach(div => slider.appendChild(div));

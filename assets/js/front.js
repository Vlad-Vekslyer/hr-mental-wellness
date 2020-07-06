function splitToDivs(elements, limit) {
  const splitDivs = Array.from(elements).reduce((acc, element, idx) => {
    if(idx % limit === 0 || idx === 0) {
      const div = document.createElement('DIV');
      div.id = `slider-${acc.length}`
      div.appendChild(element);
      return [...acc, div];
    } else {
      acc[acc.length - 1].appendChild(element);
      return acc;
    }
  }, []);
  return splitDivs;
}

function setClasses(activeElem, allElems) {
  const activeNum = activeElem.id.slice(-1);
  allElems.forEach(elem => {
    const elemId = elem.id.slice(-1);
    if(elem.id !== activeNum) {
      elem.classList.remove('next');
      elem.classList.remove('prev');
    }
  });
  if(activeNum == 0) {
    allElems[1].classList.add('next');
  } else if(!allElems[activeNum + 1]) {
    allElems[0].classList.add('next');
  } else {
    allElems[activeNum - 1].classList.add('prev');
    allElems[activeNum + 1].classList.add('next');
  }
}

const quoteElements = document.querySelectorAll('#testimonials blockquote');
const slider = document.querySelector('#testimonials .slider');
slider.innerHTML = '';

const splitQuotes = splitToDivs(quoteElements, 4);
splitQuotes[0].classList.add('active');
if(splitQuotes[1]) splitQuotes[1].classList.add('next');
splitQuotes.forEach(div => slider.appendChild(div));

const nextBtn = document.getElementById('next');
const prevBtn = document.getElementById('prev');

if(splitQuotes.length < 3) prevBtn.disabled = true;

nextBtn.addEventListener('click', () => {
  const active = document.querySelector('div.active');
  const next = document.querySelector('div.next');
  active.classList.remove('active');
  active.classList.add('prev');
  next.classList.remove('next');
  next.classList.add('active');
  setTimeout(() => setClasses(next, splitQuotes), 500);
});

prevBtn.addEventListener('click', () => {
  const active = document.querySelector('div.active');
  const prev = document.querySelector('div.next');
  active.classList.remove('active');
  active.classList.add('next');
  prev.classList.remove('prev');
  prev.classList.add('active');
  setTimeout(() => setClasses(prev, splitQuotes), 500);
});

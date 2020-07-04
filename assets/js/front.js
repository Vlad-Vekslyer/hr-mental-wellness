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

const quoteElements = document.querySelectorAll('#testimonials blockquote');
const container = document.querySelector('#testimonials .container');
container.innerHTML = '';

console.log(splitToDivs(quoteElements, 4));

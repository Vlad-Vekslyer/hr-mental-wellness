// gets text inside of an element's children
// @element is the element that is being searched for text
// @tag specifies what type of child elements should the text be retreived from
// @return a string array containing the text that was found
function getTextByTags(element, tag) {
  let text = [];
  for(let i = 0; i < element.children.length; i++) {
    let child = element.children.item(i);
    if(child.nodeName === tag.toUpperCase()) text.push(child.innerText);
  }
  return text;
}

// gets text inside of an element's children that are between the specified tags
// @element is the element that is being searched for text
// @tag specifies between what type of elements should the text be searched for
// @return a 2D array with each item in the list being a list of text that was in between each pair of tags
function getTextBetweenTags(element, tag) {
  let text = [];
  for(let i = 0; i < element.children.length; i++ ) {
    let child = element.children.item(i);
    if(child.nodeName === tag.toUpperCase()) {
      let currentElem = child.nextSibling;
      text.push([]);
      // loop through all the children inside of currentElem and append the text inside to text[text.length - 1]
      while(currentElem !== null && currentElem.nodeName !== tag.toUpperCase()) {
        if(currentElem.innerText) text[text.length - 1].push(currentElem.innerText);
        currentElem = currentElem.nextSibling;
      }
    }
  }
  return text;
}

// delete an element's childred past the first appeareance of the specified tag
// @element is the element whose children are being deleted
// @tag specifies past which tag should children start being deleted
function emptyContent(element, tag) {
  let passedHeader = false;
  for(let i = 0; i < element.children.length; i ++) {
    let child = element.children.item(i);
    if(passedHeader === true) child.innerHTML = '';
    else if(child.nodeName === tag.toUpperCase()) {
      passedHeader = true;
      child.innerHTML = '';
    }
  }
}

function dropBoxClick() {
  this.classList.toggle('hidden');
}

// renders drop boxes inside of the container element
// @headers string array of headers whereas each header belongs to a single drop-box
// @bodies 2D string array whereas each list in the array is a list of paragraphs inside of a single drop-box
function createContent(container, headers, bodies) {
  headers.forEach((header, index) => {
    let dropBox = document.createElement('DIV');
    dropBox.classList.add('drop-box', 'hidden');
    dropBox.innerHTML += `<h4>${header} <span></span></h4>`;
    let dropBoxBody = document.createElement('DIV');
    dropBoxBody.classList.add('body');
    let htmlString = '';
    bodies[index].forEach(paragraph => htmlString+= `<p>${paragraph}</p>`);
    dropBoxBody.innerHTML = htmlString;
    dropBox.appendChild(dropBoxBody);
    dropBox.addEventListener('click', dropBoxClick);
    container.appendChild(dropBox);
  })
}

function removeByHeader(element, tag, header) {
  let response = [];
  for(let i = element.children.length - 1; i >= 0; i--) {
    const child = element.children.item(i);
    if(child.nodeName === tag.toUpperCase() && child.innerText === header) {
      let currentElem = child;
      do {
        let nextSibling = currentElem.nextSibling;
        if(currentElem.innerText) response.push(currentElem);
        element.removeChild(currentElem);
        currentElem = nextSibling;
      } while(currentElem);
      break;
    }
  }
  return response;
}

const content = document.getElementById('content');
const testimonialElems = removeByHeader(content, 'h4', 'Testimonials');
const headers = getTextByTags(content, 'h4');
const bodies = getTextBetweenTags(content, 'h4');
emptyContent(content, 'h4');
createContent(content, headers, bodies);
testimonialElems.forEach(element => content.appendChild(element));

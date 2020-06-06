function getTextByTags(element, tag) {
  let text = [];
  for(let i = 0; i < element.children.length; i++) {
    let child = element.children.item(i);
    if(child.nodeName === tag.toUpperCase()) text.push(child.innerText);
  }
  return text;
}

function getTextBetweenTags(element, tag) {
  let text = [];
  for(let i = 0; i < element.children.length; i++ ) {
    let child = element.children.item(i);
    if(child.nodeName === tag.toUpperCase()) {
      let currentElem = child.nextSibling;
      text.push([]);
      while(currentElem !== null && currentElem.nodeName !== tag.toUpperCase()) {
        if(currentElem.innerText) text[text.length - 1].push(currentElem.innerText);
        currentElem = currentElem.nextSibling;
      }
    }
  }
  return text;
}

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

const content = document.getElementById('content');
const headers = getTextByTags(content, 'h4');
const bodies = getTextBetweenTags(content, 'h4');
emptyContent(content, 'h4');

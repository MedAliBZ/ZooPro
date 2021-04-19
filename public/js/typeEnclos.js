let openP = Array.from(document.getElementsByClassName('tab-btn'));
let popup = document.querySelector('.overlay');
let closeP = document.querySelector('.close');
let ajouterButton = document.getElementById('ajouterType');

let popupAjouter = document.querySelector('.overlayAjouter');
let closePA = document.querySelector('.closeAjouter');

ajouterButton.addEventListener('click', () => {
    document.querySelector('#id-popupA').value='';
    document.querySelector('#label-popupA').value='';
    document.querySelector('#structure-popupA').value='';
    popupAjouter.style.visibility = 'visible';
    popupAjouter.style.opacity = 1;
});

closePA.addEventListener('click', () => {
    popupAjouter.style.visibility = 'hidden';
    popupAjouter.style.opacity = 0;
})

openP.map(el => el.addEventListener('click', () => {
    popup.style.visibility = 'visible';
    popup.style.opacity = 1;

    // close your eyes please :'( (MY LITTLE BROTHER CODED THAT :D)
    let structure = el.parentElement.parentElement.previousSibling.previousSibling.innerHTML;
    let label= el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let id= el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    // that doesn't represent me!!

    document.querySelector('.structure-popup').value=structure;
    document.querySelector('.label-popup').value=label;
    document.querySelector('.id-popup').value=id;
}))

closeP.addEventListener('click', () => {
    popup.style.visibility = 'hidden';
    popup.style.opacity = 0;
})
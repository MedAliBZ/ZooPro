let openP = Array.from(document.getElementsByClassName('tab-btn'));
let popup = document.querySelector('.overlay');
let closeP = document.querySelector('.close');
let ajouterButton = document.getElementById('ajouterEnc');

let popupAjouter = document.querySelector('.overlayAjouter');
let closePA = document.querySelector('.closeAjouter');

ajouterButton.addEventListener('click', () => {
    document.querySelector('#appellation-popupA').value='';
    document.querySelector('#localisation-popupA').value='';
    document.querySelector('#taille-popupA').value='';
    document.querySelector('#CD-popupA').value='';
    document.querySelector('#capaciteMaximale-popupA').value='';
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
    let capaciteMaximale = el.parentElement.parentElement.previousSibling.previousSibling.innerHTML;
    let dateConstruction = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let taille = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let localisation = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let appellation = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let id = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    // that doesn't represent me!!

    document.querySelector('.capaciteMaximale-popup').value=capaciteMaximale;
    document.querySelector('.CD-popup').value=dateConstruction;
    document.querySelector('.taille-popup').value=taille;
    document.querySelector('.localisation-popup').value=localisation;
    document.querySelector('.appellation-popup').value=appellation;
    document.querySelector('.id-popup').value=id;
}))

closeP.addEventListener('click', () => {
    popup.style.visibility = 'hidden';
    popup.style.opacity = 0;
})
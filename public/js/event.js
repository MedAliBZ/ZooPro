let openP = Array.from(document.getElementsByClassName('tab-btn'));
let popup = document.querySelector('.overlay');
let closeP = document.querySelector('.close');
let ajouterButton = document.getElementById('ajouterevent');

let popupAjouter = document.querySelector('.overlayAjouter');
let closePA = document.querySelector('.closeAjouter');

// let nomA = document.querySelector('#nom-popupA');
// let dateA = document.querySelector('#BD-popupA');
// let nbA = document.querySelector('#nb-popupA');

ajouterButton.addEventListener('click', () => {
    document.querySelector('#nom-popupA').value='';
    document.querySelector('#BD-popupA').value='';
    document.querySelector('#nb-popupA').value='';
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
    let nb = el.parentElement.parentElement.previousSibling.previousSibling.innerHTML;
    let date = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML
    let nom = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let id = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    // that doesn't represent me!!

    document.querySelector('.nb-popup').value=nb;
    document.querySelector('.nom-popup').value=nom;
    document.querySelector('.BD-popup').value=date;
    document.querySelector('.id-popup').value=id;
    
}))

closeP.addEventListener('click', () => {
    popup.style.visibility = 'hidden';
    popup.style.opacity = 0;
})

// document.querySelector('#ajouterPopup').addEventListener('click',(e)=>{
//     resetErrorsPopUp();
//     if(/\d/.test(PopA.value)){ 
//         document.getElementById('errorAj').innerHTML='Appellation ne doit pas contenir de nombres!';
//         appellationPopA.parentElement.style.border='1px solid red';
//         e.preventDefault();
//     } else if(/\d/.test(localisationPopA.value)){ 
//         document.getElementById('errorAj').innerHTML='La localisation ne doit pas contenir de nombres!';
//         localisationPopA.parentElement.style.border='1px solid red';
//         e.preventDefault();
//     } else if(isNaN(taillePopA.value)){ 
//         document.getElementById('errorAj').innerHTML='La taille doit etre composé de nombres!';
//         taillePopA.parentElement.style.border='1px solid red';
//         e.preventDefault();
//     }else if(isNaN(capaciteMaximalePopA.value)){ 
//         document.getElementById('errorAj').innerHTML='La capacité doit etre composé de nombres!';
//         capaciteMaximalePopA.parentElement.style.border='1px solid red';
//         e.preventDefault();}
    
// })

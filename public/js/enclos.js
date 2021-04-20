let openP = Array.from(document.getElementsByClassName('tab-btn'));
let popup = document.querySelector('.overlay');
let closeP = document.querySelector('.close');
let ajouterButton = document.getElementById('ajouterEnc');



let popupAjouter = document.querySelector('.overlayAjouter');
let closePA = document.querySelector('.closeAjouter');

let appellationPopA = document.querySelector('#appellation-popupA');
let localisationPopA = document.querySelector('#localisation-popupA');
let taillePopA = document.querySelector('#taille-popupA');
let CDPopA = document.querySelector('#CD-popupA');
let capaciteMaximalePopA = document.querySelector('#capaciteMaximale-popupA');

function resetErrorsPopUp(){
    document.getElementById('errorAj').innerHTML='';
    appellationPopA.parentElement.style.border='solid 1px #e8e8e9';
    localisationPopA.parentElement.style.border='solid 1px #e8e8e9';
    taillePopA.parentElement.style.border='solid 1px #e8e8e9';
    CDPopA.parentElement.style.border='solid 1px #e8e8e9';
    capaciteMaximalePopA.parentElement.style.border='solid 1px #e8e8e9';
}

ajouterButton.addEventListener('click', () => {
    document.querySelector('#appellation-popupA').value='';
    document.querySelector('#localisation-popupA').value='';
    document.querySelector('#taille-popupA').value='';
    document.querySelector('#CD-popupA').value='';
    document.querySelector('#capaciteMaximale-popupA').value='';
    popupAjouter.style.visibility = 'visible';
    popupAjouter.style.opacity = 1;
});

document.querySelector('#ajouterPopup').addEventListener('click',(e)=>{
    resetErrorsPopUp();
    if(/\d/.test(appellationPopA.value)){ 
        document.getElementById('errorAj').innerHTML='Appellation ne doit pas contenir de nombres!';
        appellationPopA.parentElement.style.border='1px solid red';
        e.preventDefault();
    } else if(/\d/.test(localisationPopA.value)){ 
        document.getElementById('errorAj').innerHTML='La localisation ne doit pas contenir de nombres!';
        localisationPopA.parentElement.style.border='1px solid red';
        e.preventDefault();
    } else if(isNaN(taillePopA.value)){ 
        document.getElementById('errorAj').innerHTML='La taille doit etre composé de nombres!';
        taillePopA.parentElement.style.border='1px solid red';
        e.preventDefault();
    }else if(isNaN(capaciteMaximalePopA.value)){ 
        document.getElementById('errorAj').innerHTML='La capacité doit etre composé de nombres!';
        capaciteMaximalePopA.parentElement.style.border='1px solid red';
        e.preventDefault();}
    
})


let appellationPopM=document.querySelector('.appellation-popup');
let localisationPopM=document.querySelector('.localisation-popup');
let taillePopM=document.querySelector('.taille-popup');
let CDPopM=document.querySelector('.CD-popup');
let capaciteMaximalePopM=document.querySelector('.capaciteMaximale-popup');

document.querySelector('#modifierPopupM').addEventListener('click',(e)=>{
        //resetErrorsPopUpM();
        if(/\d/.test(appellationPopM.value)){ 
        document.getElementById('errorMd').innerHTML='Appellation ne doit pas contenir de nombres!';
        appellationPopM.parentElement.style.border='1px solid red';
        e.preventDefault();
    } else if(/\d/.test(localisationPopM.value)){ 
        document.getElementById('errorMd').innerHTML='La localisation ne doit pas contenir de nombres!';
        localisationPopM.parentElement.style.border='1px solid red';
        e.preventDefault();
    } else if(isNaN(taillePopM.value)){ 
        document.getElementById('errorMd').innerHTML='La taille doit etre composé de nombres!';
        taillePopM.parentElement.style.border='1px solid red';
        e.preventDefault();
    }else if(isNaN(capaciteMaximalePopM.value)){ 
        document.getElementById('errorMd').innerHTML='La capacité doit etre composé de nombres!';
        capaciteMaximalePopM.parentElement.style.border='1px solid red';
        e.preventDefault();}
   
})


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

    document.getElementById('errorMd').innerHTML='';
    document.querySelector('.capaciteMaximale-popup').parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('.CD-popup').parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('.taille-popup').parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('.localisation-popup').parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('.appellation-popup').parentElement.style.border='solid 1px #e8e8e9';
}))

closeP.addEventListener('click', () => {
    popup.style.visibility = 'hidden';
    popup.style.opacity = 0;
})
let openP = Array.from(document.getElementsByClassName('tab-btn'));
let popup = document.querySelector('.overlay');
let closeP = document.querySelector('.close');
let ajouterButton = document.getElementById('ajouterType');

let popupAjouter = document.querySelector('.overlayAjouter');
let closePA = document.querySelector('.closeAjouter');

let idPopA = document.querySelector('#id-popupA');
let labelPopA = document.querySelector('#label-popupA');
let structurePopA = document.querySelector('#structure-popupA');

function resetErrorsPopUp(){
    document.getElementById('errorAj').innerHTML='';
    idPopA.parentElement.style.border='solid 1px #e8e8e9';
    labelPopA.parentElement.style.border='solid 1px #e8e8e9';
    structurePopA.parentElement.style.border='solid 1px #e8e8e9';
}

ajouterButton.addEventListener('click', () => {
    idPopA.value='';
    labelPopA.value='';
    structurePopA.value='';
    popupAjouter.style.visibility = 'visible';
    popupAjouter.style.opacity = 1;
    resetErrorsPopUp();
});

document.querySelector('#ajouterPopup').addEventListener('click',(e)=>{
    resetErrorsPopUp();
    let letterNumber = /^[0-9a-zA-Z]+$/;
    if(!idPopA.value.match(letterNumber)){ 
        document.getElementById('errorAj').innerHTML='Id doit etre composé de chiffres et de lettres!';
        idPopA.parentElement.style.border='2px solid red';
        e.preventDefault();
    } else if(/\d/.test(labelPopA.value)){ 
        document.getElementById('errorAj').innerHTML='Le label ne doit pas contenir des chiffres!';
        labelPopA.parentElement.style.border='2px solid red';
        e.preventDefault();
    } else if(/\d/.test(structurePopA.value)){ 
        document.getElementById('errorAj').innerHTML='La structure ne doit pas contenir des chiffres!';
        structurePopA.parentElement.style.border='2px solid red';
        e.preventDefault();
    }
})

function resetErrorsPopUpM(){
    document.getElementById('errorMd').innerHTML='';
    document.querySelector('.id-popup').parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('.label-popup').parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('.structure-popup').parentElement.style.border='solid 1px #e8e8e9';
}

let idPopM=document.querySelector('.id-popup');
let labelPopM=document.querySelector('.label-popup');
let structurePopM=document.querySelector('.structure-popup');


document.querySelector('#modifierPopupM').addEventListener('click',(e)=>{
    resetErrorsPopUpM();
    let letterNumber = /^[0-9a-zA-Z]+$/;
    if(!idPopM.value.match(letterNumber)){ 
        document.getElementById('errorMd').innerHTML='Id doit etre composé de chiffres et de lettres!';
        idPopM.parentElement.style.border='2px solid red';
        e.preventDefault();
    } else if(/\d/.test(labelPopM.value)){ 
        document.getElementById('errorMd').innerHTML='Le label ne doit pas contenir des chiffres!';
        labelPopM.parentElement.style.border='2px solid red';
        e.preventDefault();
    } else if(/\d/.test(structurePopM.value)){ 
        document.getElementById('errorMd').innerHTML='La structure ne doit pas contenir des chiffres!';
        structurePopM.parentElement.style.border='2px solid red';
        e.preventDefault();
    }
  
})

ajouterButton.addEventListener('click', () => {
    document.querySelector('#id-popupA').value='';
    document.querySelector('#label-popupA').value='';
    document.querySelector('#structure-popupA').value='';
    popupAjouter.style.visibility = 'visible';
    popupAjouter.style.opacity = 1;
    resetErrorsPopUp();
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


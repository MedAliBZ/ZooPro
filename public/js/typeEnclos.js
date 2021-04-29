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
    document.getElementById('errorAjID').innerHTML='';
    document.getElementById('errorAjLabel').innerHTML='';
    document.getElementById('errorAjStructure').innerHTML='';

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
    if(idPopA.value.length==0)
    {
      document.getElementById('errorAjID').innerHTML='La case est vide.Veuillez saisir un identifiant';
      idPopA.parentElement.style.border='2px solid red';
      e.preventDefault();  
    } 
    else if(!idPopA.value.match(letterNumber)){ 
      document.getElementById('errorAjID').innerHTML='Id doit etre composé de chiffres et de lettres!';
      idPopA.parentElement.style.border='2px solid red';
      e.preventDefault();
    } 
    else
    {
      document.getElementById('errorAjID').innerHTML='';
      idPopA.parentElement.style.border='solid 2px #e8e8e9';
    }

       if(labelPopA.value.length==0)
      {
       document.getElementById('errorAjLabel').innerHTML='La case est vide.Veuillez saisir un label';
       labelPopA.parentElement.style.border='2px solid red';
       e.preventDefault();  
      } 
      else if(/\d/.test(labelPopA.value)){ 
       document.getElementById('errorAjLabel').innerHTML='Le label ne doit pas contenir des chiffres!';
       labelPopA.parentElement.style.border='2px solid red';
       e.preventDefault();
      } 
     else
      {
        document.getElementById('errorAjLabel').innerHTML='';
        labelPopA.parentElement.style.border='solid 2px #e8e8e9';
      }

      if(structurePopA.value.length==0)
      {
       document.getElementById('errorAjStructure').innerHTML='La case est vide.Veuillez saisir une structure';
       structurePopA.parentElement.style.border='2px solid red';
       e.preventDefault();  
      } 
       else if(/\d/.test(structurePopA.value)){ 
       document.getElementById('errorAjStructure').innerHTML='La structure ne doit pas contenir des chiffres!';
       structurePopA.parentElement.style.border='2px solid red';
       e.preventDefault();
      }
      else
     {
       document.getElementById('errorAjStructure').innerHTML='';
       structurePopA.parentElement.style.border='solid 2px #e8e8e9';
     }
})

let idPopM=document.querySelector('.id-popup');
let labelPopM=document.querySelector('.label-popup');
let structurePopM=document.querySelector('.structure-popup');


document.querySelector('#modifierPopupM').addEventListener('click',(e)=>{
    
    let letterNumber = /^[0-9a-zA-Z]+$/;
    if(idPopM.value.length==0)
    {
      document.getElementById('errorMdID').innerHTML='La case est vide.Veuillez saisir un identifiant';
      idPopM.parentElement.style.border='2px solid red';
      e.preventDefault();  
    } 
    else if(!idPopM.value.match(letterNumber)){ 
      document.getElementById('errorMdID').innerHTML='Id doit etre composé de chiffres et de lettres!';
      idPopM.parentElement.style.border='2px solid red';
      e.preventDefault();
    } 
    else
    {
      document.getElementById('errorMdID').innerHTML='';
      idPopM.parentElement.style.border='solid 2px #e8e8e9';
    }

       if(labelPopM.value.length==0)
      {
       document.getElementById('errorMdLabel').innerHTML='La case est vide.Veuillez saisir un label';
       labelPopM.parentElement.style.border='2px solid red';
       e.preventDefault();  
      } 
      else if(/\d/.test(labelPopM.value)){ 
       document.getElementById('errorMdLabel').innerHTML='Le label ne doit pas contenir des chiffres!';
       labelPopM.parentElement.style.border='2px solid red';
       e.preventDefault();
      } 
     else
      {
        document.getElementById('errorMdLabel').innerHTML='';
        labelPopM.parentElement.style.border='solid 2px #e8e8e9';
      }

      if(structurePopM.value.length==0)
      {
       document.getElementById('errorMdStructure').innerHTML='La case est vide.Veuillez saisir une structure';
       structurePopM.parentElement.style.border='2px solid red';
       e.preventDefault();  
      } 
       else if(/\d/.test(structurePopM.value)){ 
       document.getElementById('errorMdStructure').innerHTML='La structure ne doit pas contenir des chiffres!';
       structurePopM.parentElement.style.border='2px solid red';
       e.preventDefault();
      }
      else
     {
       document.getElementById('errorMdStructure').innerHTML='';
       structurePopM.parentElement.style.border='solid 2px #e8e8e9';
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
    document.getElementById('errorMdID').innerHTML='';
    document.getElementById('errorMdLabel').innerHTML='';
    document.getElementById('errorMdStructure').innerHTML='';
    document.querySelector('.id-popup').parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('.label-popup').parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('.structure-popup').parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('.structure-popup').value=structure;
    document.querySelector('.label-popup').value=label;
    document.querySelector('.id-popup').value=id;
}))

closeP.addEventListener('click', () => {
    popup.style.visibility = 'hidden';
    popup.style.opacity = 0;
})


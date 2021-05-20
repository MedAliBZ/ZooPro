let openP = Array.from(document.getElementsByClassName('tab-btn'));
let popup = document.querySelector('.overlay');
let closeP = document.querySelector('.close');
let ajouterButton = document.getElementById('ajouterEnc');
let popupAjouter = document.querySelector('.overlayAjouter');
let closePA = document.querySelector('.closeAjouter');

let sendButton = document.getElementById('sendemail');
let popupsend = document.querySelector('.overlaysend');
let closesend = document.querySelector('.closesend');


let appellationPopA = document.querySelector('#appellation-popupA');
let localisationPopA = document.querySelector('#localisation-popupA');
let taillePopA = document.querySelector('#taille-popupA');
let CDPopA = document.querySelector('#CD-popupA');
let capaciteMaximalePopA = document.querySelector('#capaciteMaximale-popupA');
let typeEnclosPopA = document.querySelector('#typeEnclos-popupA');
let photoPopA = document.querySelector('#photo-popupA');
let today = new Date();
let dd = today.getDate();
let mm = today.getMonth()+1; //January is 0!
let yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("CD-popupA").setAttribute("max", today);

sendButton.addEventListener('click', () => {
    document.querySelector('#nom-popups').value='';
    document.querySelector('#sujet-popups').value='';
    document.querySelector('#email-popups').value='';
    document.querySelector('#message-popups').value='';
    
    
    popupsend.style.visibility = 'visible';
    popupsend.style.opacity = 1;
});
closesend.addEventListener('click', () => {
    popupsend.style.visibility = 'hidden';
    popupsend.style.opacity = 0;
})


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
    document.getElementById('errorAjAppellation').innerHTML='';
    appellationPopA.parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('#localisation-popupA').value='';
    document.getElementById('errorAjLocalisation').innerHTML='';
    localisationPopA.parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('#taille-popupA').value='';
    document.getElementById('errorAjTaille').innerHTML='';
    taillePopA.parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('#CD-popupA').value='';
    document.getElementById('errorAjCD').innerHTML='';
    CDPopA.parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('#capaciteMaximale-popupA').value='';
    document.getElementById('errorAjCM').innerHTML='';
    capaciteMaximalePopA.parentElement.style.border='solid 1px #e8e8e9';
    document.getElementById('errorAjTypeEnclos').innerHTML='';
    typeEnclosPopA.parentElement.style.border='solid 1px #e8e8e9';
    document.getElementById('errorAjPhoto').innerHTML='';
    photoPopA.parentElement.style.border='solid 1px #e8e8e9';
    popupAjouter.style.visibility = 'visible';
    popupAjouter.style.opacity = 1;
});

sendButton.addEventListener('click', () => {
    document.querySelector('#nom-popups').value='';
    document.getElementById('errorSendNom').innerHTML='';
    nomSend.parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('#email-popups').value='';
    document.getElementById('errorSendEmail').innerHTML='';
    emailSend.parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('#sujet-popups').value='';
    document.getElementById('errorSendSujet').innerHTML='';
    sujetSend.parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('#message-popups').value='';
    document.getElementById('errorSendMessage').innerHTML='';
    messageSend.parentElement.style.border='solid 1px #e8e8e9';
})

function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
let nomSend = document.querySelector('#nom-popups');
let emailSend = document.querySelector('#email-popups');
let sujetSend = document.querySelector('#sujet-popups');
let messageSend = document.querySelector('#message-popups');

document.querySelector('#emailPopup').addEventListener('click',(e)=>{
     if(nomSend.value.length==0)
    {
     document.getElementById('errorSendNom').innerHTML='La case est vide.Veuillez saisir un nom!';
     nomSend.parentElement.style.border='1px solid red';
     e.preventDefault();}
    else if(/\d/.test(nomSend.value)){ 
     document.getElementById('errorSendNom').innerHTML='Nom ne doit pas contenir de nombres!';
     nomSend.parentElement.style.border='1px solid red';
     e.preventDefault();}
    else
    {
     document.getElementById('errorSendNom').innerHTML='';
     nomSend.parentElement.style.border='solid 1px #e8e8e9'; 
    }

     if(emailSend.value.length==0)
    {
     document.getElementById('errorSendEmail').innerHTML="La case est vide.Veuillez saisir l'adresse email!";
     emailSend.parentElement.style.border='1px solid red';
     e.preventDefault();}
    else if((!validateEmail(emailSend.value))){ 
     document.getElementById('errorSendEmail').innerHTML="Veuillez saisir le format correcte de l'email!";
     emailSend.parentElement.style.border='1px solid red';
     e.preventDefault();}
    else
    {
     document.getElementById('errorSendEmail').innerHTML='';
     emailSend.parentElement.style.border='solid 1px #e8e8e9'; 
    }

     if(sujetSend.value.length==0)
    {
     document.getElementById('errorSendSujet').innerHTML="La case est vide.Veuillez saisir l'adresse email!";
     sujetSend.parentElement.style.border='1px solid red';
     e.preventDefault();}
    else
    {
     document.getElementById('errorSendSujet').innerHTML='';
     sujetSend.parentElement.style.border='solid 1px #e8e8e9'; 
    }

     if(messageSend.value.length==0)
    {
     document.getElementById('errorSendMessage').innerHTML="La case est vide.Veuillez saisir un message";
     messageSend.parentElement.style.border='1px solid red';
     e.preventDefault();}
    else
    {
     document.getElementById('errorSendMessage').innerHTML='';
     messageSend.parentElement.style.border='solid 1px #e8e8e9'; 
    }

})

document.querySelector('#ajouterPopup').addEventListener('click',(e)=>{
    //validate appellation
    if(appellationPopA.value.length==0)
    {
     document.getElementById('errorAjAppellation').innerHTML='La case est vide.Veuillez saisir une appellation!';
     appellationPopA.parentElement.style.border='1px solid red';
     e.preventDefault();}
    else if(/\d/.test(appellationPopA.value)){ 
     document.getElementById('errorAjAppellation').innerHTML='Appellation ne doit pas contenir de nombres!';
     appellationPopA.parentElement.style.border='1px solid red';
     e.preventDefault();}
    else
    {
     document.getElementById('errorAjAppellation').innerHTML='';
     appellationPopA.parentElement.style.border='solid 1px #e8e8e9'; 
    }

    //validate localisation
    if(localisationPopA.value.length==0)
    {
     document.getElementById('errorAjLocalisation').innerHTML='La case est vide.Veuillez saisir une localisation!';
     localisationPopA.parentElement.style.border='1px solid red';
     e.preventDefault();}
    else if(/\d/.test(localisationPopA.value)){ 
     document.getElementById('errorAjLocalisation').innerHTML='Localisation ne doit pas contenir de nombres!';
     localisationPopA.parentElement.style.border='1px solid red';
     e.preventDefault();}
     else
    {
     document.getElementById('errorAjLocalisation').innerHTML='';
     localisationPopA.parentElement.style.border='solid 1px #e8e8e9'; 
    }

    //validate taille
    if(taillePopA.value==0){ 
    document.getElementById('errorAjTaille').innerHTML='La case est vide.Veuillez saisir un nombre!';
    taillePopA.parentElement.style.border='1px solid red';
    e.preventDefault();}
    else if((taillePopA.value<0)||(taillePopA.value==0)){ 
    document.getElementById('errorAjTaille').innerHTML='Veuillez saisir un nombre strictement positif!';
    taillePopA.parentElement.style.border='1px solid red';
    e.preventDefault();}
    else
    {
    document.getElementById('errorAjTaille').innerHTML='';
    taillePopA.parentElement.style.border='solid 1px #e8e8e9'; 
    }

    //validate date of construction
    if(CDPopA.value==0){ 
    document.getElementById('errorAjCD').innerHTML='La case est vide.Veuillez saisir une date de construction!';
    CDPopA.parentElement.style.border='1px solid red';
    e.preventDefault();}
    else
    {
    document.getElementById('errorAjCD').innerHTML='';
    CDPopA.parentElement.style.border='solid 1px #e8e8e9';
    }

    //validate maximal capacity
    if(capaciteMaximalePopA.value.length==0)
    {
    document.getElementById('errorAjCM').innerHTML='La case est vide.Veuillez saisir la capacité maximale!';
    capaciteMaximalePopA.parentElement.style.border='1px solid red';
    e.preventDefault();
    }else if((capaciteMaximalePopA.value<0)||(capaciteMaximalePopA.value==0)){ 
    document.getElementById('errorAjCM').innerHTML='Veuillez saisir un nombre strictement positif!';
    capaciteMaximalePopA.parentElement.style.border='1px solid red';
    e.preventDefault();}
    else
    {
    document.getElementById('errorAjCM').innerHTML='';
    capaciteMaximalePopA.parentElement.style.border='solid 1px #e8e8e9' 
    }
    
    //validate type
    if (typeEnclosPopA.selectedIndex==0) {
    document.getElementById('errorAjTypeEnclos').innerHTML = "La case est vide.Veuillez choisir un type";
    typeEnclosPopA.parentElement.style.border = "1px solid red";
    e.preventDefault();
    }
    else
    {
    document.getElementById('errorAjTypeEnclos').innerHTML='';
    typeEnclosPopA.parentElement.style.border = "solid 1px #e8e8e9";
    } 
    
    //validate image
     if(photoPopA.value.length==0)
    {
    document.getElementById('errorAjPhoto').innerHTML='La case est vide.Veuillez saisir la photo!';
    photoPopA.parentElement.style.border='1px solid red';
    e.preventDefault();
    }
    else
    {
     document.getElementById('errorAjPhoto').innerHTML='';
    photoPopA.parentElement.style.border='solid 1px #e8e8e9';
    }
    
})


let appellationPopM=document.querySelector('.appellation-popup');
let localisationPopM=document.querySelector('.localisation-popup');
let taillePopM=document.querySelector('.taille-popup');
let CDPopM=document.querySelector('.CD-popup');
let capaciteMaximalePopM=document.querySelector('.capaciteMaximale-popup');

document.querySelector('#modifierPopupM').addEventListener('click',(e)=>{

    //validate appellation
    if(appellationPopM.value.length==0)
    {
     document.getElementById('errorMdAppellation').innerHTML='La case est vide.Veuillez saisir une appellation!';
     appellationPopM.parentElement.style.border='1px solid red';
     e.preventDefault();}
    else if(/\d/.test(appellationPopM.value)){ 
     document.getElementById('errorMdAppellation').innerHTML='Appellation ne doit pas contenir de nombres!';
     appellationPopM.parentElement.style.border='1px solid red';
     e.preventDefault();}
    else
    {
     document.getElementById('errorMdAppellation').innerHTML='';
     appellationPopM.parentElement.style.border='solid 1px #e8e8e9'; 
    }

    //validate localisation
    if(localisationPopM.value.length==0)
    {
     document.getElementById('errorMdLocalisation').innerHTML='La case est vide.Veuillez saisir une localisation!';
     localisationPopM.parentElement.style.border='1px solid red';
     e.preventDefault();}
    else if(/\d/.test(localisationPopM.value)){ 
     document.getElementById('errorMdLocalisation').innerHTML='Localisation ne doit pas contenir de nombres!';
     localisationPopM.parentElement.style.border='1px solid red';
     e.preventDefault();}
     else
    {
     document.getElementById('errorMdLocalisation').innerHTML='';
     localisationPopM.parentElement.style.border='solid 1px #e8e8e9'; 
    }

    //validate taille
    if(taillePopM.value.length==0){ 
    document.getElementById('errorMdTaille').innerHTML='La case est vide.Veuillez saisir un nombre!';
    taillePopM.parentElement.style.border='1px solid red';
    e.preventDefault();}
    else if((taillePopM.value<0)||(taillePopM.value==0)){ 
    document.getElementById('errorMdTaille').innerHTML='Veuillez saisir un nombre strictement positif!';
    taillePopM.parentElement.style.border='1px solid red';
    e.preventDefault();}
    else
    {
    document.getElementById('errorMdTaille').innerHTML='';
    taillePopM.parentElement.style.border='solid 1px #e8e8e9'; 
    }

    //validate date of construction
    if(CDPopM.value.length==0){ 
    document.getElementById('errorMdCD').innerHTML='La case est vide.Veuillez saisir une date de construction!';
    CDPopM.parentElement.style.border='1px solid red';
    e.preventDefault();}
    else
    {
    document.getElementById('errorMdCD').innerHTML='';
    CDPopM.parentElement.style.border='solid 1px #e8e8e9';
    }

    //validate maximal capacity
    if(capaciteMaximalePopM.value.length==0)
    {
    document.getElementById('errorMdCM').innerHTML='La case est vide.Veuillez saisir la capacité maximale!';
    capaciteMaximalePopM.parentElement.style.border='1px solid red';
    e.preventDefault();
    }else if((capaciteMaximalePopM.value<0)||(capaciteMaximalePopM.value==0)){ 
    document.getElementById('errorMdCM').innerHTML='Veuillez saisir un nombre strictement positif!';
    capaciteMaximalePopM.parentElement.style.border='1px solid red';
    e.preventDefault();}
    else
    {
    document.getElementById('errorMdCM').innerHTML='';
    capaciteMaximalePopM.parentElement.style.border='solid 1px #e8e8e9' 
    }
 
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

    document.getElementById('errorMdAppellation').innerHTML='';
    document.getElementById('errorMdLocalisation').innerHTML='';
    document.getElementById('errorMdTaille').innerHTML='';
    document.getElementById('errorMdCD').innerHTML='';
    document.getElementById('errorMdCM').innerHTML='';

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


document.querySelector('.triButton').addEventListener('click', () => {
    document.querySelector('.triAndFilter').classList.toggle('open');
})


let usernames = Array.from(document.querySelectorAll("div[data-label='Appellation']"));


document.getElementById('rechercher').addEventListener('keyup', (e) => {
    usernames.map(el => {
        if (el.innerHTML.toLowerCase().search(e.target.value.toLowerCase()) == -1) {
            el.parentElement.style.display = 'none';
        }
        else {
            if (window.innerWidth > 1050)
                el.parentElement.style.display = 'flex';
            else
                el.parentElement.style.display = 'block';
        }
    })
})

window.addEventListener('resize', () => {
    document.getElementById('rechercher').value = '';
    usernames.map(el => {
        if (window.innerWidth > 1050)
            el.parentElement.style.display = 'flex';
        else
            el.parentElement.style.display = 'block';
    });

}); 


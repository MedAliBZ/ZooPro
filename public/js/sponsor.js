let openP = Array.from(document.getElementsByClassName('tab-btn'));
let popup = document.querySelector('.overlay');
let closeP = document.querySelector('.close');
let ajouterButton = document.getElementById('ajoutersponor');
let sendButton = document.getElementById('sendemail');

let popupAjouter = document.querySelector('.overlayAjouter');
let closePA = document.querySelector('.closeAjouter');

let popupsend = document.querySelector('.overlaysend');
let closesend = document.querySelector('.closesend');

 let nomA = document.querySelector('#nom-popupA');
 let emailA = document.querySelector('#email-popupA');
 let nbA = document.querySelector('#nb-popupA');
 let photoA = document.querySelector('#photo-popupA');



ajouterButton.addEventListener('click', () => {
    document.querySelector('#nom-popupA').value='';
    document.getElementById('errorAjnom').innerHTML='';
    nomA.parentElement.style.border='solid 1px #e8e8e9';
    
    document.querySelector('#nb-popupA').value='';
    document.getElementById('errorAjnb').innerHTML='';
    nbA.parentElement.style.border='solid 1px #e8e8e9';
    
    document.querySelector('#email-popupA').value='';
    document.getElementById('errorAjemail').innerHTML='';
    emailA.parentElement.style.border='solid 1px #e8e8e9';

    document.querySelector('#photo-popupA').value='';
    document.getElementById('errorAjphoto').innerHTML='';
    photoA.parentElement.style.border='solid 1px #e8e8e9';
    
    
    popupAjouter.style.visibility = 'visible';
    popupAjouter.style.opacity = 1;
});

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

document.querySelector('#ajouterPopup').addEventListener('click',(e)=>{

    if(nbA.value.length!=8)
    {
        if(nbA.value.length==0)
        {
     document.getElementById('errorAjnb').innerHTML='La case est vide.Veuillez saisir un numéro!';
     nbA.parentElement.style.border='1px solid red';
     e.preventDefault();
    }
    else if((nbA.value<0)||(nbA.value==0)){ 
    document.getElementById('errorAjnb').innerHTML='Veuillez saisir un nombre strictement positif!';
    nbA.parentElement.style.border='1px solid red';
    e.preventDefault();
    }
    document.getElementById('errorAjnb').innerHTML='Veuillez saisir un numéro composé de 8 nombres!';
    nbA.parentElement.style.border='1px solid red';
    e.preventDefault();
    }
    else
    {
     document.getElementById('errorAjnb').innerHTML='';
     nbA.parentElement.style.border='solid 1px #e8e8e9'; 
    }
    


    if(photoA.value.length==0)
    {
     document.getElementById('errorAjphoto').innerHTML='La case est vide.Veuillez saisir une photo!';
     photoA.parentElement.style.border='1px solid red';
     e.preventDefault();
    }
     else
    {
    document.getElementById('errorAjphoto').innerHTML='';
    photoA.parentElement.style.border='solid 1px #e8e8e9';
    }
    
    if(nomA.value.length==0)
    {
     document.getElementById('errorAjnom').innerHTML='La case est vide.Veuillez saisir un nom!';
     nomA.parentElement.style.border='1px solid red';
     e.preventDefault();
    }
     else
    {
    document.getElementById('errorAjnom').innerHTML='';
    nomA.parentElement.style.border='solid 1px #e8e8e9';
    }

    if(emailA.value.length==0)
    {
     document.getElementById('errorAjemail').innerHTML='La case est vide.Veuillez saisir un email!';
     emailA.parentElement.style.border='1px solid red';
     e.preventDefault();
    }
    else if((!validateEmail(emailA.value))){ 
        document.getElementById('errorAjemail').innerHTML="Veuillez saisir le format correcte de l'email!";
        emailA.parentElement.style.border='1px solid red';
        e.preventDefault();}
     else
    {
    document.getElementById('errorAjemail').innerHTML='';
    emailA.parentElement.style.border='solid 1px #e8e8e9';
    }

})

    let nbM = document.querySelector('.nb-popup');
    let nomM = document.querySelector('.nom-popup');
    let emailM = document.querySelector('.email-popup');


 document.querySelector('#modifierPopupM').addEventListener('click',(e)=>{

    if(nbM.value.length!=8)
    {
        if(nbA.value.length==0)
        {
     document.getElementById('errorMdnb').innerHTML='La case est vide.Veuillez saisir un numéro!';
     nbM.parentElement.style.border='1px solid red';
     e.preventDefault();
    }
    else if((nbM.value<0)||(nbM.value==0)){ 
    document.getElementById('errorMdnb').innerHTML='Veuillez saisir un nombre strictement positif!';
    nbM.parentElement.style.border='1px solid red';
    e.preventDefault();
    }
    document.getElementById('errorMdnb').innerHTML='Veuillez saisir un numéro composé de 8 nombres!';
    nbM.parentElement.style.border='1px solid red';
    e.preventDefault();
    }
    else
    {
     document.getElementById('errorMdnb').innerHTML='';
     nbM.parentElement.style.border='solid 1px #e8e8e9'; 
    }
    
    if(emailM.value.length==0)
    {
     document.getElementById('errorMdemail').innerHTML='La case est vide.Veuillez saisir un email!';
     emailM.parentElement.style.border='1px solid red';
     e.preventDefault();
    }
    else if((!validateEmail(emailM.value))){ 
        document.getElementById('errorMdemail').innerHTML="Veuillez saisir le format correcte de l'email!";
        emailM.parentElement.style.border='1px solid red';
        e.preventDefault();}
     else
    {
    document.getElementById('errorMdemail').innerHTML='';
    emailM.parentElement.style.border='solid 1px #e8e8e9';
    }

    if(nomM.value.length==0)
    {
     document.getElementById('errorMdnom').innerHTML='La case est vide.Veuillez saisir un nom!';
     nomM.parentElement.style.border='1px solid red';
     e.preventDefault();
    }
     else
    {
    document.getElementById('errorMdnom').innerHTML='';
    nomM.parentElement.style.border='solid 1px #e8e8e9';
    }



    

 })


closePA.addEventListener('click', () => {
    popupAjouter.style.visibility = 'hidden';
    popupAjouter.style.opacity = 0;
})

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


openP.map(el => el.addEventListener('click', () => {
    popup.style.visibility = 'visible';
    popup.style.opacity = 1;

    // close your eyes please :'( (MY LITTLE BROTHER CODED THAT :D)
    let email = el.parentElement.parentElement.previousSibling.previousSibling.innerHTML;
    let nb = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let nom = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let id = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    
    // that doesn't represent me!!

    document.querySelector('.email-popup').value=email;
    document.querySelector('.nb-popup').value=nb;
    document.querySelector('.nom-popup').value=nom;
    document.querySelector('.id-popup').value=id;
}))

closeP.addEventListener('click', () => {
    popup.style.visibility = 'hidden';
    popup.style.opacity = 0;
})


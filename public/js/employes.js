let openP = Array.from(document.getElementsByClassName('tab-btn'));
let popup = document.querySelector('.overlay');
let closeP = document.querySelector('.close');
let ajouterButton = document.getElementById('ajouterEmp');

let popupAjouter = document.querySelector('.overlayAjouter');
let closePA = document.querySelector('.closeAjouter');

let cinPopA = document.querySelector('#cin-popupA');
let nomPopA = document.querySelector('#nom-popupA');
let prenomPopA = document.querySelector('#prenom-popupA');
let BDPopA = document.querySelector('#BD-popupA');
let salairePopA = document.querySelector('#salaire-popupA');

function resetErrorsPopUp(){
    document.getElementById('errorAj').innerHTML='';
    cinPopA.parentElement.style.border='solid 1px #e8e8e9';
    nomPopA.parentElement.style.border='solid 1px #e8e8e9';
    prenomPopA.parentElement.style.border='solid 1px #e8e8e9';
    BDPopA.parentElement.style.border='solid 1px #e8e8e9';
    salairePopA.parentElement.style.border='solid 1px #e8e8e9';
}

ajouterButton.addEventListener('click', () => {
    document.querySelector('html').style.overflow = "hidden";
    cinPopA.value='';
    nomPopA.value='';
    prenomPopA.value='';
    BDPopA.value='';
    salairePopA.value='';
    popupAjouter.style.visibility = 'visible';
    popupAjouter.style.opacity = 1;
    resetErrorsPopUp();
});

document.querySelector('#ajouterPopup').addEventListener('click',(e)=>{
    resetErrorsPopUp();
    if(cinPopA.value.trim().length != 9){
        document.getElementById('errorAj').innerHTML='La longeur du cin doit ere egale à 9';
        cinPopA.parentElement.style.border='1px solid red';
        e.preventDefault();
    } else if(isNaN(cinPopA.value)){ 
        document.getElementById('errorAj').innerHTML='Le cin doit etre composé de nombres!';
        cinPopA.parentElement.style.border='1px solid red';
        e.preventDefault();
    } else if(/\d/.test(nomPopA.value)){ 
        document.getElementById('errorAj').innerHTML='Le nom ne doit pas contenir de nombres!';
        nomPopA.parentElement.style.border='1px solid red';
        e.preventDefault();
    } else if(/\d/.test(prenomPopA.value)){ 
        document.getElementById('errorAj').innerHTML='Le prenom ne doit pas contenir de nombres!';
        prenomPopA.parentElement.style.border='1px solid red';
        e.preventDefault();
    }
    else if(salairePopA.value*1 < 0){
        document.getElementById('errorAj').innerHTML='Le salaire doit etre supérieur ou egale à 0!';
        salairePopA.parentElement.style.border='1px solid red';
        e.preventDefault();
    }
})

function resetErrorsPopUpM(){
    document.getElementById('errorMd').innerHTML='';
    document.querySelector('.salaire-popup').parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('.BD-popup').parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('.prenom-popup').parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('.nom-popup').parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('.cin-popup').parentElement.style.border='solid 1px #e8e8e9';
    document.querySelector('.id-popup').parentElement.style.border='solid 1px #e8e8e9';
}

let prenomPopM=document.querySelector('.prenom-popup');
let nomPopM=document.querySelector('.nom-popup');
let cinPopM=document.querySelector('.cin-popup');
let salairePopM=document.querySelector('.salaire-popup');

document.querySelector('#modifierPopupM').addEventListener('click',(e)=>{
    resetErrorsPopUpM();
    if(cinPopM.value.length != 9){
        document.getElementById('errorMd').innerHTML='La longeur du cin doit ere egale à 9';
        cinPopM.parentElement.style.border='1px solid red';
        e.preventDefault();
    } else if(isNaN(cinPopM.value)){ 
        document.getElementById('errorMd').innerHTML='Le cin doit etre composé de nombres!';
        cinPopM.parentElement.style.border='1px solid red';
        e.preventDefault();
    } else if(/\d/.test(nomPopM.value)){ 
        document.getElementById('errorMd').innerHTML='Le nom ne doit pas contenir de nombres!';
        nomPopM.parentElement.style.border='1px solid red';
        e.preventDefault();
    } else if(/\d/.test(prenomPopM.value)){ 
        document.getElementById('errorMd').innerHTML='Le prenom ne doit pas contenir de nombres!';
        prenomPopM.parentElement.style.border='1px solid red';
        e.preventDefault();
    }
    else if(salairePopM.value*1 < 0){ 
        document.getElementById('errorMd').innerHTML='Le salaire doit etre supérieur ou egale à 0!';
        salairePopM.parentElement.style.border='1px solid red';
        e.preventDefault();
    }
})

closePA.addEventListener('click', () => {
    document.querySelector('html').style.overflow = "auto";
    popupAjouter.style.visibility = 'hidden';
    popupAjouter.style.opacity = 0;
})

openP.map(el => el.addEventListener('click', () => {
    document.querySelector('html').style.overflow = "hidden";
    popup.style.visibility = 'visible';
    popup.style.opacity = 1;

    // close your eyes please :'( (MY LITTLE BROTHER CODED THAT :D)
    let salaire = el.parentElement.parentElement.previousSibling.previousSibling.innerHTML;
    let dateNaissance = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let prenom = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let nom = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let cin = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let id = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    // that doesn't represent me!!

    document.querySelector('.salaire-popup').value=salaire;
    document.querySelector('.BD-popup').value=dateNaissance;
    document.querySelector('.prenom-popup').value=prenom;
    document.querySelector('.nom-popup').value=nom;
    document.querySelector('.cin-popup').value=cin;
    document.querySelector('.id-popup').value=id;
}))

closeP.addEventListener('click', () => {
    document.querySelector('html').style.overflow = "auto"
    popup.style.visibility = 'hidden';
    popup.style.opacity = 0;
})



document.querySelector('.triButton').addEventListener('click', () => {
    document.querySelector('.triAndFilter').classList.toggle('open');
})


let usernames = Array.from(document.querySelectorAll("div[data-label='Nom']"));


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


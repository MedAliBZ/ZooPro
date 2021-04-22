let openP = Array.from(document.getElementsByClassName('tab-btn'));
let popup = document.querySelector('.overlay');
let closeP = document.querySelector('.close');

openP.map(el => el.addEventListener('click', () => {
    document.querySelector('html').style.overflow = "hidden";
    popup.style.visibility = 'visible';
    popup.style.opacity = 1;

    // close your eyes please :'( (MY LITTLE BROTHER CODED THAT :D)
    let admin = el.parentElement.parentElement.previousSibling.previousSibling.innerHTML;
    let email = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let username = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let id = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    // that doesn't represent me!!

    document.querySelector('.id-popup').value=id;
    document.querySelector('.email-popup').value=email;
    document.querySelector('.username-popup').value=username;
    if (admin !== 'utilisateur') {
        document.querySelector('.user-popup').removeAttribute('checked');
        document.querySelector('.admin-popup').setAttribute('checked', 'checked');
    }
    else {
        document.querySelector('.admin-popup').removeAttribute('checked');
        document.querySelector('.user-popup').setAttribute('checked', 'checked');
    }
}))

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

document.getElementById('sauvegarderB').addEventListener('click', (e) =>{
    if(!validateEmail(document.querySelector('.email-popup').value)){
        document.getElementById('errorPop').innerHTML="Forme email invalide!";
        document.querySelector('.email-popup').parentElement.style.border = "1px solid red";
        e.preventDefault();
    }

})

closeP.addEventListener('click', () => {
    document.querySelector('html').style.overflow = "auto";
    popup.style.visibility = 'hidden';
    popup.style.opacity = 0;
})



function validatePassword(password) {
    if (password.match(/[a-z]/g) && password.match(/[A-Z]/g) && password.match(/[0-9]/g) && password.match(/[^a-zA-Z\d]/g) && password.length >= 8)
        return true;
    else
        return false;
}

let saveButton = document.querySelector("form[class='card profile'] input[value='Sauvegrader']");
let email = document.querySelector("form[class='card profile'] input[name='email']");
let password = document.querySelector("form[class='card profile'] input[name='password']");
let errorProfile = document.querySelector("#error-msg");
saveButton.addEventListener("click", (e) => {
    if (!validateEmail(email.value)) {
        password.parentElement.style.border = "solid 1px #e8e8e9";
        email.parentElement.style.border = "1px solid red";
        errorProfile.innerHTML = 'email invalide';
        e.preventDefault();
    }
});



let cardNewPass = document.getElementById('card-newPass');
let cardConfirmPass = document.getElementById('card-confirmPass');
let cardButton = document.getElementById('card-changerPass');
let cardError = document.getElementById('error-msgPass');


cardButton.addEventListener("click",(e)=>{
    if (!validatePassword(cardNewPass.value)) {
        cardConfirmPass.parentElement.style.border = "solid 1px #e8e8e9";
        cardNewPass.parentElement.style.border = "1px solid red";
        cardError.innerHTML = 'Mot de passe doit contenir au moins 1 lettre majuscule, 1 lettre miniscule, 1 nombre et sa taille est supérieure a 8!';
        e.preventDefault();
    }
    else if(cardNewPass.value != cardConfirmPass.value){
        cardConfirmPass.parentElement.style.border = "1px solid red";
        cardNewPass.parentElement.style.border = "1px solid red";
        cardError.innerHTML = "Les mots de passes ne sont pas compatibles!";
        e.preventDefault();
    }
})
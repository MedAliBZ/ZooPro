let cardNewPass = document.getElementById('card-newPass');
let cardConfirmPass = document.getElementById('card-confirmPass');
let cardButton = document.getElementById('card-changerPass');
let cardError = document.getElementById('error-msgPass');

function validatePassword(password) {
    if (password.match(/[a-z]/g) && password.match(/[A-Z]/g) && password.match(/[0-9]/g) && password.match(/[^a-zA-Z\d]/g) && password.length >= 8)
        return true;
    else
        return false;
}

cardButton.addEventListener("click",(e)=>{
    if (!validatePassword(cardNewPass.value)) {
        cardConfirmPass.style.borderColor = "1px solid #e5e6e9";
        cardNewPass.style.borderColor = "red";
        cardError.innerHTML = 'Mot de passe doit contenir au moins 1 lettre majuscule, 1 lettre miniscule, 1 nombre et sa taille est supérieure a 8!';
        e.preventDefault();
    }
    if(cardNewPass.value != cardConfirmPass.value){
        cardConfirmPass.style.borderColor = "red";
        cardNewPass.style.borderColor = "red";
        cardError.innerHTML = "Les mots de passes ne sont pas compatibles!";
        e.preventDefault();
    }
})
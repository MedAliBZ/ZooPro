document.querySelector(".input-file").addEventListener("change", (event) => {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function () {
        var dataURL = reader.result;
        document.querySelector('.profilePic').style.backgroundImage = `url(${dataURL})`;
    };
    reader.readAsDataURL(input.files[0]);

})


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

    document.querySelector('.id-popup').value = id;
    document.querySelector('.email-popup').value = email;
    document.querySelector('.username-popup').value = username;
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

document.getElementById('sauvegarderB').addEventListener('click', (e) => {
    if (!validateEmail(document.querySelector('.email-popup').value)) {
        document.getElementById('errorPop').innerHTML = "Forme email invalide!";
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
let username = document.querySelector("form[class='card profile'] input[name='username']");
let password = document.querySelector("form[class='card profile'] input[name='password']");
let errorProfile = document.querySelector("#error-msg");
saveButton.addEventListener("click", (e) => {
    password.parentElement.style.border = "solid 1px #e8e8e9";
    username.parentElement.style.border = "solid 1px #e8e8e9";
    email.parentElement.style.border = "solid 1px #e8e8e9";
    if (username.value.length == 0) {
        username.parentElement.style.border = "1px solid red";
        errorProfile.innerHTML = 'Veillez remplir tous les champs!';
        e.preventDefault();
    }
    if (password.value.length == 0) {
        password.parentElement.style.border = "1px solid red";
        errorProfile.innerHTML = 'Veillez remplir tous les champs!';
        e.preventDefault();
    }

    if (email.value.length == 0) {
        email.parentElement.style.border = "1px solid red";
        errorProfile.innerHTML = 'Veillez remplir tous les champs!';
        e.preventDefault();
    }
    else if (!validateEmail(email.value)) {
        email.parentElement.style.border = "1px solid red";
        errorProfile.innerHTML = 'email invalide';
        e.preventDefault();
    }
});



let cardNewPass = document.getElementById('card-newPass');
let cardConfirmPass = document.getElementById('card-confirmPass');
let cardButton = document.getElementById('card-changerPass');
let cardError = document.getElementById('error-msgPass');


cardButton.addEventListener("click", (e) => {


    if (!validatePassword(cardNewPass.value)) {
        cardConfirmPass.parentElement.style.border = "solid 1px #e8e8e9";
        cardNewPass.parentElement.style.border = "1px solid red";
        cardError.innerHTML = 'Mot de passe doit contenir au moins 1 lettre majuscule, 1 lettre miniscule, 1 nombre et sa taille est supérieure a 8!';
        e.preventDefault();
    }
    else if (cardNewPass.value != cardConfirmPass.value) {
        cardConfirmPass.parentElement.style.border = "1px solid red";
        cardNewPass.parentElement.style.border = "1px solid red";
        cardError.innerHTML = "Les mots de passes ne sont pas compatibles!";
        e.preventDefault();
    }
})



document.querySelector('.triButton').addEventListener('click', () => {
    document.querySelector('.triAndFilter').classList.toggle('open');
})


let usernames = Array.from(document.querySelectorAll("div[data-label='Username']"));


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


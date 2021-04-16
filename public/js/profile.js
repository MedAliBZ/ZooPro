let openP = Array.from(document.getElementsByClassName('tab-btn'));
let popup = document.querySelector('.overlay');
let closeP = document.querySelector('.close');

openP.map(el => el.addEventListener('click', () => {
    popup.style.visibility = 'visible';
    popup.style.opacity = 1;

    // close your eyes please :'( (MY LITTLE BROTHER CODED THAT :D)
    let admin = el.parentElement.parentElement.previousSibling.previousSibling.innerHTML;
    let email = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let username = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let id = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    // that doesn't represent me!!

    document.querySelector('.id-popup').setAttribute('value', id);
    document.querySelector('.email-popup').setAttribute('value', email);
    document.querySelector('.username-popup').setAttribute('value', username);
    if (admin != 0) {
        document.querySelector('.user-popup').removeAttribute('checked');
        document.querySelector('.admin-popup').setAttribute('checked', 'checked');
    }
    else {
        document.querySelector('.admin-popup').removeAttribute('checked');
        document.querySelector('.user-popup').setAttribute('checked', 'checked');
    }
}))

closeP.addEventListener('click', () => {
    popup.style.visibility = 'hidden';
    popup.style.opacity = 0;
})

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function validatePassword(password) {
    if (password.match(/[a-z]/g) && password.match(/[A-Z]/g) && password.match(/[0-9]/g) && password.match(/[^a-zA-Z\d]/g) && password.length >= 8)
        return true;
    else
        return false;
}

let saveButton = document.querySelector("form[class='card profile'] input[value='Sauvegrader']");
let email = document.querySelector("form[class='card profile'] input[name='email']");
let password = document.querySelector("form[class='card profile'] input[name='password']");
let confirmPassword = document.querySelector("form[class='card profile'] input[name='confirmPassword']");
let errorProfile = document.querySelector("#error-msg");
saveButton.addEventListener("click", (e) => {
    if (!validateEmail(email.value)) {
        confirmPassword.parentElement.style.border = "solid 1px #e8e8e9";
        password.parentElement.style.border = "solid 1px #e8e8e9";
        email.parentElement.style.border = "1px solid red";
        errorProfile.innerHTML = 'email invalide';
        errorProfile.style.display = "block";
        e.preventDefault();
    }
    else if (!validatePassword(password.value)) {
        email.parentElement.style.border = "solid 1px #e8e8e9";
        confirmPassword.parentElement.style.border = "solid 1px #e8e8e9";
        password.parentElement.style.border = "1px solid red";
        errorProfile.innerHTML = 'Mot de passe invalide!';
        errorProfile.style.display = "block";
        e.preventDefault();
    }
    else if (confirmPassword.value !== password.value) {
        email.parentElement.style.border = "solid 1px #e8e8e9";
        password.parentElement.style.border = "solid 1px #e8e8e9";
        confirmPassword.parentElement.style.border = "1px solid red";
        errorProfile.innerHTML = 'les mots de passe ne correspondent pas!';
        errorProfile.style.display = "block";
        e.preventDefault();
    }
});
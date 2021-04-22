function validatePassword(password) {
    if (password.match(/[a-z]/g) && password.match(/[A-Z]/g) && password.match(/[0-9]/g) && password.match(/[^a-zA-Z\d]/g) && password.length >= 8)
        return true;
    else
        return false;
}

let signupButton = document.querySelector("ul[class='sign-up-form'] input[value='Changer']");
let password = document.querySelector("ul[class='sign-up-form'] input[name='password']");
let confirmPassword = document.querySelector("ul[class='sign-up-form'] input[name='confirmPassword']");
let errorSignup = document.querySelector("#error-msg-signup");

signupButton.addEventListener("click", (e) => {
    if (!validatePassword(password.value)) {
        confirmPassword.parentNode.style.borderColor = "var(--text-color)";
        password.parentNode.style.borderColor = "red";
        errorSignup.innerHTML = 'Mot de passe doit contenir au moins 1 lettre majuscule, 1 lettre miniscule, 1 nombre et sa taille est supérieure a 8!';
        e.preventDefault();
    }
    else if (confirmPassword.value !== password.value) {
        password.parentNode.style.parentNode.borderColor = "var(--text-color)";
        confirmPassword.parentNode.style.borderColor = "red";
        errorSignup.innerHTML = 'les mots de passe ne correspondent pas!';
        e.preventDefault();
    }
})
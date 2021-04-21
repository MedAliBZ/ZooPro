function validatePassword(password) {
  if (password.match(/[a-z]/g) && password.match(/[A-Z]/g) && password.match(/[0-9]/g) && password.match(/[^a-zA-Z\d]/g) && password.length >= 8)
    return true;
  else
    return false;
}

let signupButton = document.querySelector("form[class='sign-up-form'] input[value='Changer']");
let password=document.querySelector("form[class='sign-up-form'] input[name='password']");
let confirmPassword=document.querySelector("form[class='sign-up-form'] input[name='confirmPassword']");
let errorSignup=document.querySelector("#error-msg-signup");
signupButton.addEventListener("click",(e)=>{

if(!validatePassword(password.value)){
    confirmPassword.parentElement.style.border="0";
    password.parentElement.style.border="1px solid red";
    errorSignup.innerHTML='Mot de passe doit contenir au moins 1 lettre majuscule, 1 lettre miniscule, 1 nombre et sa taille est supérieure a 8!';
    e.preventDefault();
  }
  else if(confirmPassword.value!==password.value){
    password.parentElement.style.border="0";
    confirmPassword.parentElement.style.border="1px solid red";
    errorSignup.innerHTML='les mots de passe ne correspondent pas!';
    e.preventDefault();
  }
})
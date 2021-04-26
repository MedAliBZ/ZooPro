const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});


function validateEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function validatePassword(password) {
  if (password.match(/[a-z]/g) && password.match(/[A-Z]/g) && password.match(/[0-9]/g) && password.match(/[^a-zA-Z\d]/g) && password.length >= 8)
    return true;
  else
    return false;
}

let signupButton = document.querySelector("form[class='sign-up-form'] input[value='Sign up']");
let email=document.querySelector("form[class='sign-up-form'] input[name='email']");
let password=document.querySelector("form[class='sign-up-form'] input[name='password']");
let confirmPassword=document.querySelector("form[class='sign-up-form'] input[name='confirmPassword']");
let errorSignup=document.querySelector("#error-msg-signup");
signupButton.addEventListener("click",(e)=>{
  if(!validateEmail(email.value)){
    confirmPassword.parentElement.style.border="0";
    password.parentElement.style.border="0";
    email.parentElement.style.border="1px solid red";
    errorSignup.innerHTML='email invalide';
    errorSignup.style.display="block";
    e.preventDefault();
  }
  else if(!validatePassword(password.value)){
    email.parentElement.style.border="0";
    confirmPassword.parentElement.style.border="0";
    password.parentElement.style.border="1px solid red";
    errorSignup.innerHTML='Mot de passe invalide!';
    errorSignup.style.display="block";
    e.preventDefault();
  }
  else if(confirmPassword.value!==password.value){
    email.parentElement.style.border="0";
    password.parentElement.style.border="0";
    confirmPassword.parentElement.style.border="1px solid red";
    errorSignup.innerHTML='les mots de passe ne correspondent pas!';
    errorSignup.style.display="block";
    e.preventDefault();
  }
})
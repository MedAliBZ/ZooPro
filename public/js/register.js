
function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }
  
  function validatePassword(password) {
    if (password.match(/[a-z]/g) && password.match(/[A-Z]/g) && password.match(/[0-9]/g) && password.match(/[^a-zA-Z\d]/g) && password.length >= 8)
      return true;
    else
      return false;
  }
  
  let signupButton = document.querySelector("ul[class='sign-up-form'] input[name='sign-up']");
  let email=document.querySelector("ul[class='sign-up-form'] input[name='email']");
  let password=document.querySelector("ul[class='sign-up-form'] input[name='password']");
  let confirmPassword=document.querySelector("ul[class='sign-up-form'] input[name='confirmPassword']");
  let errorSignup=document.querySelector("#error-msg-signup");
  signupButton.addEventListener("click",(e)=>{
    if(!validateEmail(email.value)){
      confirmPassword.style.borderColor="var(--text-color)";
      password.style.borderColor="var(--text-color)";
      email.style.borderColor="red";
      errorSignup.innerHTML='email invalide';
      e.preventDefault();
    }
    else if(!validatePassword(password.value)){
      email.style.borderColor="var(--text-color)";
      confirmPassword.style.borderColor="var(--text-color)";
      password.style.borderColor="red";
      errorSignup.innerHTML='Mot de passe doit contenir au moins 1 lettre majuscule, 1 lettre miniscule, 1 nombre et sa taille est supérieure a 8!';
      e.preventDefault();
    }
    else if(confirmPassword.value!==password.value){
      email.style.borderColor="var(--text-color)";
      password.style.borderColor="var(--text-color)";
      confirmPassword.style.borderColor="red";
      errorSignup.innerHTML='les mots de passe ne correspondent pas!';
      e.preventDefault();
    }
  })
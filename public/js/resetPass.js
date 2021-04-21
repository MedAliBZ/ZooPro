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

let signupButton = document.querySelector("form[class='sign-up-form'] input[value='Chercher']");
let email=document.querySelector("form[class='sign-up-form'] input[name='email']");
let errorSignup=document.querySelector("#error-msg-signup");
signupButton.addEventListener("click",(e)=>{
  if(!validateEmail(email.value)){
    email.parentElement.style.border="1px solid red";
    errorSignup.innerHTML='email invalide!';
    e.preventDefault();
  }
})
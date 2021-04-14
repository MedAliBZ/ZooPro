let ajouter=document.querySelector('.ajouter-m');
let popup = document.querySelector('.popup');

ajouter.addEventListener('click',()=>{
    popup.style.top='0';
})

document.querySelector('.ann').addEventListener('click',(e)=>{
    e.preventDefault();
    popup.style.top='-100%';
})
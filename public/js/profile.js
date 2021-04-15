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

    document.querySelector('.id-popup').setAttribute('value',id);
    document.querySelector('.email-popup').setAttribute('value',email);
    document.querySelector('.username-popup').setAttribute('value',username);
    document.querySelector('.admin-popup').setAttribute('value',admin);
}))

closeP.addEventListener('click', () => {
    popup.style.visibility = 'hidden';
    popup.style.opacity = 0;
})
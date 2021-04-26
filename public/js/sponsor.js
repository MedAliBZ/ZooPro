let openP = Array.from(document.getElementsByClassName('tab-btn'));
let popup = document.querySelector('.overlay');
let closeP = document.querySelector('.close');
let ajouterButton = document.getElementById('ajoutersponor');
let sendButton = document.getElementById('sendemail');

let popupAjouter = document.querySelector('.overlayAjouter');
let closePA = document.querySelector('.closeAjouter');

let popupsend = document.querySelector('.overlaysend');
let closesend = document.querySelector('.closesend');

// let nomA = document.querySelector('#nom-popupA');
// let dateA = document.querySelector('#email-popupA');
// let nbA = document.querySelector('#nb-popupA');

ajouterButton.addEventListener('click', () => {
    document.querySelector('#nom-popupA').value='';
    document.querySelector('#nb-popupA').value='';
    document.querySelector('#email-popupA').value='';
    
    
    popupAjouter.style.visibility = 'visible';
    popupAjouter.style.opacity = 1;
});

closePA.addEventListener('click', () => {
    popupAjouter.style.visibility = 'hidden';
    popupAjouter.style.opacity = 0;
})

sendButton.addEventListener('click', () => {
    document.querySelector('#nom-popups').value='';
    document.querySelector('#sujet-popups').value='';
    document.querySelector('#email-popups').value='';
    document.querySelector('#message-popups').value='';
    
    
    popupsend.style.visibility = 'visible';
    popupsend.style.opacity = 1;
});

closesend.addEventListener('click', () => {
    popupsend.style.visibility = 'hidden';
    popupsend.style.opacity = 0;
})


openP.map(el => el.addEventListener('click', () => {
    popup.style.visibility = 'visible';
    popup.style.opacity = 1;

    // close your eyes please :'( (MY LITTLE BROTHER CODED THAT :D)
    let email = el.parentElement.parentElement.previousSibling.previousSibling.innerHTML;
    let nb = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let nom = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    let id = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    
    // that doesn't represent me!!

    document.querySelector('.email-popup').value=email;
    document.querySelector('.nb-popup').value=nb;
    document.querySelector('.nom-popup').value=nom;
    document.querySelector('.id-popup').value=id;
}))

closeP.addEventListener('click', () => {
    popup.style.visibility = 'hidden';
    popup.style.opacity = 0;
})

function sendEmail()
{
    var name = $("#nom-popups");
    var email = $("#email-popups");
    var subject = $("#sujet-popups");
    var body = $("#message-popups");
    if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body))
    {
        $.ajax({
            url: 'sendEmail.php',
            method: 'POST',
            dataType: 'json',
            data:{
                name: name.val(),
                email: email.val(),
                subject: subject.val(),
                body: body.val()
            }, success: function(reponse){
                $('#myForm')[0].reset();
                
            }
        });
    }
}

function isNotEmpty(caller){
    if(caller.val() == ""){
        caller.css('border','1px solid red');
        return false;
    }   
    else
    {
        caller.css('border','');
        return true;
    }
}
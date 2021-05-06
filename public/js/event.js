let openP = Array.from(document.getElementsByClassName('tab-btn'));
let popup = document.querySelector('.overlay');
let closeP = document.querySelector('.close');
let ajouterButton = document.getElementById('ajouterevent');

let popupAjouter = document.querySelector('.overlayAjouter');
let closePA = document.querySelector('.closeAjouter');

let nomA = document.querySelector('#nom-popupA');
let dateA = document.querySelector('#BD-popupA');
let nbA = document.querySelector('#nb-popupA');
let photoA = document.querySelector('#photo-popupA');
let desA = document.querySelector('#description-popupA');

let today = new Date();
let dd = today.getDate();
let mm = today.getMonth()+1; //January is 0!
let yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("BD-popupA").setAttribute("min", today);







ajouterButton.addEventListener('click', () => {
    document.querySelector('#nom-popupA').value='';
    document.getElementById('errorAjnom').innerHTML='';
    nomA.parentElement.style.border='solid 1px #e8e8e9';

    document.querySelector('#BD-popupA').value='';
    document.getElementById('errorAjdate').innerHTML='';
    dateA.parentElement.style.border='solid 1px #e8e8e9';

    document.querySelector('#nb-popupA').value='';
    document.getElementById('errorAjnb').innerHTML='';
    nbA.parentElement.style.border='solid 1px #e8e8e9';

    document.querySelector('#photo-popupA').value='';
    document.getElementById('errorAjphoto').innerHTML='';
    photoA.parentElement.style.border='solid 1px #e8e8e9';

    document.querySelector('#description-popupA').value='';
    document.getElementById('errorAjdes').innerHTML='';
    desA.parentElement.style.border='solid 1px #e8e8e9';

    popupAjouter.style.visibility = 'visible';
    popupAjouter.style.opacity = 1;
});

closePA.addEventListener('click', () => {
    popupAjouter.style.visibility = 'hidden';
    popupAjouter.style.opacity = 0;
})

openP.map(el => el.addEventListener('click', () => {
    popup.style.visibility = 'visible';
    popup.style.opacity = 1;

    // close your eyes please :'( (MY LITTLE BROTHER CODED THAT :D)
     let nb = el.parentElement.parentElement.previousSibling.previousSibling.innerHTML;
     let date = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML
     let nom = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
     let id = el.parentElement.parentElement.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    // that doesn't represent me!!
  

    document.querySelector('.nb-popup').value=nb;
    document.querySelector('.nom-popup').value=nom;
    document.querySelector('.BD-popup').value=date;
    document.querySelector('.id-popup').value=id;
    //document.querySelector('.photo-popup').value=photo;
    //document.querySelector('.description-popup').value=description;
    
}))

closeP.addEventListener('click', () => {
    popup.style.visibility = 'hidden';
    popup.style.opacity = 0;
})

function resetErrorsPopUp(){
    document.getElementById('errorAj').innerHTML='';
    nbA.parentElement.style.border='solid 1px #e8e8e9';
    dateA.parentElement.style.border='solid 1px #e8e8e9';
    desA.parentElement.style.border='solid 1px #e8e8e9';
    nomA.parentElement.style.border='solid 1px #e8e8e9';
    photoA.parentElement.style.border='solid 1px #e8e8e9';
}

document.querySelector('#ajouterPopup').addEventListener('click',(e)=>{

    if(nbA.value.length==0)
    {
     document.getElementById('errorAjnb').innerHTML='La case est vide.Veuillez saisir un nombre!';
     nbA.parentElement.style.border='1px solid red';
     e.preventDefault();
    }
    else if((nbA.value<0)||(nbA.value==0)){ 
    document.getElementById('errorAjnb').innerHTML='Veuillez saisir un nombre strictement positif!';
    nbA.parentElement.style.border='1px solid red';
    e.preventDefault();
    }
    else
    {
     document.getElementById('errorAjnb').innerHTML='';
     nbA.parentElement.style.border='solid 1px #e8e8e9'; 
    }


    if(photoA.value.length==0)
    {
     document.getElementById('errorAjphoto').innerHTML='La case est vide.Veuillez saisir une photo!';
     photoA.parentElement.style.border='1px solid red';
     e.preventDefault();
    }
     else
    {
    document.getElementById('errorAjphoto').innerHTML='';
    photoA.parentElement.style.border='solid 1px #e8e8e9';
    }
    
    if(nomA.value.length==0)
    {
     document.getElementById('errorAjnom').innerHTML='La case est vide.Veuillez saisir un nom!';
     nomA.parentElement.style.border='1px solid red';
     e.preventDefault();
    }
     else
    {
    document.getElementById('errorAjnom').innerHTML='';
    nomA.parentElement.style.border='solid 1px #e8e8e9';
    }

    if(desA.value.length==0)
    {
     document.getElementById('errorAjdes').innerHTML='La case est vide.Veuillez saisir une description!';
     desA.parentElement.style.border='1px solid red';
     e.preventDefault();
    }
     else
    {
    document.getElementById('errorAjdes').innerHTML='';
    desA.parentElement.style.border='solid 1px #e8e8e9';
    }

    if(dateA.value.length==0)
    {
     document.getElementById('errorAjdate').innerHTML='La case est vide.Veuillez saisir une date!';
     dateA.parentElement.style.border='1px solid red';
     e.preventDefault();
    }
     else
    {
    document.getElementById('errorAjdate').innerHTML='';
    dateA.parentElement.style.border='solid 1px #e8e8e9';
    }



})

let nbM = document.querySelector('.nb-popup');
let nomM = document.querySelector('.nom-popup');
let dateM = document.querySelector('.BD-popup');


 document.querySelector('#modifierPopupM').addEventListener('click',(e)=>{
    if(nbM.value.length==0)
    {
     document.getElementById('errorMdnb').innerHTML='La case est vide.Veuillez saisir un nombre!';
     nbM.parentElement.style.border='1px solid red';
     e.preventDefault();
    }
    else if((nbM.value<0)||(nbM.value==0)){ 
    document.getElementById('errorMdnb').innerHTML='Veuillez saisir un nombre strictement positif!';
    nbM.parentElement.style.border='1px solid red';
    e.preventDefault();
    }
    else
    {
     document.getElementById('errorMdnb').innerHTML='';
     nbM.parentElement.style.border='solid 1px #e8e8e9'; 
    }

    if(nomM.value.length==0)
    {
     document.getElementById('errorMdnom').innerHTML='La case est vide.Veuillez saisir un nom!';
     nomM.parentElement.style.border='1px solid red';
     e.preventDefault();
    }
     else
    {
    document.getElementById('errorMdnom').innerHTML='';
    nomM.parentElement.style.border='solid 1px #e8e8e9';
    }

    if(dateM.value.length==0)
    {
     document.getElementById('errorMddate').innerHTML='La case est vide.Veuillez saisir une date!';
     dateM.parentElement.style.border='1px solid red';
     e.preventDefault();
    }
     else
    {
    document.getElementById('errorMddate').innerHTML='';
    dateM.parentElement.style.border='solid 1px #e8e8e9';
    }




 })

//  function verifDate(date) {
//      d = new Date();
//      if (date > d.getDate())
//      {return true;}
//      else
//      return false;
//  } 
// const d = new Date();
//  document.getElementById('ajouterPopup').addEventListener('click',(e) =>{
//      if(document.querySelector('#BD-popupA').value < d.getDate())
//      {
//          document.getElementById('errorAj').innerHTML="date invalide";
//          dateA.parentElement.style.border='solid 1px red';
//          e.preventDefault();
//      }
//  })

google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['evenement', 'Nombre de places'],
        ['Nombre de place ≥ 100', document.getElementById('donutchart').getAttribute('sup')*1],
        ['Nombre de place < 100', document.getElementById('donutchart').getAttribute('inf')*1]
    ]);

    var options = {
        title: 'Nombre de places',
        pieHole: 0.4,
        height: 300,
        slices: {
            1: { offset: 0.1 },
        }
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
}
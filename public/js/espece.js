// CS ajout
let addButtonToList = document.getElementById('addButtonToList');
let nomE = document.querySelector('#nomE');
let hauteur = document.querySelector('#hauteur');



addButtonToList.addEventListener('click', () => {
  document.querySelector('#nomE').value='';
  document.querySelector('#hauteur').value='';
  
  
  /*popupAjouter.style.visibility = 'visible';
  popupAjouter.style.opacity = 1;*/
});

document.querySelector('#ajouterPopup').addEventListener('click',(e)=>{
resetErrorsPopUp();
if(nomE.value.length==0)
{
 document.getElementById('errorAjnom').innerHTML='Veuillez saisir un nom!';
 nomE.parentElement.style.border='1px solid red';
 e.preventDefault();}
else if(/\d/.test(nomE.value)){ 
    document.getElementById('errorAjnom').innerHTML='nom ne doit pas contenir de nombres!';
   nomE.parentElement.style.border='1px solid red';
    e.preventDefault();
}
else
  {
   document.getElementById('errorAjnom').innerHTML='';
   nomE.parentElement.style.border='solid 1px #e8e8e9'; 
  }


  if  (hauteur.value==0){ 
    document.getElementById('errorAjhauteur').innerHTML='Veuillez saisir un nombre!';
    hauteur.parentElement.style.border='1px solid red';
    e.preventDefault();}
    else if((hauteur.value<0)||(hauteur.value==0)){ 
    document.getElementById('errorAjhauteur').innerHTML='Veuillez saisir un nombre positif!';
    hauteur.parentElement.style.border='1px solid red';
    e.preventDefault();}
    else
    {
    document.getElementById('errorAjhauteur').innerHTML='';
    hauteur.parentElement.style.border='solid 1px #e8e8e9'; 
    }


})

function resetErrorsPopUp(){
  document.getElementById('errorAjnom').innerHTML='';
  document.getElementById('errorAjhauteur').innerHTML='';
  nomE.parentElement.style.border='solid 1px #e8e8e9';
  hauteur.parentElement.style.border='solid 1px #e8e8e9';
  
}



















function openFormAjouter() {
    document.getElementById("myForm").style.display = "flex";
    document.getElementById("tableespece").style.opacity = 0.5;
    document.getElementById("firstRow").style.opacity = 0.5;
    document.getElementById("addButtonToList").style.opacity = 0.5;
    document.getElementById("search").style.opacity = 0.5;
  }
  function openFormModifier() {

    document.getElementById("myForm1").style.display = "flex";
    document.getElementById("tableespece").style.opacity = 0.5;
    document.getElementById("firstRow").style.opacity = 0.5;
    document.getElementById("addButtonToList").style.opacity = 0.5;
    document.getElementById("search").style.opacity = 0.5;

    $( ".tblRows" ).click(function() {
      var row_data = $(this).attr("data");
      console.log(row_data);
    
      var str = row_data.split("-");
      document.querySelector('#idE').value=str[0];
      document.querySelector('#nomE1').value=str[1];
      document.querySelector('#hauteur1').value=str[2];
     
     
  });

  }

  
  function closeForm() {

      document.querySelector('#nomE').value='';
      document.querySelector('#hauteur').value='';
     
 

    document.getElementById("myForm").style.display = "none";
    document.getElementById("tableespece").style.opacity = 1;
    document.getElementById("firstRow").style.opacity = 1;
    document.getElementById("addButtonToList").style.opacity = 1;
    document.getElementById("search").style.opacity = 1;

  }
  function closeFormModifier() {

    document.querySelector('#nomE1').value='';
    document.querySelector('#hauteur1').value='';
    

    document.getElementById("myForm1").style.display = "none";
    document.getElementById("tableespece").style.opacity = 1;
    document.getElementById("firstRow").style.opacity = 1;
    document.getElementById("addButtonToList").style.opacity = 1;
    document.getElementById("search").style.opacity = 1;

  }

  google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Salaire', 'Nombre'],
        ['hauteur ≥ 100', document.getElementById('donutchart').getAttribute('sup')*1],
        ['hauteur < 100', document.getElementById('donutchart').getAttribute('inf')*1]
    ]);

    var options = {
        title: 'Hauteur des éspéces',
        pieHole: 0.4,
        height: 300,
        slices: {
            1: { offset: 0.1 },
        }
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
}
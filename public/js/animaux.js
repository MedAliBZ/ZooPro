function openFormAjouter() {
  document.getElementById("myForm").style.display = "flex";
  document.getElementById("tableAnimaux").style.opacity = 0.5;
  document.getElementById("firstRow").style.opacity = 0.5;
  document.getElementById("addButtonToList").style.opacity = 0.5;
  //document.getElementById("search").style.opacity = 0.5;
}
function openFormModifier() {

  document.getElementById("myForm1").style.display = "flex";
  document.getElementById("tableAnimaux").style.opacity = 0.5;
  document.getElementById("firstRow").style.opacity = 0.5;
  document.getElementById("addButtonToList").style.opacity = 0.5;
  //document.getElementById("search").style.opacity = 0.5;

  $(".tblRows").click(function () { 
    var row_data = $(this).attr("data");
    console.log(row_data);

    var str = row_data.split("-");
    document.querySelector('#id').value = str[0];
    document.querySelector('#nomAnimal1').value = str[1];
    document.querySelector('#type1').value = str[2];
    document.querySelector('#age1').value = str[3];
    document.querySelector('#pays1').value = str[4];
    document.querySelector('#status1').value = str[5];
    document.querySelector('#regimeAlimentaire1').value = str[6];
    //document.getElementById('image1').src="../public/img/"+str[7];
    console.log(str[7]);


  });

}


function closeForm() {

  reset();

  document.querySelector('#nomAnimal').value = '';
  document.querySelector('#type').value = 0;
  document.querySelector('#age').value = '';
  document.querySelector('#pays').value = '';
  document.querySelector('#status').value = 0;
  document.querySelector('#regimeAlimentaire').value = 0;


  document.getElementById("myForm").style.display = "none";
  document.getElementById("tableAnimaux").style.opacity = 1;
  document.getElementById("firstRow").style.opacity = 1;
  document.getElementById("addButtonToList").style.opacity = 1;
  //document.getElementById("search").style.opacity = 1;


}
function closeFormModifier() {

 
  document.getElementById("myForm1").style.display = "none";
  document.getElementById("tableAnimaux").style.opacity = 1;
  document.getElementById("firstRow").style.opacity = 1;
  document.getElementById("addButtonToList").style.opacity = 1;
 // document.getElementById("search").style.opacity = 1;

}

//control saisie 

document.getElementById('ajouterAnimal').addEventListener('click', (e) => {

  let nomAnimal = document.getElementById("nomAnimal").value;


  let type = document.getElementById("type");
  let indexT = type.selectedIndex;

  let pays = document.getElementById("pays").value;

  let status = document.getElementById("status");
  let indexS = status.selectedIndex;

  let regimeAlimentaire = document.getElementById("regimeAlimentaire");
  let indexR = regimeAlimentaire.selectedIndex;



  let errorRegimeAlimentaire = document.getElementById("errorRegimeAlimentaire");
  let errorType = document.getElementById("errorType");

  let errorPays = document.getElementById("errorPays");

  let errorStatus = document.getElementById("errorStatus");
  let errorNomAnimal = document.getElementById("errorNomAnimal");


  //validate régime
  if (indexR == 0) {
    errorRegimeAlimentaire.innerHTML = "merci de choisir un regime alimentaire";
    document.getElementById("regimeAlimentaire").parentElement.style.border = "1px solid red";
    e.preventDefault();
  }
  else
  {
    errorRegimeAlimentaire.style.display = "none";
    document.getElementById("regimeAlimentaire").parentElement.style.border = "solid 1px #e8e8e9";

  }
  //validate type
  if (indexT == 0) {
    errorType.innerHTML = "merci de choisir un type";
    document.getElementById("type").parentElement.style.border = "1px solid red";
    e.preventDefault();
  }
  else
  {
    errorType.style.display = "none";
    document.getElementById("type").parentElement.style.border = "solid 1px #e8e8e9";
    
  }
  //validate status
  if (indexS == 0) {
    errorStatus.innerHTML = "merci de choisir une statut de conservation";
    document.getElementById("status").parentElement.style.border = "1px solid red";
    e.preventDefault();
  }
  else
  {
    errorStatus.style.display = "none";
    document.getElementById("status").parentElement.style.border = "solid 1px #e8e8e9";
  }

  //validate name
  if (!validateString(nomAnimal)) {
    errorNomAnimal.innerHTML = "merci d'ecrire juste des lettres alphabétiques";
    document.getElementById("nomAnimal").parentElement.style.border = "1px solid red";
    e.preventDefault();
  }
  else
  {
    errorNomAnimal.style.display = "none";
    document.getElementById("nomAnimal").parentElement.style.border = "solid 1px #e8e8e9";
    
  }

  //validate pays
  if (!validateString(pays)) {
    errorPays.innerHTML = "merci d'ecrire juste des lettres alphabétiques";
    document.getElementById("pays").parentElement.style.border = "1px solid red";
    e.preventDefault();
  }
  else
  {
    errorPays.style.display = "none";
    document.getElementById("pays").parentElement.style.border = "solid 1px #e8e8e9";

  }
})

function validateString(str) {
  if (str.match(/[a-z]/g))
    return true;
  else
    return false
}

function reset()
{
    errorRegimeAlimentaire.style.display = "none";
    document.getElementById("regimeAlimentaire").parentElement.style.border = "solid 1px #e8e8e9";

    errorType.style.display = "none";
    document.getElementById("type").parentElement.style.border = "solid 1px #e8e8e9";

    errorStatus.style.display = "none";
    document.getElementById("status").parentElement.style.border = "solid 1px #e8e8e9";

    errorNomAnimal.style.display = "none";
    document.getElementById("nomAnimal").parentElement.style.border = "solid 1px #e8e8e9";

    errorPays.style.display = "none";
    document.getElementById("pays").parentElement.style.border = "solid 1px #e8e8e9";


}


document.getElementById('modifierAnimal').addEventListener('click', (e1) => {

  let nomAnimal1 = document.getElementById("nomAnimal1").value;

  let type1 = document.getElementById("type1");
  let indexT1 = type1.selectedIndex;

  let pays1 = document.getElementById("pays1").value;

  let status1 = document.getElementById("status1");
  let indexS1 = status1.selectedIndex;

  let regimeAlimentaire1 = document.getElementById("regimeAlimentaire1");
  let indexR1 = regimeAlimentaire1.selectedIndex;



  let errorRegimeAlimentaire1 = document.getElementById("errorRegimeAlimentaire1");
  let errorType1 = document.getElementById("errorType1");

  let errorPays1 = document.getElementById("errorPays1");

  let errorStatus1 = document.getElementById("errorStatus1");
  let errorNomAnimal1 = document.getElementById("errorNomAnimal1");

  //validate régime
  if (indexR1 == 0) {
    errorRegimeAlimentaire1.innerHTML = "merci de choisir un regime alimentaire";
    document.getElementById("regimeAlimentaire1").parentElement.style.border = "1px solid red";
    e1.preventDefault();
  }
  //validate type
  if (indexT1 == 0) {
    errorType1.innerHTML = "merci de choisir un type";
    document.getElementById("type1").parentElement.style.border = "1px solid red";
    e1.preventDefault();
  }
  //validate status
  if (indexS1 == 0) {
    errorStatus1.innerHTML = "merci de choisir une statut de conservation";
    document.getElementById("status1").parentElement.style.border = "1px solid red";
    e1.preventDefault();
  }

  //validate name
  if (!validateString(nomAnimal1)) {
    errorNomAnimal1.innerHTML = "merci d'ecrire juste des lettres alphabétiques";
    document.getElementById("nomAnimal1").parentElement.style.border = "1px solid red";
    e1.preventDefault();
  }

  //validate pays
  if (!validateString(pays1)) {
    errorPays1.innerHTML = "merci d'ecrire juste des lettres alphabétiques";
    document.getElementById("pays1").parentElement.style.border = "1px solid red";
    e1.preventDefault();
  }
})


//recherche function
// let nomAnimal = Array.from(document.querySelectorAll("td[data-label='Nom']"));

// document.getElementById('rechercher').addEventListener('keyup', (e) => {
//   nomAnimal.map(el => {
//       if (el.innerHTML.toLowerCase().search(e.target.value.toLowerCase()) == -1) {
//           el.parentElement.style.display = 'none';
//       }
//       else {
//         el.parentElement.style.display = 'flex';     
//     }
//   })
// })


document.getElementById('triButton').addEventListener('click', (e1) => {

  document.getElementById('triElements').style.display='flex';

})


//statestic

google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Status de conservation', 'Nombre'],
        ['Stable', document.getElementById('animalchart').getAttribute('stable')*1],
        ['Menacé', document.getElementById('animalchart').getAttribute('menace')*1],
        ['En danger', document.getElementById('animalchart').getAttribute('endanger')*1]
    ]);

    var options = {
        title: 'Status de conservation supérieur des Animaux',
        pieHole: 0.4,
        height: 300,
        slices: {
            0: { offset: 0 , color: '#007c6c' },
            1: { offset: 0 ,color: 'rgb(242,121,0)'},
            2: { offset: 0 , color: 'rgb(191,0,0)' },
            
        }
    };

    var chart = new google.visualization.PieChart(document.getElementById('animalchart'));
    chart.draw(data, options);
}

////



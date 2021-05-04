function openFormAjouter() {
  document.getElementById("myForm").style.display = "flex";
  document.getElementById("tableRegime").style.opacity = 0.5;
  document.getElementById("firstRow").style.opacity = 0.5;
  document.getElementById("addButtonToList").style.opacity = 0.5;
  document.getElementById("triButton").style.opacity = 0.5;
  //document.getElementById("search").style.opacity = 0.5;
}
function openFormModifier() {

  document.getElementById("myForm1").style.display = "flex";
  document.getElementById("tableRegime").style.opacity = 0.5;
  document.getElementById("firstRow").style.opacity = 0.5;
  document.getElementById("addButtonToList").style.opacity = 0.5;
  document.getElementById("triButton").style.opacity = 0.5;
  //document.getElementById("search").style.opacity = 0.5;

  $(".tblRows").click(function () {
    var row_data = $(this).attr("data");
    console.log(row_data);

    var str = row_data.split("-");
    document.querySelector('#id').value = str[0];
    document.querySelector('#regimeAlimentaire1').value = str[1];
    document.querySelector('#typeNourriture1').value = str[2];
    document.querySelector('#quantiteParRepas1').value = str[3];
    document.querySelector('#nombre_de_repas1').value = str[4];

  });

}


function closeForm() {

  document.querySelector('#regimeAlimentaire').value = '0';
  document.querySelector('#typeNourriture').value = '';
  document.querySelector('#quantiteParRepas').value = '';
  document.querySelector('#nombre_de_repas').value = '';


  document.getElementById("myForm").style.display = "none";
  document.getElementById("tableRegime").style.opacity = 1;
  document.getElementById("firstRow").style.opacity = 1;
  document.getElementById("addButtonToList").style.opacity = 1;
  document.getElementById("triButton").style.opacity = 1;
  //document.getElementById("search").style.opacity = 1;

  reset();

}
function closeFormModifier() {

  document.querySelector('#regimeAlimentaire1').value = '0';
  document.querySelector('#typeNourriture1').value = '';
  document.querySelector('#quantiteParRepas1').value = '';
  document.querySelector('#nombre_de_repas1').value = '';

  document.getElementById("myForm1").style.display = "none";
  document.getElementById("tableRegime").style.opacity = 1;
  document.getElementById("firstRow").style.opacity = 1;
  document.getElementById("addButtonToList").style.opacity = 1;
  document.getElementById("triButton").style.opacity = 1;
  //document.getElementById("search").style.opacity = 1;
  reset1();
}


document.getElementById('ajouterRegime').addEventListener('click', (e) => {
  let typeNourriture = document.getElementById("typeNourriture").value;

  let quantiteParRepas = document.getElementById("quantiteParRepas").value;
  let nombre_de_repas = document.getElementById("nombre_de_repas").value;

  let errorRegimeAlimentaire = document.getElementById("errorRegimeAlimentaire");
  let errorTypeNourriture = document.getElementById("errorTypeNourriture");
  let errorQuantiteParRepas = document.getElementById("errorQuantiteParRepas");
  let errorNombreDeRepas = document.getElementById("errorNombreDeRepas");

  let regimeAlimentaire = document.getElementById("regimeAlimentaire");
  let index = regimeAlimentaire.selectedIndex;

  if (index == 0) {
    errorRegimeAlimentaire.innerHTML = "merci de choisir un regime alimentaire";
    document.getElementById("regimeAlimentaire").parentElement.style.border = "1px solid red";
    e.preventDefault();
  }
  else {
    errorRegimeAlimentaire.style.display = "none";
    document.getElementById("regimeAlimentaire").parentElement.style.border = "solid 1px #e8e8e9";
  }

  if (!validateString(typeNourriture)) {
    errorTypeNourriture.innerHTML = "merci d'ecrire juste des lettres alphabétiques";
    document.getElementById("typeNourriture").parentElement.style.border = "1px solid red";
    e.preventDefault();
  }
  else {
    errorTypeNourriture.style.display = "none";
    document.getElementById("typeNourriture").parentElement.style.border = "solid 1px #e8e8e9";
  }

  if (isNaN(quantiteParRepas) || quantiteParRepas.length == 0 || quantiteParRepas<0 ) {
    errorQuantiteParRepas.innerHTML = "merci d'ecrire juste des nombres positifs";
    document.getElementById("quantiteParRepas").parentElement.style.border = "1px solid red";
    e.preventDefault();
  }
  else {
    errorQuantiteParRepas.style.display = "none";
    document.getElementById("quantiteParRepas").parentElement.style.border = "solid 1px #e8e8e9";
  }
  if (isNaN(nombre_de_repas) || nombre_de_repas.length == 0 || nombre_de_repas<0) {
    errorNombreDeRepas.innerHTML = "merci d'ecrire juste des nombres positifs";
    document.getElementById("nombre_de_repas").parentElement.style.border = "1px solid red";
    e.preventDefault();
  }
  else {
    errorNombreDeRepas.style.display = "none";
    document.getElementById("nombre_de_repas").parentElement.style.border = "solid 1px #e8e8e9";
  }

})

function validateString(str) {
  if (str.match(/[a-z]/g))
    return true;
  else
    return false
}

function reset() {
  errorTypeNourriture.style.display = "none";
  document.getElementById("typeNourriture").parentElement.style.border = "solid 1px #e8e8e9";
  errorNombreDeRepas.style.display = "none";
  document.getElementById("nombre_de_repas").parentElement.style.border = "solid 1px #e8e8e9";
  errorQuantiteParRepas.style.display = "none";
  document.getElementById("quantiteParRepas").parentElement.style.border = "solid 1px #e8e8e9";
  errorRegimeAlimentaire.style.display = "none";
  document.getElementById("regimeAlimentaire").parentElement.style.border = "solid 1px #e8e8e9";

}

function reset1() {
  errorTypeNourriture1.style.display = "none";
  document.getElementById("typeNourriture1").parentElement.style.border = "solid 1px #e8e8e9";
  errorNombreDeRepas1.style.display = "none";
  document.getElementById("nombre_de_repas1").parentElement.style.border = "solid 1px #e8e8e9";
  errorQuantiteParRepas1.style.display = "none";
  document.getElementById("quantiteParRepas1").parentElement.style.border = "solid 1px #e8e8e9";
  errorRegimeAlimentaire1.style.display = "none";
  document.getElementById("regimeAlimentaire1").parentElement.style.border = "solid 1px #e8e8e9";

}



document.getElementById('modifierRegime').addEventListener('click', (e) => {
  let typeNourriture1 = document.getElementById("typeNourriture1").value;

  let quantiteParRepas1 = document.getElementById("quantiteParRepas1").value;
  let nombre_de_repas1 = document.getElementById("nombre_de_repas1").value;

  let errorRegimeAlimentaire1 = document.getElementById("errorRegimeAlimentaire1");
  let errorTypeNourriture1 = document.getElementById("errorTypeNourriture1");
  let errorQuantiteParRepas1 = document.getElementById("errorQuantiteParRepas1");
  let errorNombreDeRepas1 = document.getElementById("errorNombreDeRepas1");

  let regimeAlimentaire1 = document.getElementById("regimeAlimentaire1");
  let index1 = regimeAlimentaire1.selectedIndex;

  if (index1 == 0) {
    errorRegimeAlimentaire1.innerHTML = "merci de choisir un regime alimentaire";
    document.getElementById("regimeAlimentaire1").parentElement.style.border = "1px solid red";
    e.preventDefault();
  }
  // else
  // {
  //   errorRegimeAlimentaire1.style.display="none";
  //   document.getElementById("regimeAlimentaire1").parentElement.style.border = "solid 1px #e8e8e9";
  // }

  if (!validateString(typeNourriture1)) {
    errorTypeNourriture1.innerHTML = "merci d'ecrire juste des lettres alphabétiques";
    document.getElementById("typeNourriture1").parentElement.style.border = "1px solid red";
    e.preventDefault();
  }
  // else
  // {
  //   errorTypeNourriture1.style.display="none";
  //   document.getElementById("typeNourriture1").parentElement.style.border = "solid 1px #e8e8e9";
  // }

  if (isNaN(quantiteParRepas1) || quantiteParRepas1.length == 0 || quantiteParRepas1<0 ) {
    errorQuantiteParRepas1.innerHTML = "merci d'ecrire juste des nombres positifs";
    document.getElementById("quantiteParRepas1").parentElement.style.border = "1px solid red";
    e.preventDefault();
  }
  // else
  // {
  //   errorQuantiteParRepas1.style.display="none";
  //   document.getElementById("quantiteParRepas1").parentElement.style.border = "solid 1px #e8e8e9";
  // }
  if (isNaN(nombre_de_repas1) || nombre_de_repas1.length == 0 || nombre_de_repas1<0 ) {
    errorNombreDeRepas1.innerHTML = "merci d'ecrire juste des nombres positifs";
    document.getElementById("nombre_de_repas1").parentElement.style.border = "1px solid red";
    e.preventDefault();
  }
  // else
  // {
  //   errorNombreDeRepas1.style.display="none";
  //   document.getElementById("nombre_de_repas1").parentElement.style.border = "solid 1px #e8e8e9";
  // }

})



//tri button
document.getElementById('triButton').addEventListener('click', (e1) => {

  document.getElementById('triElements').style.display = 'flex';

})
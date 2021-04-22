function openFormAjouter() {
    document.getElementById("myForm").style.display = "flex";
    document.getElementById("tableAnimaux").style.opacity = 0.5;
    document.getElementById("firstRow").style.opacity = 0.5;
    document.getElementById("addButtonToList").style.opacity = 0.5;
    document.getElementById("search").style.opacity = 0.5;
  }
  function openFormModifier() {

    document.getElementById("myForm1").style.display = "flex";
    document.getElementById("tableAnimaux").style.opacity = 0.5;
    document.getElementById("firstRow").style.opacity = 0.5;
    document.getElementById("addButtonToList").style.opacity = 0.5;
    document.getElementById("search").style.opacity = 0.5;

    $( ".tblRows" ).click(function() {
      var row_data = $(this).attr("data");
      console.log(row_data);
    
      var str = row_data.split("-");
      document.querySelector('#id').value=str[0];
      document.querySelector('#nomAnimal1').value=str[1];
      document.querySelector('#type1').value=str[2];
      document.querySelector('#age1').value=str[3];
      document.querySelector('#pays1').value=str[4];
      document.querySelector('#status1').value=str[5];
      document.querySelector('#regimeAlimentaire1').value=str[6];
      //document.querySelector('#image1').value=str[7];
      console.log(str[7]);

     
  });

  }

  
  function closeForm() {

      document.querySelector('#nomAnimal').value='';
      document.querySelector('#type').value='';
      document.querySelector('#age').value='';
      document.querySelector('#pays').value='';
      document.querySelector('#status').value='';
 

    document.getElementById("myForm").style.display = "none";
    document.getElementById("tableAnimaux").style.opacity = 1;
    document.getElementById("firstRow").style.opacity = 1;
    document.getElementById("addButtonToList").style.opacity = 1;
    document.getElementById("search").style.opacity = 1;


  }
  function closeFormModifier() {

    document.querySelector('#nomAnimal1').value='0';
    document.querySelector('#type1').value='';
    document.querySelector('#age1').value='';
    document.querySelector('#pays1').value='';

    document.getElementById("myForm1").style.display = "none";
    document.getElementById("tableAnimaux").style.opacity = 1;
    document.getElementById("firstRow").style.opacity = 1;
    document.getElementById("addButtonToList").style.opacity = 1;
    document.getElementById("search").style.opacity = 1;

  }

//control saisie 

// document.getElementById('ajouterRegime').addEventListener('click', (e) =>{
//   let nomAnimal =document.getElementById("nomAnimal").value;

//   let age =document.getElementById("quantiteParRepas").value;
//   let nombre_de_repas =document.getElementById("nombre_de_repas").value;

//   let errorRegimeAlimentaire =document.getElementById("errorRegimeAlimentaire");
//   let errorTypeNourriture =document.getElementById("errorTypeNourriture");
//   let errorQuantiteParRepas =document.getElementById("errorQuantiteParRepas");
//   let errorNombreDeRepas =document.getElementById("errorNombreDeRepas");

//   let regimeAlimentaire = document.getElementById("regimeAlimentaire");
//   let index = regimeAlimentaire.selectedIndex;

// if(index==0)
// {
//   errorRegimeAlimentaire.innerHTML="merci de choisir un regime alimentaire";
//   document.getElementById("regimeAlimentaire").parentElement.style.border = "1px solid red";
//   e.preventDefault();
// }
// else
// {
//   errorRegimeAlimentaire.style.display="none";
//   document.getElementById("regimeAlimentaire").parentElement.style.border = "solid 1px #e8e8e9";
// }

// if(!validateString(typeNourriture))
// {
//   errorTypeNourriture.innerHTML="merci d'ecrire juste des lettres alphabétiques";
//   document.getElementById("typeNourriture").parentElement.style.border = "1px solid red";
//   e.preventDefault();
// }
// else
// {
//   errorTypeNourriture.style.display="none";
//   document.getElementById("typeNourriture").parentElement.style.border = "solid 1px #e8e8e9";
// }

// if(isNaN(quantiteParRepas) || quantiteParRepas.length==0 )
// {
//   errorQuantiteParRepas.innerHTML="merci d'ecrire juste des nombres";
//   document.getElementById("quantiteParRepas").parentElement.style.border = "1px solid red";
//   e.preventDefault();
// }
// else
// {
//   errorQuantiteParRepas.style.display="none";
//   document.getElementById("quantiteParRepas").parentElement.style.border = "solid 1px #e8e8e9";
// }
// if (isNaN(nombre_de_repas) || nombre_de_repas.length==0)
// {
//   errorNombreDeRepas.innerHTML="merci d'ecrire juste des nombres";
//   document.getElementById("nombre_de_repas").parentElement.style.border = "1px solid red";
//   e.preventDefault();
// }
// else
// {
//   errorNombreDeRepas.style.display="none";
//   document.getElementById("nombre_de_repas").parentElement.style.border = "solid 1px #e8e8e9";
// }

// })

// function validateString(str)
// {
// if (str.match(/[a-z]/g))
// return true ;
// else 
// return false
// }


















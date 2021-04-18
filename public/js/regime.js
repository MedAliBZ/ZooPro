function openFormAjouter() {
    document.getElementById("myForm").style.display = "flex";
    document.getElementById("tableRegime").style.opacity = 0.5;
    document.getElementById("firstRow").style.opacity = 0.5;
    document.getElementById("addButtonToList").style.opacity = 0.5;
    document.getElementById("search").style.opacity = 0.5;
  }
  function openFormModifier() {

    document.getElementById("myForm1").style.display = "flex";
    document.getElementById("tableRegime").style.opacity = 0.5;
    document.getElementById("firstRow").style.opacity = 0.5;
    document.getElementById("addButtonToList").style.opacity = 0.5;
    document.getElementById("search").style.opacity = 0.5;
  // let var = $data['tab'][$value[0]] ;
    document.querySelector('#idRegime').value=0;
  }
  
  function closeForm() {

      document.querySelector('#regimeAlimentaire').value='0';
      document.querySelector('#typeNourriture').value='';
      document.querySelector('#quantiteParRepas').value='';
      document.querySelector('#nombre_de_repas').value='';
 

    document.getElementById("myForm").style.display = "none";
    document.getElementById("tableRegime").style.opacity = 1;
    document.getElementById("firstRow").style.opacity = 1;
    document.getElementById("addButtonToList").style.opacity = 1;
    document.getElementById("search").style.opacity = 1;

  }
  function closeFormModifier() {

    document.querySelector('#regimeAlimentaire1').value='0';
    document.querySelector('#typeNourriture1').value='';
    document.querySelector('#quantiteParRepas1').value='';
    document.querySelector('#nombre_de_repas1').value='';

    document.getElementById("myForm1").style.display = "none";
    document.getElementById("tableRegime").style.opacity = 1;
    document.getElementById("firstRow").style.opacity = 1;
    document.getElementById("addButtonToList").style.opacity = 1;
    document.getElementById("search").style.opacity = 1;

  }
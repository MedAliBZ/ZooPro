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




















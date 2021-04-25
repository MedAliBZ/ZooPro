function openFormAjouter() {
    document.getElementById("myForm").style.display = "flex";
    document.getElementById("tableplante").style.opacity = 0.5;
    document.getElementById("firstRow").style.opacity = 0.5;
    document.getElementById("addButtonToList").style.opacity = 0.5;
    document.getElementById("search").style.opacity = 0.5;
  }
  function openFormModifier() {

    document.getElementById("myForm1").style.display = "flex";
    document.getElementById("tableplante").style.opacity = 0.5;
    document.getElementById("firstRow").style.opacity = 0.5;
    document.getElementById("addButtonToList").style.opacity = 0.5;
    document.getElementById("search").style.opacity = 0.5;

    $( ".tblRows" ).click(function() {
      var row_data = $(this).attr("data");
      console.log(row_data);
    
      var str = row_data.split("-");
      document.querySelector('#idP').value=str[0];
      document.querySelector('#nomP1').value=str[1];
      document.querySelector('#longevite1').value=str[2];
      document.querySelector('#origine1').value=str[3];
      document.querySelector('#taille1').value=str[4];
      document.querySelector('#famille1').value=str[5];
      document.querySelector('#image1').value=str[6];
      document.querySelector('#espece1').value=str[7];
     
  });

  }

  
  function closeForm() {

      document.querySelector('#nomP').value='';
      document.querySelector('#longevite').value='';
      document.querySelector('#origine').value='';
      document.querySelector('#taille').value='';
      document.querySelector('#famille').value='';
      document.querySelector('#image').value='';
 

    document.getElementById("myForm").style.display = "none";
    document.getElementById("tableplante").style.opacity = 1;
    document.getElementById("firstRow").style.opacity = 1;
    document.getElementById("addButtonToList").style.opacity = 1;
    document.getElementById("search").style.opacity = 1;

  }
  function closeFormModifier() {

    document.querySelector('#nomP1').value='';
    document.querySelector('#longevite1').value='';
    document.querySelector('#origine1').value='';
    document.querySelector('#taille1').value='';
    document.querySelector('#famille1').value='';
    document.querySelector('#image1').value='';

    document.getElementById("myForm1").style.display = "none";
    document.getElementById("tableplante").style.opacity = 1;
    document.getElementById("firstRow").style.opacity = 1;
    document.getElementById("addButtonToList").style.opacity = 1;
    document.getElementById("search").style.opacity = 1;

  }
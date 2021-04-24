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
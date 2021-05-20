// CS ajout
  let addButtonToList = document.getElementById('addButtonToList');
  let nomP = document.querySelector('#nomP');
  let longevite = document.querySelector('#longevite');
  let origine = document.querySelector('#origine');
  let taille = document.querySelector('#taille');
  let famille = document.querySelector('#famille');
  


  addButtonToList.addEventListener('click', () => {
    document.querySelector('#nomP').value='';
    document.querySelector('#longevite').value='';
    document.querySelector('#origine').value='';
    document.querySelector('#taille').value='';
    document.querySelector('#famille').value='';
    
    //popupAjouter.style.visibility = 'visible';
    //popupAjouter.style.opacity = 1;
    });

document.querySelector('#ajouterPopup').addEventListener('click',(e)=>{
  resetErrorsPopUp();


  if(nomP.value.length==0)
  {
   document.getElementById('errorAjnom').innerHTML='Veuillez saisir un nom!';
   nomP.parentElement.style.border='1px solid red';
   e.preventDefault();}
  else if(/\d/.test(nomP.value)){ 
      document.getElementById('errorAjnom').innerHTML='nom ne doit pas contenir de nombres!';
     nomP.parentElement.style.border='1px solid red';
      e.preventDefault();
  }
  else
    {
      resetErrorsPopUp();
     document.getElementById('errorAjnom').innerHTML='';
     nomP.parentElement.style.border='solid 1px #e8e8e9'; 
    }



   if  (longevite.value==0){ 
      document.getElementById('errorAjlongevite').innerHTML='Veuillez saisir un nombre!';
      longevite.parentElement.style.border='1px solid red';
      e.preventDefault();}
      else if((longevite.value<0)||(longevite.value==0)){ 
      document.getElementById('errorAjlongevite').innerHTML='Veuillez saisir un nombre positif!';
      longevite.parentElement.style.border='1px solid red';
      e.preventDefault();}
      else
      {
      document.getElementById('errorAjlongevite').innerHTML='';
      longevite.parentElement.style.border='solid 1px #e8e8e9'; 
      }

  /*if (isNaN(longevite.value)){ 
    document.getElementById('errorAj').innerHTML='La longevite doit etre composé de nombres!';
    longevite.parentElement.style.border='1px solid red';
    e.preventDefault();
    }*/
   

    
  if(origine.value.length==0)
  {
   document.getElementById('errorAjorigine').innerHTML='Veuillez saisir une origine geographique!';
   origine.parentElement.style.border='1px solid red';
   e.preventDefault();}
  else if(/\d/.test(origine.value)){ 
      document.getElementById('errorAjorigine').innerHTML='l origine ne doit pas contenir de nombres!';
     origine.parentElement.style.border='1px solid red';
      e.preventDefault();
  }
  else
    {
     document.getElementById('errorAjorigine').innerHTML='';
     origine.parentElement.style.border='solid 1px #e8e8e9'; 
    }
  /* if (/\d/.test(origine.value)){ 
      document.getElementById('errorAj').innerHTML='L origine ne doit pas contenir de nombres!';
      origine.parentElement.style.border='1px solid red';
      e.preventDefault();
  } */
  if  (taille.value==0){ 
    document.getElementById('errorAjtaille').innerHTML='Veuillez saisir un nombre!';
    taille.parentElement.style.border='1px solid red';
    e.preventDefault();}
    else if((taille.value<0)||(taille.value==0)){ 
    document.getElementById('errorAjtaille').innerHTML='Veuillez saisir un nombre positif!';
    taille.parentElement.style.border='1px solid red';
    e.preventDefault();}
    else
    {
    document.getElementById('errorAjtaille').innerHTML='';
    taille.parentElement.style.border='solid 1px #e8e8e9'; 
    }



  /*if (/\d/.test(famille.value)){ 
    document.getElementById('errorAj').innerHTML='La famille ne doit pas contenir de nombres!';
    famille.parentElement.style.border='1px solid red';
    e.preventDefault();*/

    
  if(famille.value.length==0)
  {
   document.getElementById('errorAjfamille').innerHTML='Veuillez saisir une famille!';
   famille.parentElement.style.border='1px solid red';
   e.preventDefault();}
  else if(/\d/.test(famille.value)){ 
      document.getElementById('errorAjfamille').innerHTML='la famille de la plante ne doit pas contenir de nombres!';
     famille.parentElement.style.border='1px solid red';
      e.preventDefault();
  }
  else
    {
     document.getElementById('errorAjfamille').innerHTML='';
     famille.parentElement.style.border='solid 1px #e8e8e9'; 
    }


} 
  
)

function resetErrorsPopUp(){
  document.getElementById('errorAjnom').innerHTML='';
  document.getElementById('errorAjlongevite').innerHTML='';
  document.getElementById('errorAjorigine').innerHTML='';
  document.getElementById('errorAjtaille').innerHTML='';
  document.getElementById('errorAjfamille').innerHTML='';
  nomP.parentElement.style.border='solid 1px #e8e8e9';
  longevite.parentElement.style.border='solid 1px #e8e8e9';
  origine.parentElement.style.border='solid 1px #e8e8e9';
  taille.parentElement.style.border='solid 1px #e8e8e9';
  famille.parentElement.style.border='solid 1px #e8e8e9';
}





function openFormAjouter() {
    document.getElementById("myForm").style.display = "flex";
    document.getElementById("tableplante").style.opacity = 0.5;
    document.getElementById("firstRow").style.opacity = 0.5;
    document.getElementById("addButtonToList").style.opacity = 0.5;
    //document.getElementById("search").style.opacity = 0.5;
  }
  
  function openFormModifier() {

    document.getElementById("myForm1").style.display = "flex";
    document.getElementById("tableplante").style.opacity = 0.5;
    document.getElementById("firstRow").style.opacity = 0.5;
    document.getElementById("addButtonToList").style.opacity = 0.5;
    //document.getElementById("search").style.opacity = 0.5;

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
      document.querySelector('#idespece').value='';
      
      
 

    document.getElementById("myForm").style.display = "none";
    document.getElementById("tableplante").style.opacity = 1;
    document.getElementById("firstRow").style.opacity = 1;
    document.getElementById("addButtonToList").style.opacity = 1;
   // document.getElementById("search").style.opacity = 1;

   

  }
  function closeFormModifier() {

    document.querySelector('#nomP1').value='';
    document.querySelector('#longevite1').value='';
    document.querySelector('#origine1').value='';
    document.querySelector('#taille1').value='';
    document.querySelector('#famille1').value='';
    
    
    

    document.getElementById("myForm1").style.display = "none";
    document.getElementById("tableplante").style.opacity = 1;
    document.getElementById("firstRow").style.opacity = 1;
    document.getElementById("addButtonToList").style.opacity = 1;
    //document.getElementById("search").style.opacity = 1;

  }




$( ".tblRows" ).click(function() {
    var row_data1 = $(this).attr("data");
    console.log(row_data1);
    //here
    let emailString= document.getElementById("email").textContent;
    console.log(emailString);
    var row_data = row_data1 +"-"+emailString ;
    console.log(row_data);

    localStorage.setItem("vOneLocalStorage",row_data);  
})


//recherche function
let nomAnimal = Array.from(document.querySelectorAll("a[data-label='Nom']"));

document.getElementById('rechercher').addEventListener('keyup', (e) => {
  nomAnimal.map(el => {
      if (el.innerHTML.toLowerCase().search(e.target.value.toLowerCase()) == -1) {
          el.parentElement.style.display = 'none';
      }
      else {
        el.parentElement.style.display = 'flex';     
    }
  })
})

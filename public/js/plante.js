
$( ".tblRows" ).click(function() {
    var row_data = $(this).attr("data");
    console.log(row_data);
    localStorage.setItem("vOneLocalStorage",row_data);  
})

//recherche function
let nomP = Array.from(document.querySelectorAll("a[data-label='nomP']"));

document.getElementById('rechercher').addEventListener('keyup', (e) => {
  nomP.map(el => {
      if (el.innerHTML.toLowerCase().search(e.target.value.toLowerCase()) == -1) {
          el.parentElement.style.display = 'none';
      }
      else {
        el.parentElement.style.display = 'flex';     
    }
  })
})

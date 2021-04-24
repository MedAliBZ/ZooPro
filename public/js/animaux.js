
$( ".tblRows" ).focus(function() {
    var row_data = $(this).attr("data");
    console.log(row_data);
    localStorage.setItem("vOneLocalStorage",row_data);  
})

//

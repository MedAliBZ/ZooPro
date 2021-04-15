function openForm() {
    document.getElementById("myForm").style.display = "flex";
    document.getElementById("tableRegime").style.opacity = 0.5;
    document.getElementById("firstRow").style.opacity = 0.5;
    document.getElementById("addButtonToList").style.opacity = 0.5;
    document.getElementById("search").style.opacity = 0.5;
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
    document.getElementById("tableRegime").style.opacity = 1;
    document.getElementById("firstRow").style.opacity = 1;
    document.getElementById("addButtonToList").style.opacity = 1;
    document.getElementById("search").style.opacity = 1;
  }

var vOneLS = localStorage.getItem("vOneLocalStorage");
let chaine = vOneLS;
console.log(chaine);
let data= chaine.split("-");

console.log(data);
//set name
document.querySelector("#nomP").innerHTML = data[1];
//set picture
let pic=document.getElementById('planteImage').src;
console.log(pic);
document.getElementById('planteImage').src=pic+"/public/Images/"+data[6];

//set id
document.querySelector("#idP").innerHTML = data[0];
//set name in list
document.querySelector("#nomP1").innerHTML = data[1];
//set type
document.querySelector("#longevite").innerHTML = data[2];
//set age
document.querySelector("#origine").innerHTML = data[3];
//set pays
document.querySelector("#taille").innerHTML = data[4];
//set pays
document.querySelector("#famille").innerHTML = data[5];
//document.querySelector("#idespece").value = data[7];
//set id
document.querySelector("#idE").value = data[7];
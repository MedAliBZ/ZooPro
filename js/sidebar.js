$(window).on('load', ()=> {
    $("#loading").fadeOut(1000);
    $(".wrapper").fadeIn(1000);
});

window.addEventListener("resize",()=>{
    document.querySelector(".wrapper").classList.add('collapse');
});

document.querySelector(".sidebar").addEventListener("mouseenter",()=>{
    if ($(window).width() > 768){
        $(".wrapper").toggleClass("collapse");
    }
});
document.querySelector(".sidebar").addEventListener("mouseleave",()=>{
    if ($(window).width() > 768){
        $(".wrapper").toggleClass("collapse");
    }
});


document.querySelector(".sidebar-btn").addEventListener("click",()=>{
    $(".wrapper").toggleClass("collapse");
});


let profileState = false;
let messagesState = false;
let settingState = false;


document.querySelector("#profile").addEventListener("click", () => {
    profileState = !profileState;
    profileState ? document.querySelector(".sub-menu-profile").style.maxHeight = "500px" : document.querySelector(".sub-menu-profile").style.maxHeight = "0";
})

document.querySelector("#messages").addEventListener("click", () => {
    messagesState = !messagesState;
    messagesState ? document.querySelector(".sub-menu-messages").style.maxHeight = "500px" : document.querySelector(".sub-menu-messages").style.maxHeight = "0";
})

document.querySelector("#settings").addEventListener("click", () => {
    settingState = !settingState;
    settingState ? document.querySelector(".sub-menu-settings").style.maxHeight = "500px" : document.querySelector(".sub-menu-settings").style.maxHeight = "0";
})





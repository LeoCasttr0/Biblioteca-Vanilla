document.addEventListener('DOMContentLoaded', function () {
//adeclarando as variaveis do html no js
const body = document.querySelector("body"),
    sidebar = body.querySelector(".sidebar"),
    toggle = body.querySelector(".toggle"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".toggle-text");

//adicionando um evento no mode switch
toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
  
});


//adicionando uma class no body quando aperta no modo escuro
modeSwitch.addEventListener("click", () =>{
    body.classList.toggle("dark");

    if(body.classList.contains("dark")){
        modeText.innerText = "Modo Claro"
    } else {

        modeText.innerText = "Modo Dark"
    }
});


function iconMenu()
{
    const menuMobile = document.getElementById("menu-mobile")

    if(menuMobile.className === "menu-mobile-active"){
        menuMobile.className = "menu-mobile"
    } else{
        menuMobile.className = "menu-mobile-active"
    }
};

window.addEventListener('resize', () => {
    const menuMobile = document.getElementById('menu-mobile');
    
    if (window.innerWidth > 550) {
      menuMobile.classList.remove('menu-mobile-active');
    }
})
});

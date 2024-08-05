const btnAbrir = document.querySelector('[data-rol="boton-abrir"]');
const btnCerrar = document.querySelector('[data-rol="boton-cerrar"]');
const menuDiv = document.querySelector('[data-rol="menu_div"]');


function abreMenu(){
    menuDiv.classList.add("menu-abierto");

    document.body.style.overflowY = "hidden";
    document.documentElement.style.overflowY = "hidden";

    btnAbrir.style.display = "none";
    btnCerrar.style.display = "block";
}

function cierraMenu(){
    menuDiv.classList.remove("menu-abierto");

    document.body.style.overflowY = "auto";
    document.documentElement.style.overflowY = "auto";

    btnAbrir.style.display = "block";
    btnCerrar.style.display = "none";
}

function unmuteVideo(){
    document.getElementById("boton-unmute").style.display="none";
    document.getElementById("boton-mute").style.display="block";

    var video=document.getElementById("header_video");
    
    if(video!=null){
        video.muted=false;
    }    
}

function muteVideo(){
    document.getElementById("boton-unmute").style.display="block";
    document.getElementById("boton-mute").style.display="none";

    var video=document.getElementById("header_video");
    
    if(video!=null){
        video.muted=true;
    }
}

module.exports = {
    abreMenu: abreMenu,
    cierraMenu: cierraMenu,
    unmuteVideo,
    muteVideo
};
const btnAbrir = document.querySelector('[data-rol="boton-abrir"]');
const btnCerrar = document.querySelector('[data-rol="boton-cerrar"]');
const menuDiv = document.querySelector('[data-rol="menu_div"]');


// Video Header

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


// Slider

function showSlides(n) {
    let i;
    let slides = document.querySelectorAll(".slider__item");
    let dots = document.querySelectorAll(".slider__dot");

    slideIndex = n;

    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }

    for (i = 0; i < slides.length; i++) {
        // slides[i].style.display = "none";
        slides[i].className = slides[i].className.replace(" active", "");
    }

    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    // slides[slideIndex-1].style.display = "block";
    slides[slideIndex-1].className += " active";
    dots[slideIndex-1].className += " active";

}

// Next/previous controls
function plusSlides(n) {
    stopAllMedia()
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function stopAllMedia(){
    let videos = document.querySelectorAll(".slider__content video");

    videos.forEach(video => {
        video.pause();
        // video.currentTime = 0;
    });
}

module.exports = {
    abreMenu: abreMenu,
    cierraMenu: cierraMenu,
    unmuteVideo,
    muteVideo,
    showSlides,
    plusSlides,
    currentSlide,
};
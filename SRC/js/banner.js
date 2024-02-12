///////////////////////////banner and nav//////////////////////////////////////////////

window.onscroll = function () {
    var posicion = window.pageYOffset || document.documentElement.scrollTop;
    var elemento1 = document.getElementById("icon_ball");
    var elemento2 = document.getElementById("icon_player");
    elemento1.style.bottom = posicion * 0.1 + "px";
    elemento2.style.top = posicion * 0.1 + "px";
}

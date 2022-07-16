
//desplegar menú al hacer clic sobre botón menú movil
let activo = false;

document.getElementById("boton-mostrar-menu-movil").addEventListener('click', () => {
    if (activo === false) {
        document.getElementById("menu-movil").style.display = "block";
        activo = true;
    } else {
        document.getElementById("menu-movil").style.display = "none";
        activo = false;
    }
});

//esconder el menú si este está desplegado cuando la pantalla se agranda
window.addEventListener("resize", function() {
    if (window.matchMedia("(min-width: 800px)").matches) {
        //si tamaño de pantalla es 800px o mayor, entonces:
        console.log("Screen width 800px");
        document.getElementById("menu-movil").style.display = "none";
        activo = false; //esto para que no afecte la función del botón menú movil
    }
});
        
        

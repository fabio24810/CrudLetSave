//************************* slide imagenes pagina nosotros
        
let imagen = [
    //los urls son dadas tomando siempre el archivo a donde llamo este archivo javascript, es decir tomar como punto de partida el archivo controlador/nosotros.php 
    '../vista/multimedia/nosotros/img1.jpg', //pos 0
    '../vista/multimedia/nosotros/img2.jpg', //pos 1
    '../vista/multimedia/nosotros/img3.jpg', //pos 2
];

let i = 0;
console.log(i);

//siguiente imagen
document.getElementById("boton-mostrar-imagen-siguiente").addEventListener('click', function() {
do {
    i++;
    if (i === 3) { //si i igual a pos 3
        i = 0;
    }
    document.getElementById('imagen-mostrada').src = imagen[i];
    console.log('pos actual siguiente', i);
    break;
} while (i < 9); //mientras i sea menor que 9, es decir nunca va a llegar a ser mayor que 9 por la condición if, por lo tanto el ciclo nunca termina
});

//anterior imagen
document.getElementById("boton-mostrar-imagen-anterior").addEventListener('click', function() {
do {
    i--;
    if (i === -1) {
        i = 2; //reiniciar a pos 2 que es la más alta que existe
    }
    document.getElementById('imagen-mostrada').src = imagen[i];
    console.log('pos actual anterior', i);
    break;
} while (i > -1); //como i nunca va a ser -1 por el if, el ciclo nunca termina

});
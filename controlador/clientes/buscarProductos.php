<?php

//**********************modelo
include("../../modelo/clientes/buscarProductos.php");


//**********************definir urls para variables menu clientes
$urlLogoMenu = "../../vista/multimedia/menu/logo2.jpg";
$urlCerrarSesion = "cerrarSesion.php";
$urlAyuda = "";
$urlCarritoCompras = "carritoDeCompras.php";
$urlBuscarProductos = "buscarProductos.php";

//**********************vista
include("../../vista/clientes/buscarProductos.php");

//********************** carrito de compras
//inicializar variables de sesion como arrays si no existen como arrays
//si variable sesion carritoDeCompras_codigo tiene valor
if(isset($_SESSION['carritoDeCompras_codigo']) == false && isset($_SESSION['carritoDeCompras_cantidad']) == false) {
    //si no tiene valor o está vacía:
    //asignar array a variable sesion
    $_SESSION['carritoDeCompras_codigo'] = array();
    $_SESSION['carritoDeCompras_nombre'] = array();
    $_SESSION['carritoDeCompras_descripcion'] = array();
    $_SESSION['carritoDeCompras_precioUnidad'] = array();
    $_SESSION['carritoDeCompras_stock'] = array();
    $_SESSION['carritoDeCompras_nombreImagen'] = array();
    $_SESSION['carritoDeCompras_cantidad'] = array();
    //total artículos
    $_SESSION['carritoDeCompras_totalArticulos'] = array();
    //sub total de cada producto (precio unidad * cantidad)
    $_SESSION['carritoDeCompras_subTotal'] = array();
    //total no es un array sino solamente una variable que suma todos los sub totales
    $_SESSION['carritoDeCompras_total'];
}

//si variables post ctCodigo y post ctCantidad tienen datos
if(isset($_POST['ctCodigo']) && isset($_POST['ctCantidad'])) {
    //no están vacías o tienen algún dato:
    //agregar valores recogido de post cajas de texto al final de los arrays
    array_push($_SESSION['carritoDeCompras_codigo'], $_POST['ctCodigo']);
    array_push($_SESSION['carritoDeCompras_nombre'], $_POST['ctNombre']);
    array_push($_SESSION['carritoDeCompras_descripcion'], $_POST['ctDescripcion']);
    array_push($_SESSION['carritoDeCompras_precioUnidad'], $_POST['ctPrecioUnidad']);
    array_push($_SESSION['carritoDeCompras_stock'], $_POST['ctStock']);
    array_push($_SESSION['carritoDeCompras_nombreImagen'], $_POST['ctNombreImagen']);
    array_push($_SESSION['carritoDeCompras_cantidad'], $_POST['ctCantidad']);
    //calcular sub total
    $subTotal = $_POST['ctPrecioUnidad'] * $_POST['ctCantidad'];
    array_push($_SESSION['carritoDeCompras_subTotal'], $subTotal);

}

























?>
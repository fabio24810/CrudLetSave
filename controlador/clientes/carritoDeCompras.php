<?php



//definir urls para variables menu clientes
$urlLogoMenu = "../../vista/multimedia/menu/logo2.jpg";
$urlCerrarSesion = "cerrarSesion.php";
$urlAyuda = "";
$urlCarritoCompras = "";
$urlBuscarProductos = "buscarProductos.php";

//vista
include("../../vista/clientes/carritoDeCompras.php");

//**************** modificar cantidad item

//si post ctCodigo tiene valor
if(isset($_POST['ctCodigo'])){
    for($i = 0 ; $i < count($_SESSION['carritoDeCompras_codigo']) ; $i++) {
        //si sesion carritoDeCompras_codigo es igual a post ctCodigo
        if($_SESSION['carritoDeCompras_codigo'][$i] == $_POST['ctCodigo']){
            //nueva cantidad se guarda en array sesion cantidad
            $_SESSION['carritoDeCompras_cantidad'][$i] = $_POST['ctCantidad'];
            //recalcular sub total
            $_SESSION['carritoDeCompras_subTotal'][$i] = $_POST['ctPrecioUnidad'] * $_POST['ctCantidad'];

            
            //calcular total artículos
            $_SESSION['carritoDeCompras_totalArticulos'] = 0;

            for($i = 0 ; $i < count($_SESSION['carritoDeCompras_codigo']) ; $i++) {
                $_SESSION['carritoDeCompras_totalArticulos'] += $_SESSION['carritoDeCompras_cantidad'][$i];

            }
            
            //redirigir a misma pagina usando javascript
            echo '<script>window.location.href = "carritoDeCompras.php";</script>';
            
            
            break;
        }
    }
}























?>
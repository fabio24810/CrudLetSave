<?php

//modelo
include("../modelo/login.php");

//vista
include("../vista/login.html");

//si variable $_SESSION['usuario'] ha sido asignada, osea que no es null
if(isset($_SESSION['usuario'])){
    //variable de sesión no es nula

    //redirigir a buscarProductos.php
    header("location: clientes/buscarProductos.php");

} else if($resultado == -1) {
    //resutado es menos 1

    //redirigir a controlador credencialesIncorrectos.php
    header("location: credencialesIncorrectos.php");
}










?>
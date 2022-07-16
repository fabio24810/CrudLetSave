<?php
    /*creo una sesión en la página donde voy a asignarle valores
    $_SESSION
    */
    session_start();

    //OJO AQUÍ, si variable $_SESSION['usuario'] no está vacía o no es null
    if(isset($_SESSION['usuario'])) {

        //destruír la sesión
        session_destroy();

        //redirigir a controlador index.html
        header("location:../../index.php");


    }

?>
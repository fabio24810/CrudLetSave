<?php
/*creo una sesión en la página donde voy a asignarle valores
$_SESSION
*/
//session_start();

//si variables post no están vacías
if(
    isset($_POST['ctNumeroTarjeta']) &&
    isset($_POST['ctNombreTarjeta']) &&
    isset($_POST['ctCodigoSeguridadTarjeta']) &&
    isset($_POST['ctNitCliente']) &&
    isset($_POST['ctNombreCliente']) &&
    isset($_POST['ctDireccionCliente'])
    ){
        try {
            /*llamar al código escrito en conexion.php para hacer la conexion, es decir simplemente se pega el código que es:
            $conexion = mysqli_connect("localhost", "root", "", "db_validar");
            aquí
            */
            include('../../modelo/conexion.php');
        
            //****************** PARTE 1: ACTUALIZAR stock de cada producto en tb_productos
            //consulta sql
            //count() devuelve el total de registros en el array
            for($i = 0 ; $i < count($_SESSION['carritoDeCompras_codigo']) ; $i++) {
                $codigo = $_SESSION['carritoDeCompras_codigo'][$i];
                $nuevoStock = $_SESSION['carritoDeCompras_stock'][$i] - $_SESSION['carritoDeCompras_cantidad'][$i];
                $consulta = "UPDATE `tb_productos` SET `stock` = '$nuevoStock' WHERE `codigo` = '$codigo';";

                //realizar query, en este caso no me interesa recuperar el valor de resultado sino solamente que se realice el query
                $resultado = mysqli_query($conexion, $consulta);
            }

            //****************** PARTE 2: crear registro de factura resumen en tb_factura
            //recuperar datos de variables de formulario html
            $numeroTarjeta = $_POST['ctNumeroTarjeta'];
            $nombreTarjeta = $_POST['ctNombreTarjeta'];
            $codigoSeguridadTarjeta = $_POST['ctCodigoSeguridadTarjeta'];
        
            $nitCliente = $_POST['ctNitCliente'];
            $nombreCliente = $_POST['ctNombreCliente'];
            $direccionCliente = $_POST['ctDireccionCliente'];

            //consulta sql
            $consulta = "INSERT INTO `tb_factura`(
                `fecha_factura`,
                `nit_cliente`,
                `nombre_cliente`,
                `direccion_cliente`,
                `total_cantidad_articulos`,
                `total`
            )
            VALUES(
                /*numero de factura es autoincrement entonces aquí no pasamos ningún argumento */
                /*date() devuelve la fecha en el formato dado*/
                '" . date("Y-m-d h:m:s") . "',
                '$nitCliente',
                '$nombreCliente',
                '$direccionCliente',
                '" . $_SESSION['carritoDeCompras_totalArticulos'] . "',
                '" . $_SESSION['carritoDeCompras_total'] . "'
            );";
    

            //realizar query, en este caso no me interesa recuperar el valor de resultado sino solamente que se realice el query
            $resultado = mysqli_query($conexion, $consulta);

            




            

            
             
        
            
            
        
            


            
        
            
            
        
            //cerrar la conexión
            mysqli_close($conexion);

            //****************** limpiar variables de sesión carrito de compras
            //destruír las variables de sesión para carrito de compras
            //unset() destruye la variable de sesión especificada
            unset($_SESSION['carritoDeCompras_codigo']);
            unset($_SESSION['carritoDeCompras_nombre']);
            unset($_SESSION['carritoDeCompras_descripcion']);
            unset($_SESSION['carritoDeCompras_precioUnidad']);
            unset($_SESSION['carritoDeCompras_stock']);
            unset($_SESSION['carritoDeCompras_nombreImagen']);
            unset($_SESSION['carritoDeCompras_cantidad']);
            unset($_SESSION['carritoDeCompras_subTotal']);
            unset($_SESSION['carritoDeCompras_total']);

            //definir variables de sesion nuevamente pero sin datos
            $_SESSION['carritoDeCompras_codigo'] = array();
            $_SESSION['carritoDeCompras_nombre'] = array();
            $_SESSION['carritoDeCompras_descripcion'] = array();
            $_SESSION['carritoDeCompras_precioUnidad'] = array();
            $_SESSION['carritoDeCompras_stock'] = array();
            $_SESSION['carritoDeCompras_nombreImagen'] = array();
            $_SESSION['carritoDeCompras_cantidad'] = array();
            //sub total de cada producto (precio unidad * cantidad)
            $_SESSION['carritoDeCompras_subTotal'] = array();
            //total no es un array sino solamente una variable que suma todos los sub totales
            $_SESSION['carritoDeCompras_total'] = 0;;

            //redirigir a pagina
            echo '<script>window.location.href = "compraRealizadaConExito.php";</script>';
         
        } catch(Exception $e) {
            echo "ERROR 205: no se pudo hacer el query";
        }
}


?>







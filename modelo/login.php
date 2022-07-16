<?php
/*creo una sesión en la página donde voy a asignarle valores
$_SESSION
*/
session_start();

//variable con resultado neutro
$resultado = 0;

//si variables no son null
if(isset($_POST['ctUsuario']) && isset($_POST['ctPassword'])){

    try{
        /*llamar al código escrito en conexion.php para hacer la conexion, es decir simplemente se pega el código que es:
        $conexion = mysqli_connect("localhost", "root", "", "db_validar");
        aquí
        */
        include('conexion.php');

        //recuperar datos de variables de formulario html
        $usuario = $_POST['ctUsuario'];
        $password = $_POST['ctPassword'];

        //consulta sql
        $consulta = "SELECT * FROM `tb_usuario` WHERE `usuario` = '$usuario' AND `password` = '$password';";

        //recuperar resultado del query, recordemos variable $conexion es porque importamos código de conexin.php y allí existe la variable
        $resultado = mysqli_query($conexion, $consulta);

        /*The mysqli_num_rows() function returns the number of rows in a result set. 
        The behaviour of mysqli_num_rows() depends on whether buffered or
        unbuffered result sets are being used. This function returns 0 for
        unbuffered result sets unless all rows have been fetched from the server
        */
        $numeroFilas = mysqli_num_rows($resultado);

        //si numero de filas es distinto a cero, es decir que sí existe resultado
        if($numeroFilas !== 0) {
            //numero de filas distinto a cero

            //recupero datos de formulario y le asigno datos a variable $_SESSION
            //$_SESSION['usuario'] donde 'usuario' es un nombre que yo le di para el index pero puede ser cualquiera
            //guardo variable $usuario en variable de sesión
            $_SESSION['usuario'] = $usuario;
        } else {
            //numero de filas igual a cero: no hay registro
            $resultado = -1;
            
        }

    } catch(Exception $e) {
        echo "ERROR 205: no se pudo hacer el query";
    }
}




?>







<?php

//variable con valor neutro
$existenRegistros = 0;


//******************************** buscar pod código */
//si $_POST["buscarPorCodigo"] no es null
if(isset($_POST["buscarPorCodigo"])){

    try {
        /*llamar al código escrito en conexion.php para hacer la conexion, es decir simplemente se pega el código que es:
        $conexion = mysqli_connect("localhost", "root", "", "db_validar");
        aquí
        */
        include('../../modelo/conexion.php');

        $codigo = $_POST["buscarPorCodigo"];
    
        //consulta sql
        $consulta = "SELECT * FROM `tb_productos` WHERE `codigo` = '$codigo';";
        
        //recuperar resultado del query, recordemos variable $conexion es porque importamos código de conexin.php y allí existe la variable
        $resultadoQuery = mysqli_query($conexion, $consulta);
    
        /*The mysqli_num_rows() function returns the number of rows in a result set. 
        The behaviour of mysqli_num_rows() depends on whether buffered or
        unbuffered result sets are being used. This function returns 0 for
        unbuffered result sets unless all rows have been fetched from the server
        */
        $numeroFilas = mysqli_num_rows($resultadoQuery);
    
        //si numero de filas es distinto a cero, es decir que sí existe resultado
        if($numeroFilas !== 0) {
            //si existe más de algún resultado
            $existenRegistros = 1;
            
        } else {
            //si no existen resultados
            $existenRegistros = -1;
        }
    
        //cerrar la conexión
        mysqli_close($conexion);
     
    } catch(Exception $e) {
        echo "ERROR 205: no se pudo hacer el query";
    }
}

//******************************** buscar por categoria */
//si al menos $_POST["lsCategoria1"] no es null
if(isset($_POST["lsCategoria1"])){
    //$_POST["lsCategoria1"] no es null

    try {
        /*llamar al código escrito en conexion.php para hacer la conexion, es decir simplemente se pega el código que es:
        $conexion = mysqli_connect("localhost", "root", "", "db_validar");
        aquí
        */
        include('../../modelo/conexion.php');
    
        //recuperar datos de variables de formulario html solo variables que no estén null
        //variables
        $construirConsulta = "";
    
        //si variable no es null
        if(isset($_POST["lsCategoria1"])) {
            //si no es null
            $categoria1 = $_POST["lsCategoria1"];
    
            //se construye consulta
            $construirConsulta = "SELECT * FROM `tb_productos` WHERE `categoria1` = '$categoria1';";
    
            if(isset($_POST["lsCategoria2"])) {
                //si no es null
                $categoria2 = $_POST["lsCategoria2"];
        
                //se construye consulta
                $construirConsulta = "SELECT * FROM `tb_productos` WHERE `categoria1` = '$categoria1' AND `categoria2` = '$categoria2';";
        
                if(isset($_POST["lsCategoria3"])) {
                    //si no es null
                    $categoria3 = $_POST["lsCategoria3"];
            
                    //se construye consulta
                    $construirConsulta = "SELECT * FROM `tb_productos` WHERE `categoria1` = '$categoria1' AND `categoria2` = '$categoria2' AND `categoria3` = '$categoria3';";
    
                    if(isset($_POST["lsCategoria4"])) {
                        //si no es null
                        $categoria4 = $_POST["lsCategoria4"];
                
                        //se construye consulta
                        $construirConsulta = "SELECT * FROM `tb_productos` WHERE `categoria1` = '$categoria1' AND `categoria2` = '$categoria2' AND `categoria3` = '$categoria3' AND `categoria4` = '$categoria4';";
    
                        if(isset($_POST["lsCategoria5"])) {
                            //si no es null
                            $categoria5 = $_POST["lsCategoria5"];
                    
                            //se construye consulta
                            $construirConsulta = "SELECT * FROM `tb_productos` WHERE `categoria1` = '$categoria1' AND `categoria2` = '$categoria2' AND `categoria3` = '$categoria3' AND `categoria4` = '$categoria4' AND `categoria5` = '$categoria5';";
        
                            //hasta este categoria llega por ahora
                        }
                    }
                }
            }
        }
    
        //consulta sql
        $consulta = $construirConsulta;
    
        //recuperar resultado del query, recordemos variable $conexion es porque importamos código de conexin.php y allí existe la variable
        $resultadoQuery = mysqli_query($conexion, $consulta);
    
        /*The mysqli_num_rows() function returns the number of rows in a result set. 
        The behaviour of mysqli_num_rows() depends on whether buffered or
        unbuffered result sets are being used. This function returns 0 for
        unbuffered result sets unless all rows have been fetched from the server
        */
        $numeroFilas = mysqli_num_rows($resultadoQuery);
    
        //si numero de filas es distinto a cero, es decir que sí existe resultado
        if($numeroFilas !== 0) {
            //si existe más de algún resultado
            $existenRegistros = 1;
            
        } else {
            //si no existen resultados
            $existenRegistros = -1;
        }
    
        //cerrar la conexión
        mysqli_close($conexion);
     
    } catch(Exception $e) {
        echo "ERROR 205: no se pudo hacer el query";
    }

}


?>







<?php
    /*creo una sesión en la página donde voy a asignarle valores
    $_SESSION
    */
    session_start();

    //OJO AQUÍ, si variable $_SESSION['usuario'] no está vacía o no es null
    if(isset($_SESSION['usuario'])) {
        //devolver archivo html al usuario
?>

    <!DOCTYPE html>

    <html lang="es-ES">
    <head>
        <meta charset="UTF-8" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="Fabio" />
        <meta name="viewport" content="initial-scale=1.0" />
        <title>Ayuda</title>

        <!-- css externo -->
        <link rel="stylesheet" href="../css/margenes.css" />
        <link rel="stylesheet" href="../css/menu-principal-clientes.css" />
        <link rel="stylesheet" href="../css/footer.css" />
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

        <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 

        <!-- javscript -->
        <script src="../javascript/menu-movil.js" defer></script> 
        
    </head>
    <body>
        
        <div class="alto-pagina">
            
            <!-- ********************************** menú principal -->
            <?php
            //importar el código de esta forma hace que sea más fácil actualizar solo página menu y todas las páginas tendrán el menú actualizado
                include('menu.php');
            ?>

            

            <!-- ********************************** contenido -->
            
            <div class="separador-1"></div>

            <div class="margen-seguro-1">
                <div class="margen-seguro-2">
        
                    <!-- inicia contenido página -->
                    
                    
                    

                    <!-- termina contenido página -->
        
                </div>
            </div>
            
            <!-- ********************************** footer -->
            <div class="falso-footer"></div>
            
            <footer>
                <div class="margen-seguro-1">
                    <div class="margen-seguro-2">
                        <div class="separador-2"></div>
                        LetSave &reg; 2006 - 2022 derechos reservados
                    </div>
                </div>
            </footer>

            
        </div> 
    </body>
    </html>

<?php
    //cerrar llave del if
    }

?>
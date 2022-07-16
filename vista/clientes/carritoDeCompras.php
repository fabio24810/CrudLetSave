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
        <title>Carrito de compras</title>

        <!-- css externo -->
        <link rel="stylesheet" href="../../vista/css/estilosGenerales/margenes.css" />
        <link rel="stylesheet" href="../../vista/css/menu/menuPrincipalClientes.css" />
        <link rel="stylesheet" href="../../vista/css/estilosGenerales/footer.css" />
        <link rel="stylesheet" href="../../vista/css/clientes/carritoDeCompras/mostrarProductos.css" />
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

        <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 

        <!-- javscript -->
        <script src="../../vista/javascript/menu/menuMovil.js" defer></script> 
        
    </head>
    <body>
        
        <div class="alto-pagina">
            
            <!-- ********************************** menú principal -->
            <?php
            //importar el código de esta forma hace que sea más fácil actualizar solo página menu y todas las páginas tendrán el menú actualizado
                include('menuClientes.php');
            ?>
            

            <!-- ********************************** contenido -->
            
            <div class="separador-1"></div>

            <div class="margen-seguro-1">
                <div class="margen-seguro-2">
        
                    <!-- inicia contenido página -->
                    
                    
                    <?php
                        for($i = 0 ; $i < count($_SESSION['carritoDeCompras_codigo']) ; $i++) {

                            //***************** grid contenedor (formulario) para cada item */
                            echo "<form id='frmCarritoDeComprasProducto' method='post' action='carritoDeCompras.php' class='gridContenedor'>";

                            /****************** grid item 1 */
                            echo "<h3 class='gridItem1'>Item #" . ($i + 1) . "</h3>"; //le sumo 1 solo para mostrar al usuario desde el item 1 y no desde del 0 para no confundirlo

                            /****************** grid item 2 */
                            echo "<img src='../../vista/multimedia/productos/" . $_SESSION['carritoDeCompras_nombreImagen'][$i] . "' class='gridItem2'/>";

                            /****************** grid item 3 */
                            echo "<div class='gridItem3'>";
                            echo "<p class='subtitulo'>Código:</p> " . $_SESSION['carritoDeCompras_codigo'][$i] . "<br>";
                            //input oculto
                            echo "<input type='hidden' value='" . $_SESSION['carritoDeCompras_codigo'][$i]. "' name='ctCodigo' readonly required />";

                            echo "<p class='subtitulo'>Nombre:</p> " . $_SESSION['carritoDeCompras_nombre'][$i] . "<br>";
                            echo "<p class='subtitulo'>Descripción:</p> " . $_SESSION['carritoDeCompras_descripcion'][$i] . "<br>";

                            echo "<p class='subtitulo'>Precio unidad:</p> Q" . $_SESSION['carritoDeCompras_precioUnidad'][$i] . "<br>";
                            //input oculto
                            echo "<input type='hidden' value='" . $_SESSION['carritoDeCompras_precioUnidad'][$i]. "' name='ctPrecioUnidad' readonly required />";

                            echo "<p class='subtitulo'>Stock:</p> " . $_SESSION['carritoDeCompras_stock'][$i] . "<br>";
                            echo "</div>";

                            /****************** grid item 4 */
                            echo "<div class='gridItem4'>";
                            echo "<p class='subtitulo'>Cantidad a llevar:</p></br>";
                            echo "<input type='number' name='ctCantidad' min='0' max='100' value='" . $_SESSION['carritoDeCompras_cantidad'][$i]. "' />". "<br>";
                            echo "<input type='submit' value='Guardar nueva cantidad' /> <br><br>";
                            echo "<p class='subtitulo'>Subtotal:</p></br>";
                            echo "Q" . $_SESSION['carritoDeCompras_subTotal'][$i];
                            echo "</div>";

                            echo "</form>";
                        }

                        //calcular total
                        $_SESSION['carritoDeCompras_total'] = 0;
                        for($i = 0 ; $i < count($_SESSION['carritoDeCompras_codigo']) ; $i++) {
                            $_SESSION['carritoDeCompras_total'] +=  $_SESSION['carritoDeCompras_subTotal'][$i];
                        }
                        
                        //mostrar total
                        echo "<h3>Total:</h3>";
                        echo "<p class='total'>Q" . $_SESSION['carritoDeCompras_total'] . "</p>";
                        
                    ?>

                    
                    <a href="finalizarCompra.php">Finalizar compra</a><br>
                    <a href="buscarProductos.php">Agregar más productos</a><br>


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
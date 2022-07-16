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
        <link rel="stylesheet" href="../../vista/css/clientes/finalizarCompra/mostrarProductos.css" />
        
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

                    if($_SESSION['carritoDeCompras_total'] != 0){
                        echo "<form id='frmFinalizarCompra' method='post' action='finalizarCompra.php' >";
                            
                            //****************************** datos */
                            echo "<div class='gridContenedorDatos'>";
                            //tarjeta debito/ credito
                            echo "<h3 class='itemDatos'>Tarjeta de débito/ crédito</h3>";
                            echo "<label for='ctNumeroTarjeta'>Número de tarjeta:</label>";
                            echo "<input type='number' id='ctNumeroTarjeta' name='ctNumeroTarjeta' required />";

                            echo "<label for='ctNombreTarjeta'>Nombre que aparece en la tarjeta:</label>";
                            echo "<input type='text' id='ctNombreTarjeta' name='ctNombreTarjeta' required />";

                            echo "<label for='ctCodigoSeguridadTarjeta'>Código de seguridad:</label>";
                            echo "<input type='number' id='ctCodigoSeguridadTarjeta' name='ctCodigoSeguridadTarjeta' required />";

                            //datos del cliente
                            echo "<h3 class='itemDatos'>Datos del cliente</h3>";
                            echo "<label for='ctNitCliente'>NIT:</label>";
                            echo "<input type='number' id='ctNitCliente' name='ctNitCliente' required/>";

                            echo "<label for='ctNombreCliente'>Nombre completo:</label>";
                            echo "<input type='text' id='ctNombreCliente' name='ctNombreCliente' required/>";

                            echo "<label for='ctDireccionCliente'>Dirección:</label>";
                            echo "<input type='text' id='ctDireccionCliente' name='ctDireccionCliente' required/>";

                            echo "</div>";

                            //***************************** items */
                            //resumen artículos
                            echo "<h3>Artículos a comprar</h3>";
                            
                            for($i = 0 ; $i < count($_SESSION['carritoDeCompras_codigo']) ; $i++) {

                                echo "<div class='gridContenedorItem'>";
                                echo "<h3 class='gridItem0'>Item #" . ($i + 1) . "</h3>"; //le sumo  +1 para que al usuario le aparezca el item inicial desde 1 y no desde 0 para no confundirlo

                                echo "<img class='gridItem1' src='../../vista/multimedia/productos/" . $_SESSION['carritoDeCompras_nombreImagen'][$i] . "' />";

                                echo "<div class='gridItem2'>";
                                echo "<p class='subtitulo'>Código:</p> " . $_SESSION['carritoDeCompras_codigo'][$i] . "<br>";
                                echo "<p class='subtitulo'>Nombre:</p> " . $_SESSION['carritoDeCompras_nombre'][$i] . "<br>";
                                echo "<p class='subtitulo'>Descripción:</p> " . $_SESSION['carritoDeCompras_descripcion'][$i] . "<br>";
                                echo "<p class='subtitulo'>Precio unidad:</p> " . $_SESSION['carritoDeCompras_precioUnidad'][$i] . "<br>";
                                echo "</div>";

                                echo "<div class='gridItem3'>";
                                echo "<p class='subtitulo'>Stock:</p> " . $_SESSION['carritoDeCompras_stock'][$i] . "<br>";
                                echo "<p class='subtitulo'>Cantidad a llevar:</p> " . $_SESSION['carritoDeCompras_cantidad'][$i] . "<br>";
                                echo "<p class='subtitulo'>Subtotal:</p> Q" . $_SESSION['carritoDeCompras_subTotal'][$i] . "<br>";
                                echo "</div>";

                                echo "</div>";

                            }
                            //mostrar total artículos o items
                            echo "<p class='subtitulo'>Total artículos a llevar:</p>";
                            echo "<p class='total'>" . $_SESSION['carritoDeCompras_totalArticulos'] . "</p>";
                            
                            //mostrar total
                            echo "<p class='subtitulo'>Total:</p>";
                            echo "<p class='total'> Q" . $_SESSION['carritoDeCompras_total'] . "</p>";
                            

                        //confirmar compra o regresar a carrito de compras
                        echo "<input type='submit' value='Confirmar' />";
                        echo "<a href='carritoDeCompras.php'>Regresar al carrito de compras</a>";
                        echo "</form>";
                    } else {
                        echo "<h3>Debes agregar almenos un artículo para realizar la compra</h3>";
                        echo "<a href='carritoDeCompras.php'>Regresar al carrito de compras</a>";
                    }
                    ?>


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
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
        <title>Buscar productos</title>

        <!-- css externo -->
        <link rel="stylesheet" href="../../vista/css/estilosGenerales/margenes.css" />
        <link rel="stylesheet" href="../../vista/css/menu/menuPrincipalClientes.css" />
        <link rel="stylesheet" href="../../vista/css/estilosGenerales/footer.css" />
        <link rel="stylesheet" href="../../vista/css/estilosGenerales/alertas.css" />
        <link rel="stylesheet" href="../../vista/css/clientes/buscarProductos/mostrarProductos.css" />
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

        <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 

        <!-- javscript -->
        <script src="../../vista/javascript/menu/menuMovil.js" defer></script> 
        <script src="../../vista/javascript/clientes/buscarProductos/buscarProductos.js" defer></script> 
        
    </head>
    <body>
        
        <div class="alto-pagina">
            
            <!-- ********************************** menú principal -->
            <?php
            //importar el código de esta forma hace que sea más fácil actualizar solo página menu y todas las páginas tendrán el menú actualizado
                include('../../vista/clientes/menuClientes.php');
            ?>

            <!-- ********************************** contenido -->

            <div class="separador-1" id='separador-1'></div>

            <div class="margen-seguro-1">
                <div class="margen-seguro-2">
        
                    <!-- inicia contenido página -->

                    <h1>Elige el tipo de búsqueda</h1>
                    <p>Si conoces el código del producto, selecciona que la búsqueda sea por código, de lo contrario selecciona buscar por categoría</p>
                    
                    <!-- buscar productos -->
                    <h3>Buscar por:</h3>
                    <div>
                        <form id="frmBuscarProductos" method="post" action="buscarproductos.php">
                        </form>
                    </div>
                    
                    <!--resultado búsqueda-->
                    <?php
                        //mysqli_fetch_row divide el resultado en columnas según esté cnstruída la tabla a donde se consultó. Cada columna tiene un index de array comenzando por la primer columna como index 0
                        //mysqli_fetch_array es como mysqli_fetch_row pero aquí sí puedo acceder a los nombres de las columnas además de index numéricos, es decir es como una opción más completa
                
                        /*OJO notar que en la condición del while es donde debe existir mysqli_fetch_array($resultado) para que funcione, es decir que en cada itración se llama a la función
                        y divide el resultado en columnas y el resultado es asignado a variable $columnaResultado1 y la condición pregunta si $columnaResultado1 es true, osea que si existe
                        registro. Si no existe registro pues allí para.
                        */

                        if($existenRegistros == 1) {
                            echo "<h3>Resultado búsqueda</h3>";

                            //******************** grid contenedor */
                            echo "<div class='gridContenedor'>";

                            //mostrar resultados llamando a cada columna con su respectivo index comenzando por el 0 para la primer columna
                            while($columnaResultado = mysqli_fetch_array($resultadoQuery)) {
                                //OJO notar que el div tiene un evento de clic
                                echo "<div id='$columnaResultado[0]' onclick='myFunction(event)' class='gridItem' >";
                                echo "<form id='frmResultadoBusquedaProductos' method='post' action='buscarProductos.php' >";

                                //******************** imagen
                                echo "<img src='../../vista/multimedia/productos/$columnaResultado[5]' />";
                                //input oculto
                                echo "<input type='hidden' value='$columnaResultado[5]' name='ctNombreImagen' readonly required />";

                                //******************** información del producto
                                echo "<div>";
                                echo "<p class='subtitulo'>Código:</p> $columnaResultado[0] <br/>"; //columna 0 equivale a columna codigo en tabla de bd
                                //input oculto
                                echo "<input type='hidden' value='$columnaResultado[0]' name='ctCodigo' readonly required />"; 

                                echo "<p class='subtitulo'>Nombre:</p> $columnaResultado[1] <br/>";
                                //input oculto
                                echo "<input type='hidden' value='$columnaResultado[1]' name='ctNombre' readonly required />";

                                echo "<p class='subtitulo'>Desripción:</p> $columnaResultado[2] <br/>";
                                //input oculto
                                echo "<input type='hidden' value='$columnaResultado[2]' name='ctDescripcion' readonly required />";
                                
                                echo "<p class='subtitulo'>Precio unidad:</p> Q$columnaResultado[3] <br/>";
                                //input oculto
                                echo "<input type='hidden' value='$columnaResultado[3]' name='ctPrecioUnidad' readonly required />";

                                echo "<p class='subtitulo'>Stock:</p> $columnaResultado[4] <br/>";
                                //input oculto
                                echo "<input type='hidden' value='$columnaResultado[4]' name='ctStock' readonly required />";
                                echo "</div>";

                                //******************** input cantidad y boton agregar al carrito de compras
                                echo "<div>";
                                //botón agregar a carrito de compras
                                echo "<input type='number' name='ctCantidad' min='0' max='100' value='0' required />";
                                echo "<input type='button' value='Agregar al carrito de compras' id='btnAgregarAlCarritoCompras' />";
                                echo "</div>";

                                //******************** alerta que avisa que producto ha sido agregado al carrito de compras
                                echo "<!-- alerta para cuando se ha agregado un producto al carrito de compras, por defecto está oculta -->";
                                echo "<div id='alerta1Entendido' class='alerta1Entendido_contenedor1' onclick='agregarAlCarritoDeCompras(event)'>";
                                echo "  <div class='alerta1Entendido_contenedor2'>";
                                echo "      ¿Agregar producto al carrito de compras? Haz clic en aceptar.<br/><br/>";
                                echo "      Cuando la pantalla carge, haz clic directamente en el botón buscar para regresar a este producto y continuar desde aquí o puedes iniciar una nueva búsqueda cambiando las categorías.<br/><br/>";
                                echo "      <input type='button' value='Aceptar' id='btnAceptar' />";
                                echo "  </div>";
                                echo "</div>";

                                
                                
                                echo "</form>";
                                echo "</div>";


                                //**************** imprimir código javascript para el producto mostrado
                                echo "<script>";

                                //muestra la alerta de confirmación
                                echo "function myFunction(event) { ";
                                echo "  if(event.target.id == 'btnAgregarAlCarritoCompras'){";
                                //muestra alerta de confirmacion
                                echo "      document.getElementById('alerta1Entendido').style.display = 'block';"; 
                                echo "  }";
                                echo "}";

                                //si se hace clic en botón aceptar, se crea una cookie con el código del producto agregado y se envía el formulario
                                echo "function agregarAlCarritoDeCompras(event) {";
                                echo "  if(event.target.id == 'btnAceptar'){";
                                echo "      console.log('producto agregado al carrito: ' + event.target.parentNode.parentNode.parentNode.parentNode.id);";
                                echo "      let cookie = 'productoAgregadoAlCarrito=';";
                                echo "      let valorCookie = event.target.parentNode.parentNode.parentNode.parentNode.id;";
                                //guardar cookie del producto agregado al carrito de compras. OJO, POR ALGUNA RAZON EXTRAÑA, NO PUEDO IMPRIMIR COMENTARIOS DE JAVASCRIPT
                                //ENTONCES SOLO PUEDO COMENTAR JAVASCRIPT USANDO COMENTARIOS DE PHP EN ESTE CASO
                                echo "      document.cookie = (cookie + valorCookie);";
                                //enviar formulario
                                echo "      event.target.parentNode.parentNode.parentNode.submit();";
                                echo "  }";
                                echo "}";
                                
                                //el último producto mostrado en pantalla, se guarda su código en la misma cookie de producto agtregado al carrito (arriba)
                                echo "window.addEventListener('scroll', function() {";
                                echo "  var element = document.getElementById('$columnaResultado[0]');";
                                echo "  var position = element.getBoundingClientRect();";
                                echo "  if(position.top >= 0 && position.bottom <= window.innerHeight) {";
                                echo "  console.log('Element is fully visible in screen');";
                                echo "  document.cookie = ('productoAgregadoAlCarrito=' + '$columnaResultado[0]');";
                                echo "}";
                                echo "});";

                                echo "</script>";
 
                            }

                            echo "</div>";
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
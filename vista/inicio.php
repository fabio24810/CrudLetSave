

<!DOCTYPE html>

<html lang="es-ES">
<head>
    <meta charset="UTF-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="Fabio" />
    <meta name="viewport" content="initial-scale=1.0" />
    <title>Inicio</title>

    <!-- css externo -->
    <link rel="stylesheet" href="vista/css/estilosGenerales/margenes.css" />
    <link rel="stylesheet" href="vista/css/menu/menuPrincipalPublico.css" />
    <link rel="stylesheet" href="vista/css/estilosGenerales/footer.css" />
    <link rel="stylesheet" href="vista/css/inicio/imagenAnuncio.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 

    <!-- javscript -->
    <script src="vista/javascript/menu/menuMovil.js" defer></script> 
    
</head>
<body>
    
    <div class="alto-pagina">
        
        <!-- ********************************** menú principal -->
        <?php
            //importar el código de esta forma hace que sea más fácil actualizar solo página menu y todas las páginas tendrán el menú actualizado
            include('vista/menuPublico.php');
        ?>

        <!-- ********************************** contenido -->
        
        <div class="separador-1"></div>

        <div class="margen-seguro-1">
            <div class="margen-seguro-2">
    
                <!-- inicia contenido página -->
                
                <h1>¡Bienvenido a LetSave &reg; tu supermercado local y también en línea!</h1>
                <p>Puedes visitarnos a nuestras instalaciones o comprar en línea.</p>
                <p>Para hacer tu pedido primero ingresa con tu usuario y contraseña en la pestaña "Iniciar sesión" en el menú principal. Serás redirigido a la opción para buscar productos.
                Filtra por categorías o código, agrega al carritop de compras y listo, tu pedido llegará a domicilio.</p>
                <p>Para conocer más sobre nosotros visita la pestaña "Nosotros" en el menú principal.</p>
                <img class="imagen-mostrada" src="vista/multimedia/inicio/anuncio1.jpg" />
                

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



<!DOCTYPE html>

<html lang="es-ES">
<head>
    <meta charset="UTF-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="Fabio" />
    <meta name="viewport" content="initial-scale=1.0" />
    <title>Nosotros</title>

    <!-- css externo -->
    <link rel="stylesheet" href="../vista/css/estilosGenerales/margenes.css" />

    <link rel="stylesheet" href="../vista/css/menu/menuPrincipalPublico.css" />
    <link rel="stylesheet" href="../vista/css/estilosGenerales/footer.css" />
    <link rel="stylesheet" href="../vista/css/nosotros/slideImagenes.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 

    <!-- javscript -->
    <script src="../vista/javascript/menu/menuMovil.js" defer></script> 
    <script src="../vista/javascript/nosotros/slideImagenes.js" defer></script> 
    
</head>
<body>
    
    <div class="alto-pagina">
        
        <!-- ********************************** menú principal -->
        <?php
            //importar el código de esta forma hace que sea más fácil actualizar solo página menu y todas las páginas tendrán el menú actualizado
            include('../vista/menuPublico.php');
        ?>

        <!-- ********************************** contenido -->
        
        <div class="separador-1"></div>

        <div class="margen-seguro-1">
            <div class="margen-seguro-2">
    
                <!-- inicia contenido página -->
                
                <p>Somos LetSave &reg; un supermercado local donde encontrarás artículos de primera necesidad de la más alta calidad y marcas reconocidas nacionales e internacionales.</p>
                <p>Nuestro compromiso es brindarte servicio excepcional y comodidad en tus compras a precios accesibles. Todo lo que busques, lo tenemos: desde frutas y verduras frescas,
                comida y pañales para tu bebé, artículos de higiene personal, desechables, carnicería y hasta una pequeña área de restaurante donde podrás disfrutar de alimentos
                preparados con comida fresca.</p>
                <p>Nuestro servicio en línea cuenta con servicio a domicilio (consulta áreas a las que llegamos). Para iniciar, haz clic en "Buscar productos" en el menú principal
                y realiza tu búsqueda.</p>
                
                <img id="imagen-mostrada" class="imagen-mostrada" src="../vista/multimedia/nosotros/img1.jpg" />
                
                <div class="controles-imagenes">
                    <div class="control-anterior" id="boton-mostrar-imagen-anterior">Anterior imagen</div>
                    <div class="control-siguiente" id="boton-mostrar-imagen-siguiente">Siguiente imagen</div>
                </div>
                
                <p>¿Te han gustado las imágenes? Ven y conócenos personalmente. Contamos con instalaciones amplias, modernas, cómodas y seguras además de amplio parqueo
                ¡te esperamos!</p>
                
                

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

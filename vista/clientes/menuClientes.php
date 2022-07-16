
<!-- OJO variables de ruta deben ser dadas en cada controlador ya que la ruta cambia depende del controlador de donde se llame el menú -->

<!-- menú normal -->
<div class="menu-fondo">
    <div class="margen-seguro-1">
        <div class="margen-seguro-2">
            <nav>
                <div class="margen-seguro-menu">
                    <img src="<?php echo $urlLogoMenu ?>" />
                    <a href="<?php echo $urlCerrarSesion ?>" class="boton-menu">Cerrar sesión</a>
                    <a href="<?php echo $urlAyuda ?>" class="boton-menu" id="irHaciaAyuda">Ayuda</a>
                    <a href="<?php echo $urlCarritoCompras ?>" class="boton-menu" id="irHaciaCarritoCompras">Carrito de compras</a>
                    <a href="<?php echo $urlBuscarProductos ?>" class="boton-menu" id="irHaciaBuscarProductos">Buscar productos</a>
                    <a href="#" class="boton-mostrar-menu-movil" id="boton-mostrar-menu-movil"><span class="material-symbols-outlined">menu</span></a>
                </div>
            </nav>
        </div>
    </div>
</div>

<!-- menú móvil escondido -->
<div class="menu-movil" id="menu-movil">
    <div class="margen-seguro-1">
        <div class="margen-seguro-2">
            <a href="<?php echo $urlBuscarProductos ?>" class="boton-menu-movil" id="irHaciaBuscarProductos">Buscar productos</a>
            <a href="<?php echo $urlCarritoCompras ?>" class="boton-menu-movil" id="irHaciaCarritoCompras">Carrito de compras</a>
            <a href="<?php echo $urlAyuda ?>" class="boton-menu-movil" id="irHaciaAyuda">Ayuda</a>
            <a href="<?php echo $urlCerrarSesion ?>" class="boton-menu-movil">Cerrar sesión</a>
        </div>
    </div>
</div>


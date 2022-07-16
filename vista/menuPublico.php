
<!-- OJO variables de ruta deben ser dadas en cada controlador ya que la ruta cambia depende del controlador de donde se llame el menú -->

<!-- menú normal -->
<div class="menu-fondo">
    <div class="margen-seguro-1">
        <div class="margen-seguro-2">
            <nav>
                <div class="margen-seguro-menu">
                    <img src="<?php echo $urlLogoMenu ?>" />
                    <a href="<?php echo $urlLogin ?>" class="boton-menu">Iniciar sesión</a>
                    <a href="<?php echo $urlNosotros ?>" class="boton-menu">Nosotros</a>
                    <a href="<?php echo $urlIndex ?>" class="boton-menu">Inicio</a>
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
            <a href="<?php echo $urlIndex ?>" class="boton-menu-movil">Inicio</a>
            <a href="<?php echo $urlNosotros ?>" class="boton-menu-movil">Nosotros</a>
            <a href="<?php echo $urlLogin ?>" class="boton-menu-movil">Iniciar sesión</a>
        </div>
    </div>
</div>


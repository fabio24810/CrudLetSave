//************** funciones

function crearDiv(id, idElementoPadre){
    //crear div
    let elemento = document.createElement("div");
    elemento.setAttribute("id", id);
    //agregar a elemento del id, el elemento creado como hijo
    document.getElementById(idElementoPadre).appendChild(elemento);
}

function crearElementoInput(tipo, idYName, idElementoPadre){
    //crear caja de texto que recibe el código
    let elemento = document.createElement("input");
    //agregar atributo tipo
    elemento.setAttribute("type", tipo);
    //agregar atributos id y name
    elemento.setAttribute("id", idYName);
    elemento.setAttribute("name", idYName);
    //agregar a elemento del id, el elemento creado como hijo
    document.getElementById(idElementoPadre).appendChild(elemento);
}

function crearElementoSelect(idYName, idElementoPadre){
    //crear lista
    let elemento = document.createElement("select");
    elemento.setAttribute("id", idYName);
    elemento.setAttribute("name", idYName);
    //agregar a elemento del id, el elemento creado como hijo
    document.getElementById(idElementoPadre).appendChild(elemento);

    //opcion por defecto siempre será "selecciona una opción" al crear un elemento select
    elemento = document.createElement("option");
    elemento.setAttribute("value", "selecciona una opción");
    elemento.text = "selecciona una opción";
    document.getElementById(idYName).appendChild(elemento);
}

function crearElementoOption(valor, idElementoPadre){
    let elemento = document.createElement("option");
    elemento.setAttribute("value", valor);
    elemento.text = valor;
    document.getElementById(idElementoPadre).appendChild(elemento);

}

function crearElementoTexto(nombreElemento, texto, idElementoPadre){
    //crear lista
    let elemento = document.createElement(nombreElemento);
    //agregar texto
    elemento.innerHTML = texto;
    //agregar a elemento del id, el elemento creado como hijo
    document.getElementById(idElementoPadre).appendChild(elemento);
}

function crearBotonBuscar(idElementoPadre){
    //crear div
    crearDiv("botonBuscar", idElementoPadre);

    //crear elemento input
    let elemento = document.createElement("input");
    //agregar atributo tipo
    elemento.setAttribute("type", "submit");
    //agregar id
    elemento.setAttribute("id", "btnBuscar");
    //agregar texto botón
    elemento.setAttribute("value", "Buscar");
    //agregar a elemento del id, el elemento creado como hijo
    document.getElementById("botonBuscar").appendChild(elemento);

}

function eliminarDiv(idElemento){
    if(document.getElementById(idElemento) !== null){
        document.getElementById(idElemento).remove();
    }
}


//************** crear select opción de búsqueda

//crear elemento select
crearElementoSelect("ctTipoDeBusqueda", "frmBuscarProductos");
//crear opciones del select
crearElementoOption("código", "ctTipoDeBusqueda");
crearElementoOption("categoría", "ctTipoDeBusqueda");

//************** mostrar opción de búsqueda cuando ocurre un cambio en la opción seleccionada
//variables switch
let opcion;

//si existe un cambio en la opción seleccionada
document.getElementById("ctTipoDeBusqueda").addEventListener('change', () => {
    
    //obtener valor de opción seleccionada
    opcion = document.getElementById("ctTipoDeBusqueda").value;

    switch(opcion) {
        case "selecciona una opción":
            /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
            Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
            document.cookie = "ctTipoDeBusqueda=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            document.cookie = "lsCategoria1=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            document.cookie = "lsCategoria2=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            document.cookie = "lsCategoria3=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

            //eliminar divs creados en los otros case. Copiar y pegar este código en al inicio de cada case
            eliminarDiv("busquedaPorCodigo");
            eliminarDiv("busquedaPorCategoria1");
            break;
        case "código":
            /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
            Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
            document.cookie = "lsCategoria1=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            document.cookie = "lsCategoria2=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            document.cookie = "lsCategoria3=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            //crear cookie
            document.cookie = "ctTipoDeBusqueda=código";
            

            //eliminar divs existentes
            eliminarDiv("busquedaPorCodigo");
            eliminarDiv("busquedaPorCategoria1");
            //crear div
            crearDiv("busquedaPorCodigo", "frmBuscarProductos");
            //crear textos de descripción o instrucción
            crearElementoTexto("h3", "Ingresa el código del producto a buscar", "busquedaPorCodigo");
            //crear elemento
            crearElementoInput("text", "buscarPorCodigo", "busquedaPorCodigo");
            //crear boton buscar
            crearBotonBuscar("busquedaPorCodigo");
            break;
        case "categoría":
            /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
            Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
            document.cookie = "lsCategoria1=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            document.cookie = "lsCategoria2=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            document.cookie = "lsCategoria3=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            //crear cookie
            document.cookie = "ctTipoDeBusqueda=categoría";
            

            //eliminar divs existentes
            eliminarDiv("busquedaPorCodigo");
            eliminarDiv("busquedaPorCategoria1");
            //crear div
            crearDiv("busquedaPorCategoria1", "frmBuscarProductos");
            //crear textos de descripción o instrucción
            crearElementoTexto("h3", "Selecciona subcategorías", "busquedaPorCategoria1");
            //crear elemento
            crearElementoSelect("lsCategoria1", "busquedaPorCategoria1");
            //crear options del elemento select
            crearElementoOption("alimentos", "lsCategoria1");

            //************** mostrar opción de búsqueda cuando ocurre un cambio den la opción seleccionada

            //si existe un cambio en la opción seleccionada
            document.getElementById("lsCategoria1").addEventListener('change', () => {
                
                //obtener valor de opción seleccionada
                opcion = document.getElementById("lsCategoria1").value;

                switch(opcion) {
                    case "selecciona una opción":
                        /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                        Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                        document.cookie = "lsCategoria1=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        document.cookie = "lsCategoria2=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        document.cookie = "lsCategoria3=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

                        //eliminar divs creados en los otros case. Copiar y pegar este código en al inicio de cada case
                        eliminarDiv("busquedaPorCategoria2");
                        break;
                    case "alimentos":
                        /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                        Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                        document.cookie = "lsCategoria2=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        document.cookie = "lsCategoria3=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        //crear cookie
                        document.cookie = "lsCategoria1=alimentos";

                        //eliminar divs existentes
                        eliminarDiv("busquedaPorCategoria2");
                        //crear div
                        crearDiv("busquedaPorCategoria2", "busquedaPorCategoria1");
                        //crear elemento
                        crearElementoSelect("lsCategoria2", "busquedaPorCategoria2");
                        //crear options del elemento select
                        crearElementoOption("fríos", "lsCategoria2");
                        crearElementoOption("congelados", "lsCategoria2");
                        crearElementoOption("al tiempo", "lsCategoria2");

                        //************** mostrar opción de búsqueda cuando ocurre un cambio den la opción seleccionada

                        //si existe un cambio en la opción seleccionada
                        document.getElementById("lsCategoria2").addEventListener('change', () => {
                
                            //obtener valor de opción seleccionada
                            opcion = document.getElementById("lsCategoria2").value;

                            switch(opcion) {
                                case "selecciona una opción":
                                    /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                    Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                    document.cookie = "lsCategoria2=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                    document.cookie = "lsCategoria3=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                    document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                    document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

                                    //eliminar divs creados en los otros case. Copiar y pegar este código en al inicio de cada case
                                    eliminarDiv("busquedaPorCategoria3");
                                    break;
                                case "fríos":
                                    /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                    Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                    document.cookie = "lsCategoria3=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                    document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                    document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                    //crear cookie
                                    document.cookie = "lsCategoria2=fríos";

                                    //eliminar divs existentes
                                    eliminarDiv("busquedaPorCategoria3");
                                    //crear div
                                    crearDiv("busquedaPorCategoria3", "busquedaPorCategoria2");
                                    //crear elemento
                                    crearElementoSelect("lsCategoria3", "busquedaPorCategoria3");
                                    //crear options del elemento select
                                    crearElementoOption("comidas", "lsCategoria3");
                                    crearElementoOption("bebidas", "lsCategoria3");

                                    
                                    //************** mostrar opción de búsqueda cuando ocurre un cambio den la opción seleccionada

                                    //si existe un cambio en la opción seleccionada
                                    document.getElementById("lsCategoria3").addEventListener('change', () => {
                            
                                        //obtener valor de opción seleccionada
                                        opcion = document.getElementById("lsCategoria3").value;

                                        switch(opcion) {
                                            case "selecciona una opción":
                                                /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                document.cookie = "lsCategoria3=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

                                                //eliminar divs creados en los otros case. Copiar y pegar este código en al inicio de cada case
                                                eliminarDiv("busquedaPorCategoria4");
                                                break;
                                            case "comidas":
                                                /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                //crear cookie
                                                document.cookie = "lsCategoria3=comidas";

                                                //eliminar divs existentes
                                                eliminarDiv("busquedaPorCategoria4");
                                                //crear div
                                                crearDiv("busquedaPorCategoria4", "busquedaPorCategoria3");
                                                //crear elemento
                                                crearElementoSelect("lsCategoria4", "busquedaPorCategoria4");
                                                //crear options del elemento select
                                                crearElementoOption("quesos", "lsCategoria4");
                                                crearElementoOption("pasteles", "lsCategoria4");

                                                //************** mostrar opción de búsqueda cuando ocurre un cambio den la opción seleccionada

                                                //si existe un cambio en la opción seleccionada
                                                document.getElementById("lsCategoria4").addEventListener('change', () => {
                                        
                                                    //obtener valor de opción seleccionada
                                                    opcion = document.getElementById("lsCategoria4").value;

                                                    switch(opcion) {
                                                        case "selecciona una opción":
                                                            /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                            Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                            document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                            document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                            document.cookie = "buscarProductos=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

                                                            //eliminar divs creados en los otros case. Copiar y pegar este código en al inicio de cada case
                                                            eliminarDiv("busquedaPorCategoria5");
                                                            break;
                                                        case "quesos":
                                                            /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                            Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                            document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                            //crear cookie
                                                            document.cookie = "lsCategoria4=quesos";

                                                            //eliminar divs existentes
                                                            eliminarDiv("busquedaPorCategoria5");
                                                            //crear div
                                                            crearDiv("busquedaPorCategoria5", "busquedaPorCategoria4");
                                                            //crear boton buscar
                                                            crearBotonBuscar("busquedaPorCategoria5");

                                                            //eventListener que registra si se hizo clic en boton de enviar creado con crearBotonBuscar() con id "btnBuscar"
                                                            document.getElementById("btnBuscar").addEventListener('click', () => {
                                                                //crear cookies
                                                                document.cookie = "buscarProductos=true";
                                                            });

                                                            break;
                                                        case "pasteles":
                                                            /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                            Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                            document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                            //crear cookie
                                                            document.cookie = "lsCategoria4=pasteles";

                                                            //eliminar divs existentes
                                                            eliminarDiv("busquedaPorCategoria5");
                                                            //crear div
                                                            crearDiv("busquedaPorCategoria5", "busquedaPorCategoria4");
                                                            //crear boton buscar
                                                            crearBotonBuscar("busquedaPorCategoria5");

                                                            //eventListener que registra si se hizo clic en boton de enviar creado con crearBotonBuscar() con id "btnBuscar"
                                                            document.getElementById("btnBuscar").addEventListener('click', () => {
                                                                //crear cookies
                                                                document.cookie = "buscarProductos=true";
                                                            });

                                                            break;
                                                    }
                                                });
                                                break;
                                            case "bebidas":
                                                /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                //crear cookie
                                                document.cookie = "lsCategoria3=bebidas";

                                                //eliminar divs existentes
                                                eliminarDiv("busquedaPorCategoria4");
                                                //crear div
                                                crearDiv("busquedaPorCategoria4", "busquedaPorCategoria3");
                                                //crear elemento
                                                crearElementoSelect("lsCategoria4", "busquedaPorCategoria4");
                                                //crear options del elemento select
                                                crearElementoOption("gaseosas", "lsCategoria4");


                                                //************** mostrar opción de búsqueda cuando ocurre un cambio den la opción seleccionada

                                                //si existe un cambio en la opción seleccionada
                                                document.getElementById("lsCategoria4").addEventListener('change', () => {
                                        
                                                    //obtener valor de opción seleccionada
                                                    opcion = document.getElementById("lsCategoria4").value;

                                                    switch(opcion) {
                                                        case "selecciona una opción":
                                                            /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                            Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                            document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                            document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                            document.cookie = "buscarProductos=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

                                                            //eliminar divs creados en los otros case. Copiar y pegar este código en al inicio de cada case
                                                            eliminarDiv("busquedaPorCategoria5");
                                                            break;
                                                        case "gaseosas":
                                                            /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                            Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                            document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                            //crear cookie
                                                            document.cookie = "lsCategoria4=gaseosas";

                                                            //eliminar divs existentes
                                                            eliminarDiv("busquedaPorCategoria5");
                                                            //crear div
                                                            crearDiv("busquedaPorCategoria5", "busquedaPorCategoria4");
                                                            //crear boton buscar
                                                            crearBotonBuscar("busquedaPorCategoria5");

                                                            //eventListener que registra si se hizo clic en boton de enviar creado con crearBotonBuscar() con id "btnBuscar"
                                                            document.getElementById("btnBuscar").addEventListener('click', () => {
                                                                //crear cookies
                                                                document.cookie = "buscarProductos=true";
                                                            });
                                                            
                                                            break;
                                                    }
                                                });
                                                break;
                                        }
                                    });
                                    break;
                                case "congelados":
                                    /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                    Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                    document.cookie = "lsCategoria3=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                    document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                    document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                    //crear cookie
                                    document.cookie = "lsCategoria2=congelados";

                                    //eliminar divs existentes
                                    eliminarDiv("busquedaPorCategoria3");
                                    //crear div
                                    crearDiv("busquedaPorCategoria3", "busquedaPorCategoria2");
                                    //crear elemento
                                    crearElementoSelect("lsCategoria3", "busquedaPorCategoria3");
                                    //crear options del elemento select
                                    crearElementoOption("comidas", "lsCategoria3");


                                    //************** mostrar opción de búsqueda cuando ocurre un cambio den la opción seleccionada

                                    //si existe un cambio en la opción seleccionada
                                    document.getElementById("lsCategoria3").addEventListener('change', () => {
                            
                                        //obtener valor de opción seleccionada
                                        opcion = document.getElementById("lsCategoria3").value;

                                        switch(opcion) {
                                            case "selecciona una opción":
                                                /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                document.cookie = "lsCategoria3=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                
                                                //eliminar divs creados en los otros case. Copiar y pegar este código en al inicio de cada case
                                                eliminarDiv("busquedaPorCategoria4");
                                                break;
                                            case "comidas":
                                                /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

                                                //crear cookie
                                                document.cookie = "lsCategoria3=comidas";

                                                //eliminar divs existentes
                                                eliminarDiv("busquedaPorCategoria4");
                                                //crear div
                                                crearDiv("busquedaPorCategoria4", "busquedaPorCategoria3");
                                                //crear elemento
                                                crearElementoSelect("lsCategoria4", "busquedaPorCategoria4");
                                                //crear options del elemento select
                                                crearElementoOption("almuerzos", "lsCategoria4");

                                                //************** mostrar opción de búsqueda cuando ocurre un cambio den la opción seleccionada

                                                //si existe un cambio en la opción seleccionada
                                                document.getElementById("lsCategoria4").addEventListener('change', () => {
                                        
                                                    //obtener valor de opción seleccionada
                                                    opcion = document.getElementById("lsCategoria4").value;

                                                    switch(opcion) {
                                                        case "selecciona una opción":
                                                            /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                            Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                            document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                            document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                            document.cookie = "buscarProductos=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

                                                            //eliminar divs creados en los otros case. Copiar y pegar este código en al inicio de cada case
                                                            eliminarDiv("busquedaPorCategoria5");
                                                            break;
                                                        case "almuerzos":
                                                            /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                            Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                            document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                            //crear cookie
                                                            document.cookie = "lsCategoria4=almuerzos";

                                                            //eliminar divs existentes
                                                            eliminarDiv("busquedaPorCategoria5");
                                                            //crear div
                                                            crearDiv("busquedaPorCategoria5", "busquedaPorCategoria4");
                                                            //crear boton buscar
                                                            crearBotonBuscar("busquedaPorCategoria5");

                                                            //eventListener que registra si se hizo clic en boton de enviar creado con crearBotonBuscar() con id "btnBuscar"
                                                            document.getElementById("btnBuscar").addEventListener('click', () => {
                                                                //crear cookies
                                                                document.cookie = "buscarProductos=true";
                                                            });

                                                            break;
                                                    }
                                                });
                                                
                                        }
                                    });
                                    break;
                                case "al tiempo":
                                    /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                    Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                    document.cookie = "lsCategoria3=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                    document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                    document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                    //crear cookie
                                    document.cookie = "lsCategoria2=al tiempo";

                                    //eliminar divs existentes
                                    eliminarDiv("busquedaPorCategoria3");
                                    //crear div
                                    crearDiv("busquedaPorCategoria3", "busquedaPorCategoria2");
                                    //crear elemento
                                    crearElementoSelect("lsCategoria3", "busquedaPorCategoria3");
                                    //crear options del elemento select
                                    crearElementoOption("comidas", "lsCategoria3");
                                    crearElementoOption("bebidas", "lsCategoria3");


                                    //************** mostrar opción de búsqueda cuando ocurre un cambio den la opción seleccionada

                                    //si existe un cambio en la opción seleccionada
                                    document.getElementById("lsCategoria3").addEventListener('change', () => {
                            
                                        //obtener valor de opción seleccionada
                                        opcion = document.getElementById("lsCategoria3").value;

                                        switch(opcion) {
                                            case "selecciona una opción":
                                                /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                document.cookie = "lsCategoria3=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                document.cookie = "buscarProductos=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

                                                //eliminar divs creados en los otros case. Copiar y pegar este código en al inicio de cada case
                                                eliminarDiv("busquedaPorCategoria4");
                                                break;
                                            case "comidas":
                                                /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

                                                //crear cookie
                                                document.cookie = "lsCategoria3=comidas";

                                                //eliminar divs existentes
                                                eliminarDiv("busquedaPorCategoria4");
                                                //crear div
                                                crearDiv("busquedaPorCategoria4", "busquedaPorCategoria3");
                                                //crear elemento
                                                crearElementoSelect("lsCategoria4", "busquedaPorCategoria4");
                                                //crear options del elemento select
                                                crearElementoOption("frutas", "lsCategoria4");
                                                crearElementoOption("verduras", "lsCategoria4");

                                                //************** mostrar opción de búsqueda cuando ocurre un cambio den la opción seleccionada

                                                //si existe un cambio en la opción seleccionada
                                                document.getElementById("lsCategoria4").addEventListener('change', () => {
                                        
                                                    //obtener valor de opción seleccionada
                                                    opcion = document.getElementById("lsCategoria4").value;

                                                    switch(opcion) {
                                                        case "selecciona una opción":
                                                            /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                            Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                            document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                            document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                            document.cookie = "buscarProductos=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

                                                            //eliminar divs creados en los otros case. Copiar y pegar este código en al inicio de cada case
                                                            eliminarDiv("busquedaPorCategoria5");
                                                            break;
                                                        case "frutas":
                                                            /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                            Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                            document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                            //crear cookie
                                                            document.cookie = "lsCategoria4=frutas";

                                                            //eliminar divs existentes
                                                            eliminarDiv("busquedaPorCategoria5");
                                                            //crear div
                                                            crearDiv("busquedaPorCategoria5", "busquedaPorCategoria4");
                                                            //crear boton buscar
                                                            crearBotonBuscar("busquedaPorCategoria5");

                                                            //eventListener que registra si se hizo clic en boton de enviar creado con crearBotonBuscar() con id "btnBuscar"
                                                            document.getElementById("btnBuscar").addEventListener('click', () => {
                                                                //crear cookies
                                                                document.cookie = "buscarProductos=true";
                                                            });

                                                            break;
                                                        case "verduras":
                                                            /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                            Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                            document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                            //crear cookie
                                                            document.cookie = "lsCategoria4=verduras";

                                                            //eliminar divs existentes
                                                            eliminarDiv("busquedaPorCategoria5");
                                                            //crear div
                                                            crearDiv("busquedaPorCategoria5", "busquedaPorCategoria4");
                                                            //crear boton buscar
                                                            crearBotonBuscar("busquedaPorCategoria5");

                                                            //eventListener que registra si se hizo clic en boton de enviar creado con crearBotonBuscar() con id "btnBuscar"
                                                            document.getElementById("btnBuscar").addEventListener('click', () => {
                                                                //crear cookies
                                                                document.cookie = "buscarProductos=true";
                                                            });

                                                            break;
                                                    }
                                                });
                                                break;
                                            case "bebidas":
                                                /*borrar el resto de cookies de subniveles más abajo que posiblemente se hayan creado. No es necesario especificar el valor, solamente el nombre de la cookie.
                                                Como el menú solamente llega a categoría 5, entonces solo hasta allí intentamos eliminar*/
                                                document.cookie = "lsCategoria4=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                document.cookie = "lsCategoria5=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                                                //crear cookie
                                                document.cookie = "lsCategoria3=bebidas";

                                                //eliminar divs existentes
                                                eliminarDiv("busquedaPorCategoria4");
                                                //crear div
                                                crearDiv("busquedaPorCategoria4", "busquedaPorCategoria3");
                                                //crear boton buscar
                                                crearBotonBuscar("busquedaPorCategoria4");

                                                //eventListener que registra si se hizo clic en boton de enviar creado con crearBotonBuscar() con id "btnBuscar"
                                                document.getElementById("btnBuscar").addEventListener('click', () => {
                                                    //crear cookies
                                                    document.cookie = "buscarProductos=true";
                                                });

                                                break;
                                        }
                                    });
                                    break;
                            }      
                        });
                        break;
                }
            });
            break;
    }
});

//******************** recuperar cookies
//array 2d para guardar cookies OJO aquí enlistar todas las categorías existentes en el menú. Si al menú se le agrega otra categoría, agregar aquí también
let cookiesCategorias = [
    ["ctTipoDeBusqueda", undefined], //pos 0 en la primer dimension
    ["lsCategoria1", undefined], //pos 1 en la primer dimension
    ["lsCategoria2", undefined], //pos 2 en la primer dimension
    ["lsCategoria3", undefined], //pos 3 en la primer dimension
    ["lsCategoria4", undefined], //pos 4 en la primer dimension
    ["lsCategoria5", undefined], //pos 5 en la primer dimension
    ["buscarProductos", undefined] //pos 6 en la primer dimension
    ["productoAgregadoAlCarrito", undefined] //pos 7 en la primer dimension
];

//para recuperar cookie que registra si se hizo clic en el boton de buscar producto
let cookieBuscarProductos = undefined;

//para recuperar cookie que registra el último producto agregado al carrito de compras
let cookieProductoAgregadoAlCarrito = undefined;

//recuperar las cookies, valores recuperados se asignan al array cookiesCategorias
function recuperarCookiesCategorias() {
    let cks = document.cookie.split(';');

    //si ctTipoDeBusqueda coincide con algún nombre de cookie
    for(i = 0; i < cks.length; i++) {
        if(cookiesCategorias[0][0] == cks[i].split('=')[0].trim()){
            //guardar valor
            cookiesCategorias[0][1] = cks[i].split('=')[1].trim();
            break;
        }
    }

    //si lsCategoria1 coincide con algún nombre de cookie
    for(i = 0; i < cks.length; i++) {
        if(cookiesCategorias[1][0] == cks[i].split('=')[0].trim()){
            //guardar valor
            cookiesCategorias[1][1] = cks[i].split('=')[1].trim();
            break;
        }
    }

    //si lsCategoria2 coincide con algún nombre de cookie
    for(i = 0; i < cks.length; i++) {
        if(cookiesCategorias[2][0] == cks[i].split('=')[0].trim()){
            //guardar valor
            cookiesCategorias[2][1] = cks[i].split('=')[1].trim();
            break;
        }
    }

    //si lsCategoria3 coincide con algún nombre de cookie
    for(i = 0; i < cks.length; i++) {
        if(cookiesCategorias[3][0] == cks[i].split('=')[0].trim()){
            //guardar valor
            cookiesCategorias[3][1] = cks[i].split('=')[1].trim();
            break;
        }
    }

    //si lsCategoria4 coincide con algún nombre de cookie
    for(i = 0; i < cks.length; i++) {
        if(cookiesCategorias[4][0] == cks[i].split('=')[0].trim()){
            //guardar valor
            cookiesCategorias[4][1] = cks[i].split('=')[1].trim();
            break;
        }
    }

    //si lsCategoria5 coincide con algún nombre de cookie
    for(i = 0; i < cks.length; i++) {
        if(cookiesCategorias[5][0] == cks[i].split('=')[0].trim()){
            //guardar valor
            cookiesCategorias[5][1] = cks[i].split('=')[1].trim();
            break;
        }
    }

}

recuperarCookiesCategorias();

function recuperarCookieBuscarProductos(){
    let cks = document.cookie.split(';');

    //recuperando cookie si se hizo clic en el boton de buscar productos
    //si buscarProductos coincide con algún nombre de cookie
    for(i = 0; i < cks.length; i++) {
        if("buscarProductos" == cks[i].split('=')[0].trim()){
            //guardar valor
            cookieBuscarProductos = cks[i].split('=')[1].trim();
            break;
        }
    }

}

recuperarCookieBuscarProductos();

function recuperarCookieProductoAgregadoAlCarrito(){
    let cks = document.cookie.split(';');

    //recuperando cookie si se hizo clic en el boton de buscar productos
    //si buscarProductos coincide con algún nombre de cookie
    for(i = 0; i < cks.length; i++) {
        if("productoAgregadoAlCarrito" == cks[i].split('=')[0].trim()){
            //guardar valor
            cookieProductoAgregadoAlCarrito = cks[i].split('=')[1].trim();
            break;
        }
    }

}


recuperarCookieProductoAgregadoAlCarrito();

//****************** recrear menú (camino o rama trazado anteriormente hasta donde exista
//OJO si las categorías del menú cambian, también modificar esta sección agregando más if
//verificar ctTipoDeBusqueda (pos 0)
//si cookie valor es distinto a undefined, es decir que sí tiene valor
if(cookiesCategorias[0][1] != undefined){
    //asignar valor al select
    document.getElementById("ctTipoDeBusqueda").value = cookiesCategorias[0][1];
    /*simular event change para que se active el event listener que ya tiene programado arriba. OJO aunque ya tiene un evento programado, de todas maneras es necesario
    agregar aquí un evento usando (new Event("tipo_evento")); para que funcione*/
    document.getElementById("ctTipoDeBusqueda").dispatchEvent(new Event("change"));

    //verificar lsCategoria1 (pos 1)
    //si cookie valor es distinto a undefined, es decir que sí tiene valor
    if(cookiesCategorias[1][1] != undefined){
        //asignar valor al select
        document.getElementById("lsCategoria1").value = cookiesCategorias[1][1];
        /*simular event change para que se active el event listener que ya tiene programado arriba. OJO aunque ya tiene un evento programado, de todas maneras es necesario
        agregar aquí un evento usando (new Event("tipo_evento")); para que funcione*/
        document.getElementById("lsCategoria1").dispatchEvent(new Event("change"));

        //verificar lsCategoria2 (pos 2)
        //si cookie valor es distinto a undefined, es decir que sí tiene valor
        if(cookiesCategorias[2][1] != undefined){
            //asignar valor al select
            document.getElementById("lsCategoria2").value = cookiesCategorias[2][1];
            /*simular event change para que se active el event listener que ya tiene programado arriba. OJO aunque ya tiene un evento programado, de todas maneras es necesario
            agregar aquí un evento usando (new Event("tipo_evento")); para que funcione*/
            document.getElementById("lsCategoria2").dispatchEvent(new Event("change"));

            //verificar lsCategoria3 (pos 3)
            //si cookie valor es distinto a undefined, es decir que sí tiene valor
            if(cookiesCategorias[3][1] != undefined){
                //asignar valor al select
                document.getElementById("lsCategoria3").value = cookiesCategorias[3][1];
                /*simular event change para que se active el event listener que ya tiene programado arriba. OJO aunque ya tiene un evento programado, de todas maneras es necesario
                agregar aquí un evento usando (new Event("tipo_evento")); para que funcione*/
                document.getElementById("lsCategoria3").dispatchEvent(new Event("change"));

                //si cookieProductoAgregadoAlCarrito es dinstinto a undefined, es decir que si tiene valor
                if(cookieProductoAgregadoAlCarrito != undefined){
                    //crear elemento a
                    let elemento = document.createElement("a"); 
                    //agregar atributo href
                    elemento.setAttribute("href", "#" + cookieProductoAgregadoAlCarrito);
                    //agregar atributo id
                    elemento.setAttribute("id", "irAProductoAgregadoAlCarrito");
                    //agregar texto
                    elemento.innerHTML = "ir al ultimo producto agregado al carrito de compras";
                    //agregar css
                    elemento.setAttribute("style", "display:none;");
                    //especificar id elemento del cual este sera hijo
                    document.getElementById('separador-1').appendChild(elemento);

                    //agregar event listener
                    document.getElementById("irAProductoAgregadoAlCarrito").addEventListener('click', function() {
                        location.href = "#" + cookieProductoAgregadoAlCarrito;
                    });

                    //simular clic en el enlace
                    document.getElementById("irAProductoAgregadoAlCarrito").dispatchEvent(new Event("click"));
                    
                }

                //verificar lsCategoria4 (pos 4)
                //si cookie valor es distinto a undefined, es decir que sí tiene valor
                if(cookiesCategorias[4][1] != undefined){
                    //asignar valor al select
                    document.getElementById("lsCategoria4").value = cookiesCategorias[4][1];
                    /*simular event change para que se active el event listener que ya tiene programado arriba. OJO aunque ya tiene un evento programado, de todas maneras es necesario
                    agregar aquí un evento usando (new Event("tipo_evento")); para que funcione*/
                    document.getElementById("lsCategoria4").dispatchEvent(new Event("change"));

                    //si cookieProductoAgregadoAlCarrito es dinstinto a undefined, es decir que si tiene valor
                    if(cookieProductoAgregadoAlCarrito != undefined){
                        //crear elemento a
                        let elemento = document.createElement("a");
                        //agregar atributo href
                        elemento.setAttribute("href", "#" + cookieProductoAgregadoAlCarrito);
                        //agregar atributo id
                        elemento.setAttribute("id", "irAProductoAgregadoAlCarrito");
                        //agregar texto
                        elemento.innerHTML = "ir al ultimo producto agregado al carrito de compras";
                        //agregar css
                        elemento.setAttribute("style", "display:none;");
                        //especificar id elemento del cual este sera hijo
                        document.getElementById('separador-1').appendChild(elemento);

                        //agregar event listener
                        document.getElementById("irAProductoAgregadoAlCarrito").addEventListener('click', function() {
                            location.href = "#" + cookieProductoAgregadoAlCarrito;
                        });

                        //simular clic en el enlace
                        document.getElementById("irAProductoAgregadoAlCarrito").dispatchEvent(new Event("click"));
                        
                    }

                    //verificar lsCategoria5 (pos 5)
                    //si cookie valor es distinto a undefined, es decir que sí tiene valor
                    if(cookiesCategorias[5][1] != undefined){
                        //asignar valor al select
                        document.getElementById("lsCategoria5").value = cookiesCategorias[5][1];
                        /*simular event change para que se active el event listener que ya tiene programado arriba. OJO aunque ya tiene un evento programado, de todas maneras es necesario
                        agregar aquí un evento usando (new Event("tipo_evento")); para que funcione*/
                        document.getElementById("lsCategoria5").dispatchEvent(new Event("change"));

                        //si cookieProductoAgregadoAlCarrito es dinstinto a undefined, es decir que si tiene valor
                    if(cookieProductoAgregadoAlCarrito != undefined){
                        //crear elemento a
                        let elemento = document.createElement("a");
                        //agregar atributo href
                        elemento.setAttribute("href", "#" + cookieProductoAgregadoAlCarrito);
                        //agregar atributo id
                        elemento.setAttribute("id", "irAProductoAgregadoAlCarrito");
                        //agregar texto
                        elemento.innerHTML = "ir al ultimo producto agregado al carrito de compras";
                        //agregar css
                        elemento.setAttribute("style", "display:none;");
                        //especificar id elemento del cual este sera hijo
                        document.getElementById('separador-1').appendChild(elemento);

                        //agregar event listener
                        document.getElementById("irAProductoAgregadoAlCarrito").addEventListener('click', function() {
                            location.href = "#" + cookieProductoAgregadoAlCarrito;
                        });

                        //simular clic en el enlace
                        document.getElementById("irAProductoAgregadoAlCarrito").dispatchEvent(new Event("click"));
                        
                    }
                        

                    }
                }
            }
        }
    }
}





















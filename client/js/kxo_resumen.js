// * secciones
const section_registro = document.getElementById("section_registro");

// * elementos del formulario
const btn_consultar = document.getElementById("consultar");
const error_box = document.getElementById("error-box");

// * tablas
const tabla1 = document.getElementById("tabla1");
// const tabla2 = document.getElementById("tabla2");

// * botones de la tabla
const botones_left_right = document.getElementById("botones-left-right");
const btn_izquierda = document.getElementById("btn-izquierda");
const btn_derecha = document.getElementById("btn-derecha");

// * elemento de loader
const loader = document.getElementById('loader');

// * variables globales
var sucursal, fechaInicio, fechaFinal, estatus;
let datosNextPreviuos;

// * variables del contador y paginacion

let paginacion;
let pagina = 1;
let inicio = 0;
let tope = 24;

// * EVENTOS - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// * EVENTO PARA CARGAR LOS DATOS
    btn_consultar.addEventListener('click', function(e){

        botones_left_right.classList.add('botones--hide');
        btn_izquierda.classList.add('botones--disabel');
        btn_derecha.classList.remove('botones--disabel');
        datosNextPreviuos = [];
        paginacion;
        pagina = 1;
        inicio = 0;
        tope = 24;
        setTimeout(2000);

        e.preventDefault();
        loadData('resumen');
    });

// * EVENTO PARA LOS BOTONES DERECHA E IZQUIERDA
    btn_derecha.addEventListener('click', function(){
        inicio = inicio + 25;
        tope = tope + 25;
        pagina = pagina + 1;
        showNextData(inicio, tope, pagina, datosNextPreviuos);
    });

    btn_izquierda.addEventListener('click', function(){
        inicio = inicio - 25;
        tope = tope - 25;
        pagina = pagina - 1;
        showNextData(inicio, tope, pagina, datosNextPreviuos);
    })


// * FUNCIONES  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// * FUNCION PARA VALIDAR LAS FECHAS
    function validateDates(fechaInicio, fechaFinal){
        if (fechaInicio == ''){
            return false;
        }
        else if (fechaFinal == ''){
            return false;
        }
        else{
            return true;
        }
    }

// * FUNCION PARA ENVIAR Y RECIBIR DATOS
    function loadData(table){

        // * Empezamos la peticion y definimos el metodo en el cual se van a enviar
            var request = new XMLHttpRequest();
            request.open('POST', '../api/API.php');

        // * Limpiamos los los campos en caso de halla algun espacio
            sucursal = formulario.sucursal.value.trim();
            fechaInicio = formulario.fechaInicio.value.trim();
            fechaFinal = formulario.fechaFinal.value.trim();
            // estatus = formulario.estatus.value.trim();

        if (validateDates(fechaInicio, fechaFinal)) {

            // * Hasta que ingrese las fechas va a quitar el atirbuto de 'dontShow'
                error_box.classList.add('error-box--hide');

            // * Mandamos los paramatres
                var parametros = 'sucursal=' + sucursal + '&fecha1=' + fechaInicio + '&fecha2=' + fechaFinal + '&estatus=' + estatus + '&table=' + table;

            // * Especifacmos el formato del request
                request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                loader.classList.add('active');

            // * Leemos la peticion
                request.onload = function(){
                    
                    // * Si existe informacion la funcion que recibe los datos y los procesa los mostrara
                        var datos = JSON.parse(request.responseText);
                        console.table(datos);
                        showData(datos);
                        datosNextPreviuos = datos;
                }
            
            // * Verificamos que la peticion sea exitosa
                request.onreadystatechange = function(){
                    if (request.readyState == 4 && request.status == 200){
                        loader.classList.remove('active');
                        error_box.classList.add('error-box--hide');
                        tabla1.classList.remove('tabla--hide');
                    }
                    else {
                        error_box.innerHTML = 'Error de conexion, intentelo de nuevo';
                        error_box.classList.remove('error-box--hide');
                    }
                }

            // * Mandamos la peticion con los parametros
                request.send(parametros);
        }
        else {
            error_box.classList.remove('error-box--hide');
        }
    }

// * FUNCION PARA PROCESAR Y MOSTRAR DATOS (SOLO LOS PRIMEROS 25 DE LA CONSULTA)
    function showData(datos){

        // PREGUNTO SI EXISTE PARA EVITAR GENERAR DUPLICADOS
            const qDivContendorPadre2 = document.getElementById("tablaContendorRegistros2");
            
            if (document.body.contains(qDivContendorPadre2)){
                qDivContendorPadre2.remove();
                setTimeout(2000);
            }

        // CREO LA TABLA Y ASIGNO EL CONTENEDOR A UNA VARIBALE
            createTable();
            const divContendorPadre2 = document.getElementById("tablaContendorRegistros2");
            setTimeout(2000);

        // VEMOS LO DE LAPAGINACION
            paginacion = Math.ceil(datos.length / 25);
            if (paginacion > 1){
                botones_left_right.classList.remove('botones--hide');
            }

        // CICLO INICAL QUE MUESTRA LOS PRIMEROS 25 REGISTROS
            for (let i = 0; i <= 24; i++) {

            // CICLO QUE PONE Y LEE LOS VALORES DE 0 - 1 PARA LA SEGUNDA TABLA
                for (let index = 0; index <= 1; index++) {

                    const div = document.createElement('DIV');
                    div.setAttribute("id", i + "-" + index)
                    div.classList.add('tabla__info');

                    const p = document.createElement('P');
                    p.textContent = datos[i][index];

                    divContendorPadre2.appendChild(div);
                    div.appendChild(p);

                    setTimeout(2000);
                }
            }
    }

// * FUNCION PARA MOSTRAR LOS SIGUIENTES 25
    function showNextData(inicio, tope, pagina, datosNextPreviuos){
        
        if (pagina === paginacion){
            btn_derecha.classList.add("botones--disabel");
        }
        else{
            btn_derecha.classList.remove("botones--disabel");
        }

        if (pagina === 1){
            btn_izquierda.classList.add("botones--disabel");
        }
        else{
            btn_izquierda.classList.remove("botones--disabel");
        }
        

        // PRIMERO SE ELIMINAN LOS REGISTROS PREVIOS
            const divContendorPadre2 = document.getElementById("tablaContendorRegistros2");
            divContendorPadre2.remove();
            setTimeout(2000);

        // VUELVO A CREAR LA TABLA
            createTable();

        // PRIMERO SE ELIMINAN LOS REGISTROS PREVIOS
            const nuevoDivContendorPadre2 = document.getElementById("tablaContendorRegistros2");
        
        // PONEMOS LOS NUEVOS VALORES
            for (inicio; inicio <= tope; inicio++) {
                
                // CICLO QUE PONE Y LEE LOS VALORES DE 0 - 1 PARA LA SEGUNDA TABLA
                for (let index = 0; index <= 1; index++) {

                    const div = document.createElement('DIV');
                    div.setAttribute("id", inicio + "-" + index)
                    div.classList.add('tabla__info');

                    const p = document.createElement('P');
                    p.textContent = datosNextPreviuos[inicio][index];

                    nuevoDivContendorPadre2.appendChild(div);
                    div.appendChild(p);

                    setTimeout(2000);
                }
            }

    }

// * CREAR TABLA DE REGISTROS
    function createTable(){

        // * CREO EL CONTENDOR DE LOS REGISTROS DONDE IRA TODA LA INFORMACION DE LA PEQUEÑA
            const divContendorRegistros2 = document.createElement('DIV');
            divContendorRegistros2.setAttribute("id", "tablaContendorRegistros2");
            divContendorRegistros2.classList.add("tabla_KXO_resumen");
            tabla1.appendChild(divContendorRegistros2);

            const divContendorPadre2 = document.getElementById("tablaContendorRegistros2");

        // * CREO LOS TITULOS
            const nombresTitulos2 = ['Nombre Operador', 'KMS'];

            for (let titulo = 0; titulo < nombresTitulos2.length; titulo++) {
                
                const divTitulo = document.createElement("DIV");
                divTitulo.classList.add("tabla__titulo");
                const pContenido = document.createElement("P");
                pContenido.textContent = nombresTitulos2[titulo];

                divContendorPadre2.appendChild(divTitulo);
                divTitulo.appendChild(pContenido);

            }

        // * CREO QUE LAS SEPARACION
            const separacion2 = document.createElement("DIV");
            separacion2.classList.add("separacion");
            divContendorPadre2.appendChild(separacion2);
    }
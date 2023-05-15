<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antigüedades - FNG</title>
    <link rel="stylesheet" href="<?php echo RUTA;?>resource/css/normalize.css">
    <link rel="stylesheet" href="<?php echo RUTA;?>resource/css/general.css">
</head>
<body>

    <!-- * MENU -->
    <nav class="menu menu--hide" id="menu-nav">
        <div class="menu__cerrar">
            <a href="#" class="tache"></a>
        </div>
        <div class="menu__lista">
            <ul class="lista__links">
                <li><a href="../php/resumenGeneral.php">Resumen General</a></li>
                <li><a href="../php/bitacoras.php">Bitacoras</a></li>
                <li><a href="../php/antiguedades.php">Antigüedades</a></li>
                <li><a href="../php/prestamos.php">Prestamos</a></li>
                <li><a href="../php/kxo_resumen.php">Resumen</a></li>
                <li><a href="../php/kxo_desglozado.php">Desglozado</a></li>
                <li><a href="../php/cerrarSesion.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>

    <!-- * HEADER -->
    <header class="header">
        <div class="header__titulo">
            <a href="../php/paginaInicio.php">
                <strong>FNG</strong>
                <span class="hide-text">- Fletera nacional de gases</span>
            </a>
        </div>
        <div class="header__menu">
            <a href="#" id="menu-header">
                <p class="hide-text">Menú</p>
                <div class="hamburgesa">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </a>
        </div>
    </header>

    <!-- * BANNER -->
    <section class="banner">
        <div class="contenido-banner">
            <div class="inner">
                <h1>Antigüedades</h1>
            </div>
        </div>
    </section>

    <!-- * MAIN -->
    <main class="main">

        <!-- * TABLA DE REGISTRO -->
        <section class="main__section" id="section_registro">
            <div class="contenido-section max-container--160-95">
                <h3>Tabla de Registros</h3>

                <!-- ? OPCIONES DE FILTRADO -->
                <form method="get" id="formulario" class="formulario formulario-1"> 
                    
                    <div class="sucursal">
                        <label for="sucursal">Sucursal</label>
                        <select name="sucursal" id="sucursal">
                            <option value="">Seleccione una Sucursal</option>
                            <option value="2">Altamira</option>
                            <option value="3">Tijuana</option>
                            <option value="4">Toluca</option>
                            <option value="5">Puebla</option>
                            <option value="6">Mina</option>
                            <option value="7">Villa</option>
                            <option value="11 ">Celaya</option>
                            <option value="8">Naucalpan</option>
                            <option value="9">Monterrey</option>
                            <option value="14">San Luis Potosí</option>
                        </select>
                    </div>

                    <div class="fechaInicio">
                        <label for="fechaInicio">Fecha Inicio</label>
                        <input type="date" name="fechaInicio" id="fechaInicio">
                    </div>

                    <div class="fechaFinal">
                        <label for="fechaFinal">Fecha Final</label>
                        <input type="date" name="fechaFinal" id="fechaFinal">
                    </div>

                    <div class="consultar">
                        <label for="consultar" class="btn--hide">Consultar</label>
                        <button id="consultar" class="btn">Consultar</button>
                    </div>
                </form>

                <!-- ? MENSAJE DE ERROR -->
                <div class="error-box error-box--hide" id="error-box">
                    <p>Por favor seleccione una fecha de inicio y final</p>
                </div>

                <!-- ? SEGUNDA TABLA -->
                <div class="tabla--hide" id="tabla2">  
                </div>

                <!-- ? BOTONES -->
                <div class="botones-left-right botones--hide" id="botones-left-right">
                    <button id="btn-izquierda" class="btn btn-izquierda botones--disabel">< Anterior</button>
                    <button id="btn-derecha" class="btn btn-derecha">Siguiente ></button>
                </div>

                <!-- ? LOADER -->
                <div class="loader" id="loader"></div>
            </div>
        </section>

        <!-- * GRAFICA -->
        <section class="main__section" id="section_grafica">
            <div class="contenido-section max-container--160-95">
                <h3>Grafica de Regsitros</h3>
                <div class="inner-grafico">
                    <iframe title="2_BITACORAS" id="myChart" src="https://app.powerbi.com/view?r=eyJrIjoiZTc0ZDk1YjktM2Q5OC00Y2Y1LWI0NjItZGQxZjNiMjgzNGMwIiwidCI6ImNhY2E5MDExLTdiNmEtNDRkZS04NjFmLTA5NWEyY2E4ODNiNyIsImMiOjR9&pageName=ReportSection" frameborder="0" allowFullScreen="true"></iframe>
                </div>
            </div>
        </section>
    </main>

    <!-- * FOOTER -->
    <footer class="footer">
        <div class="footer_contenido max-container">
            <div class="cerrarSesion">
                <a href="../php/cerrarSesion.php" class="boton">Cerrar Sesion</a>
            </div>
            <div class="copyright">
                <p>&copy;  Fletera nacional de Gases</p>
                <p>Desing: <span>HTML5 UP & R1muru02</span></p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>
    <script src="../js/antiguedades.js"></script>
    <script src="../js/menu.js"></script>

</body>
</html>
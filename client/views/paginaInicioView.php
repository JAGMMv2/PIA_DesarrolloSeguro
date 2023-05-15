<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - FNG</title>
    <link rel="stylesheet" href="<?php echo RUTA;?>resource/css/general.css">
    <link rel="stylesheet" href="<?php echo RUTA;?>resource/css/normalize.css">
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
                <h1>Bienvenido, ¿Qué desea realizar el día de hoy?</h1>
                <a href="#layout-grid" class="boton">Empezemos!</a>
            </div>
        </div>
    </section>

    <!-- * MAIN -->
    <main class="layout-grid" id="layout-grid">
        <article class="article">
            <a href="../php/resumenGeneral.php">
                <div class="contenido">
                    <div class="contenido__inner">
                        <h3 class="article__titulo">Resumen General</h3>
                        <p class="article__parrafo">Muestra un reporte de estatus de bitácoras.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="article">
            <a href="../php/bitacoras.php">
                <div class="contenido">
                    <div class="contenido__inner">
                        <h3 class="article__titulo">Bitacoras</h3>
                        <p class="article__parrafo">Muestra las bitácoras Timbradas a tiempo real.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="article">
            <a href="../php/antiguedades.php">
                <div class="contenido">
                    <div class="contenido__inner">
                        <h3 class="article__titulo">Antigüedades</h3>
                        <p class="article__parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="article">
            <a href="../php/prestamos.php">
                <div class="contenido">
                    <div class="contenido__inner">
                        <h3 class="article__titulo">Prestamos</h3>
                        <p class="article__parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="article">
            <a href="../php/kxo_resumen.php">
                <div class="contenido">
                    <div class="contenido__inner">
                        <h3 class="article__titulo">KMS x Operador - Resumen</h3>
                        <p class="article__parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="article">
            <a href="../php/kxo_desglozado.php">
                <div class="contenido">
                    <div class="contenido__inner">
                        <h3 class="article__titulo">KMS x Operador - Desglozado</h3>
                        <p class="article__parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </a>
        </article>
    </main>

    <!-- * MISION -->
    <section class="section">
        <div class="section_contenido max-container">
            <h2>FNG - Misión</h2>
            <p>Creada pensando en cubrir las necesidades de nuestros clientes, FNG USA INC se caracteriza por brindar soluciones logísticas con altos estándares de calidad y servicio. Conocedores de nuestro nivel de responsabilidad dentro del JIT, inventarios y cadena de suministros de nuestros diversos clientes, hemos consolidado un equipo de trabajo que conoce y entiende a la perfección las necesidades de nuestros socios comerciales. Con una flota de tractocamiones moderna, con oficinas, patios y talleres mecánicos distribuidos de manera estratégica en México y USA, FNG USA INC es el complemento perfecto dentro de GRUPO FNG. Eslabón con el cual hoy en día podemos recolectar y entregar sus cargas en cualquier punto de los países anteriormente mencionados sin necesidad de un tercero.</p>
        </div>
    </section>

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

    <script src="../js/menu.js"></script>

</body>
</html>
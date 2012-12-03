<?php
session_start();
$uNombre = "";
$uUsuario = "";
if (isset($_SESSION['usuario'])) {
    $uUsuario = $_SESSION['nombre'];
    $uNombre = $_SESSION['usuario'];
} else {
    header("Location: fuera.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <link rel="shortcut icon" href="imagenes/upc.ico" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>:::MENÚ:::</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />
        <style type="text/css">
            .bb {
                font-weight: bold;
            }
            .bb {
                font-weight: bold;
            }
        .bb {
	color: #FFF;
}
        </style>
        <script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
    </head>

    <body background="imagenes/fondo.JPG">
    <p class="bb">
            <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="1604" height="117">
                <param name="movie" value="imagenes/banner.swf" />
                <param name="quality" value="high" />
                <param name="wmode" value="opaque" />
                <param name="swfversion" value="8.0.35.0" />
                <!-- Esta etiqueta param indica a los usuarios de Flash Player 6.0 r65 o posterior que descarguen la versión más reciente de Flash Player. Elimínela si no desea que los usuarios vean el mensaje. -->
                <param name="expressinstall" value="Scripts/expressInstall.swf" />
                <!-- La siguiente etiqueta object es para navegadores distintos de IE. Ocúltela a IE mediante IECC. -->
                <!--[if !IE]>-->
                <object type="application/x-shockwave-flash" data="imagenes/banner.swf" width="1604" height="117">
                    <!--<![endif]-->
                    <param name="quality" value="high" />
                    <param name="wmode" value="opaque" />
                    <param name="swfversion" value="8.0.35.0" />
                    <param name="expressinstall" value="Scripts/expressInstall.swf" />
                    <!-- El navegador muestra el siguiente contenido alternativo para usuarios con Flash Player 6.0 o versiones anteriores. -->
                    <div>
                        <h4>El contenido de esta página requiere una versión más reciente de Adobe Flash Player.</h4>
                        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" width="112" height="33" /></a></p>
                    </div>
                    <!--[if !IE]>-->
                </object>
                <!--<![endif]-->
            </object>
    </p>
    <p class="bb">	Bienvenido <?php echo $uNombre; ?></p>
        <div id="menu-wrapper">
          <ul id="hmenu">
                <li><a href="indexPersona.php">Persona</a>
                    <ul class="sub-menu">
                        <li><a href="formulario/Personas.html">Agregar</a></li>                       
                    </ul>
                </li>

                <li><a href="indexEstudiante.php">Estudiante</a>
                    <ul class="sub-menu">
                        <li><a href="formulario/Estudiante.html">Agregar</a></li>
                    </ul>   
                </li>

                <li><a href="indexJurado.php">Jurado</a>
                    <ul class="sub-menu">
                        <li><a href="formulario/Jurado.html">Agregar</a></li>

                    </ul>     
                </li>

                <li><a href="indexDirector.php">Director</a>
                    <ul class="sub-menu">
                        <li><a href="formulario/Director.html">Agregar</a></li>

                    </ul>  
                </li>

                <li><a href="indexProyecto.php">Proyecto</a>
                    <ul class="sub-menu">
                        <li><a href="formulario/Proyecto.html">Agregar</a></li>
                    </ul>  
                </li>

            <li><a href="indexAdministrador.php">Administrador</a>
                    <ul class="sub-menu">
                        <li><a href="formulario/Administrador.html">Agregar</a></li>

                    </ul>  
              </li>

            <li><a href="indexSeguimiento.php">Seguimiento</a>
              <ul class="sub-menu">
                      <li><a href="formulario/Seguimiento.html">Agregar</a></li>
                </ul>
              </li>
              <li> </li>
            </ul>
        </div>
        <p>&nbsp; </p>
        <p>&nbsp; </p>
    <script type="text/javascript">
            swfobject.registerObject("FlashID");
          </script>
</body> 
</html>


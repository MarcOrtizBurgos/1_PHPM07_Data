<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="global.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="dindex">
            <form action="ModalidadJ/ModalidadJ.php">
                <input class="tipoz" type="submit" value="Modalidad Jugador">
            </form>
            <form action="ModalidadM/ModalidadM.php">
                <input class="tipoz" type="submit" value="Modalidad Maquina">
            </form>
        </div>
        <form action="Estadistiques.php">
                <input class="tipoz" type="submit" value="Estadistiques">
        </form>
        <br>
        <div id="credito">
            <button class="tipoz">Credits</button>
        </div>
        <script src="documento.js" language="javascript" type="text/javascript"></script>
    </body>
</html>
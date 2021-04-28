<?php
session_start();
$_SESSION["nivelJ"] = 50;
require_once 'Funcion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../../global.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form action="..\..\index.php">
            <input class="tipoz" type="submit" value="Volver al Index">
        </form>
        <br>
        <div class="niveles">
            <form action="NivelJ1.php">
                <input class="tipoz" type="submit" value="Nivel 1">
            </form>
            <form action="NivelJ2.php">
                <input class="tipoz" type="submit" value="Nivel 2">
            </form>
            <form action="NivelJ3.php">
                <input class="tipoz" type="submit" value="Nivel 3">
            </form>
        </div>
        <br>        
        <h1 class="medio">Nivel 2</h1><br>
        <form id="pepe1" method="post"> 
            <label for="nom">Piensa un numero del 1 al 50:</label><br>
            <input class="tipoz1" type="submit" name="tipo" value="Menor <">
            <input class="tipoz1" type="submit" name="tipo" value="Igual =">
            <input class="tipoz1" type="submit" name="tipo" value="Mayor >"><br>
            <?php
                nivelo();
            ?>
        </form>
    </body>
</html>

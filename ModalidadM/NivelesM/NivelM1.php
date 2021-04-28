<?php
session_start();
$_SESSION["nivelM"] = 10;
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
            <form action="NivelM1.php">
                <input class="tipoz" type="submit" value="Nivel 1">
            </form>
            <form action="NivelM2.php">
                <input class="tipoz" type="submit" value="Nivel 2">
            </form>
            <form action="NivelM3.php">
                <input class="tipoz" type="submit" value="Nivel 3">
            </form>
        </div>
        <br>
        <h1 class="medio">Nivel 1</h1><br>
        <form id="pepe1" method="post"> 
            <label for="nom">Pon un numero del 1 al 10:</label><br>
            <input type="number" name="nom1">
            <input class="tipoz1" type="submit" value="Submit"><br>
            <?php
                require_once 'Funcion.php';
                nivelo();
            ?>
        </form>
    </body>
</html>
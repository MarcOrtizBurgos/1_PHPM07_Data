<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../global.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form action="..\index.php">
            <input class="tipoz" type="submit" value="Volver al Index">
        </form>
        <br> 
        <form action="NivelesM/NivelM1.php">
            <input class="tipoz" type="submit" value="Nivel 1">
        </form>
        <form action="NivelesM/NivelM2.php">
            <input class="tipoz" type="submit" value="Nivel 2">
        </form>
        <form action="NivelesM/NivelM3.php">
            <input class="tipoz" type="submit" value="Nivel 3">
        </form>
        <br>
        <div>
            <label class="centrao">En la modalidad de la maquina, la maquina pensara un numero aleatorio dependiendo del nivel y el jugador tendra que ir preguntando con numeros cual es y para guiarse la maquina le ira indicando si el numero es mas grande o mas pequeño del que a puesto el jugador</label>
        </div>
    </body>
</html>

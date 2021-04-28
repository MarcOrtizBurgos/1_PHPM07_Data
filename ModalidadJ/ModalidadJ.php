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
        <form action="NivelesJ/NivelJ1.php">
            <input class="tipoz" type="submit" value="Nivel 1">
        </form>
        <form action="NivelesJ/NivelJ2.php">
            <input class="tipoz" type="submit" value="Nivel 2">
        </form>
        <form action="NivelesJ/NivelJ3.php">
            <input class="tipoz" type="submit" value="Nivel 3">
        </form>
        <br>
        <div>
            <label class="centrao">En la modalidad de jugador, el jugador tiene que pensar un numero i la maquina ira preguntando numeros para adivinar el numero del jugador, el jugador tendra que ir diciendole a la maquina si el numero que busca es mas pequeño, mas grande o igual al numero que pregunta</label>
        </div>
    </body>
</html>

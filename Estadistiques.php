<?php
//session_start();
//session_destroy();
session_start();
require_once 'Database/DatabaseProc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="global.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
            $conesion = new DatabaseProc("localhost","root","root","phpep");
            $conesion->connect();
        ?>
        <form action="index.php">
            <input class="tipoz" type="submit" value="Volver al Index">
        </form>
        <form method="post" action="">
            <input type="text" name="damelo">
            <input class="tipoz1" name="sumbit" type="submit" value="Busca ID">
            <input class="tipoz1" name="dele" type="submit" value="Delete ID">
        </form>
        
        <div class="centrao2">
        <?php
            if(isset($_POST['sumbit']) && $_POST["damelo"]!=null){
                $result = $conesion->findById($_POST["damelo"]);
            }
            else if(!isset($_POST['sumbit']) && !isset($_POST['dele'])){
                $result = $conesion->selectAll();
            }
            else {
                $conesion->delete($_POST["damelo"]);
                $result = $conesion->selectAll();
            }
            if ($result->num_rows > 0) {
                echo "<table id='uvu' class='tablica'>";
                echo '<tr><th>ID</th><th>MODALITAT</th><th>NIVELL</th><th>INTENTS</th><th>DATA PARTIDA</th></tr>';
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["modalitat"] . "</td><td>" . $row["nivell"] . "</td><td>" . $row["intents"] . "</td><td>" . $row["data_partida"] . "</td></tr>";
                }
                echo '</table>';
            } else {
                echo "<h1>0 results</h1>";
            }
        ?>
        </div>  
    </body>
</html>

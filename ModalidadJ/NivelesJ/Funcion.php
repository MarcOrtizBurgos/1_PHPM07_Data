<?php
require_once '../../Database/DatabaseProc.php';

if(!isset($_SESSION["wacho"])){
    $_SESSION["wacho"] = "";
}

class Maquina{
    protected $nivel;
    protected $maximo;
    protected $minimo;
    protected $medio;
    protected $contador;
    protected $modalidad = "Adivina Jugador";
    public function __construct($v){
        $this->nivel=$v;
    }
}
class Operacion extends Maquina{
    public function nivel(){
        if($_SESSION["nivelJ"] != $this->nivel){
            $this->maximo = "";
            $this->nivel = $_SESSION["nivelJ"];
        }

        if($this->maximo == ""){
            $this->contador = 1;
            $this->maximo = $this->nivel;
            $this->minimo = 1;
            $this->medio = floor((($this->maximo - $this->minimo)/2)+ $this->minimo);
        }

        if (empty($_POST["tipo"])) {
            echo "<label>Contador: ".$this->contador."</label><br>";
            echo '<label>El numero que busco es mas grande, igual o más pequeño de '.$this->medio."</label>";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["tipo"])){
                if(($_POST["tipo"]) == "Menor <"){
                    if($this->medio >= $this->minimo){
                        $this->maximo = $this->medio;
                        $this->medio = floor((($this->maximo - $this->minimo)/2)+ $this->minimo);
                        $this->contador++;
                        echo "<label>Contador: ".$this->contador."</label><br>";
                        echo "<label>El numero que busco es mas pequeño o mas grande de ".$this->medio."</label>";
                    }
                    else{
                        echo "<label>Contador: ".$this->contador."</label><br>";
                        echo "<label>El numero que busco es mas pequeño o mas grande de ".$this->medio."</label>";
                    }
                }
                if(($_POST["tipo"]) == "Mayor >"){
                    if($this->medio <= $this->maximo){
                        $this->minimo = $this->medio+1;
                        $this->medio = floor((($this->maximo - $this->minimo)/2)+ $this->minimo);
                        $this->contador++;
                        echo "<label>Contador: ".$this->contador."</label><br>";
                        echo "<label>El numero que busco es mas pequeño o mas grande de ".$this->medio."</label>";
                    }else{
                        echo "<label>Contador: ".$this->contador."</label><br>";
                        echo "<label>El numero que busco es mas pequeño o mas grande de ".$this->medio."</label>";
                    }
                }

                if(($_POST["tipo"]) == "Igual ="){
                    echo "<label>Contador: ".$this->contador."</label><br>";
                    echo "<label>La maquina ha encontrado el numero en ".$this->contador." intento/s. El numero secreto era ".$this->medio."</label><br>";
                    echo "<label>Quieres volver ha jugar?</label>";
                    $conesion = new DatabaseProc("localhost","root","root","phpep");
                    $conesion->connect();
                    $conesion->insert($this->modalidad, $this->nivel, $this->contador);
                    unset($this->maximo);
                    session_destroy();
                    echo "<input class='tipoz1' type='submit' value='Volver a jugar'>";
                }
            }
        }
    }
}

function nivelo(){
    $op = $_SESSION["wacho"];
    if($op == ""){
        $op = new Operacion($_SESSION["nivelJ"]);
    }
    else{
        $op = unserialize($op);
    }
    $op->nivel();
    $_SESSION["wacho"] = serialize($op);
}

?>
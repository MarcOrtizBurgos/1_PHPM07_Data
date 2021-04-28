<?php

require_once '../../Database/DatabaseOOP.php';

if(!isset($_SESSION["wacho"])){
    $_SESSION["wacho"] = "";
}

class Maquina{
    protected $nivel;
    protected $num;
    protected $contador;
    protected $modalidad = "Adivina Maquina";
    public function __construct($v){
        $this->nivel=$v;
    }
}
class Operacion extends Maquina{
    public function nivel(){

        if($_SESSION["nivelM"] != $this->nivel){
            $this->num = "";
            $this->nivel = $_SESSION["nivelM"];
        }

        if($this->num == ""){
            $this->num = rand(1,$this->nivel);
            $this->contador = 0;
        }
        if (empty($_REQUEST['nom1'])) {
            echo "<label>Contador: ".$this->contador."</label><br>";
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_REQUEST['nom1']);
            if (empty($name)) {
            } else {
                if($this->num == $name){
                    echo "<label>Contador: ".$this->contador."</label><br>";
                    echo "<label>Has ganado el numero que has puesto es igual que ".$this->num."</label><br>";
                    echo "<label>Quieres volver a jugar?</label>";
                    $conesion = new DatabaseOOP("localhost","root","root","phpep");
                    $conesion->connect();
                    $conesion->insert($this->modalidad, $this->nivel, $this->contador);
                    unset($this->num);
                    $_SESSION["wacho"] = "";
                    session_destroy();
                    echo "<input class='tipoz1' type='submit' value='Volver a jugar'>";
                }
                else if($this->num < $name){
                    $this->contador++;
                    echo "<label>Contador: ".$this->contador."</label><br>";
                    echo "<label>El numero que buscas es mas pequeño de ".$name."</label>";
                    echo '<br>';
                }
                else if($this->num > $name){
                    $this->contador++;
                    echo "<label>Contador: ".$this->contador."</label><br>";
                    echo "<label>El numero que buscas es mas grande de ".$name."</label>";
                    echo '<br>';
                }
            }
        }
    }
}

function nivelo(){
    $op = $_SESSION["wacho"];
    if($op == ""){
        $op = new Operacion($_SESSION["nivelM"]);
    }
    else{
        $op = unserialize($op);
    }
    $op->nivel();
    $_SESSION["wacho"] = serialize($op);
}

?>
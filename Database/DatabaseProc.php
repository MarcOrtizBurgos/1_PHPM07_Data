<?php
include_once 'DatabaseConnection.php';

class DatabaseProc extends DatabaseConnection{
    
    public function __construct($servername, $username, $password,$database) {
        parent::__construct($servername, $username, $password,$database);
    }

    public function connect(): void {
        $this->connection = mysqli_connect($this->servername, $this->username, $this->password,$this->database);
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
            $this->connection = null;
        }
    }

    public function insert($modalitat, $nivell, $intents): int {
        $sql = "INSERT INTO estadistiques (modalitat, nivell, intents) VALUES ('$modalitat', $nivell, $intents)";
        if ($this->connection != null) {
            if (mysqli_query($this->connection, $sql)) {
                return mysqli_insert_id($this->connection);
            } else {
                return -1;
            }
        }
    }

    public function selectAll() {
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
        return $result;        
    }

    public function selectByModalitat($modalitat) {
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques WHERE modalitat = '$modalitat'";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
        return $result; 
    }

    public function delete($id): void {
        $sql = "DELETE FROM estadistiques WHERE id = '$id'";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
    }

    public function findById($id) {
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques WHERE id = '$id'";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
        return $result;
    }

    public function uptade($modal,$nivell,$intents,$id) {
        $sql = "UPDATE estadistiques SET modalitat=".$modal.", nivell=".$nivell.", intents=".$intents." WHERE id = '$id'";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
        return $result;
    }

}

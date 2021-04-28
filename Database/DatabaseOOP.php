<?php
include_once 'DatabaseConnection.php';

class DatabaseOOP extends DatabaseConnection{
    
    public function __construct($servername, $username, $password,$database) {
        parent::__construct($servername, $username, $password,$database);
    }

    //put your code here
    public function connect(): void {
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
            $this->connection = null;
        }
    }

    public function insert($modalitat, $nivell, $intents): int {
        $sql = "INSERT INTO estadistiques (modalitat, nivell, intents) VALUES ('$modalitat', $nivell, $intents)";
        if ($this->connection != null) {
            if ($this->connection->query($sql) === TRUE) {
                return $this->connection->insert_id;
            } else {
                return -1;
            }
        }
    }

    public function selectAll() {
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        return $result;
    }

    public function selectByModalitat($modalitat) {
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques WHERE modalitat = '$modalitat'";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        return $result;
    }

    public function delete($id): void {
        $sql = "DELETE FROM estadistiques WHERE id = '$id'";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
    }

    public function findById($id) {
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques WHERE id = '$id'";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        return $result;
    }

    public function uptade($modal,$nivell,$intents,$id) {
        $sql = "UPDATE estadistiques SET modalitat=".$modal.", nivell=".$nivell.", intents=".$intents." WHERE id = '$id'";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        return $result;
    }

}

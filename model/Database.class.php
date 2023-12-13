<?php
// Criando a classe Database
class Database {
    // Definindo os atributos
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    // Criando o construtor
    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
    }

    // Criando a função de iniciar a conexão com o banco
    private function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Criando a função de consulta ao banco
    public function query($sql) {
        return $this->connection->query($sql);
    }

    // Criando a função de encerrar a conexão com o banco
    public function close() {
        $this->connection->close();
    }
}
?>
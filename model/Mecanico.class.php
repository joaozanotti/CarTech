<?php
// Requerindo a classe Pessoa
require_once 'Pessoa.class.php';

// Criando a classe Mecanico (subclasse de Pessoa)
class Mecanico extends Pessoa {
    // Definindo os atributos
    private $salario;
    private $cargo;
    private $especializacao;

    // Criando o construtor
    function __construct($nome = "", $cpf = "", $telefone = "", $endereco = "", $salario = "", $cargo = "", $especializacao = "") {
        parent::__construct($nome, $cpf, $telefone, $endereco);
        $this->salario = $salario;
        $this->cargo = $cargo;
        $this->especializacao = $especializacao;
    }

    // Definindo os gets e sets
    function getSalario() {
        return $this->salario;
    }
    function setSalario($salario) {
        return $this->salario = $salario;
    }

    function getCargo() {
        return $this->cargo;
    }
    function setCargo($cargo) {
        return $this->cargo = $cargo;
    }

    function getEspecializacao() {
        return $this->especializacao;
    }
    function setEspecializacao($especializacao) {
        return $this->especializacao = $especializacao;
    }

    // Definindo o toString para transformar os dados em string (jutamente com os dados da superclasse Pessoa)
    function toString() {
        return parent::toString() .
            "<br>Salário: R$". $this->salario . 
            "<br>Cargo: ". $this->cargo . 
            "<br>Especialização: " . $this->especializacao;
    }
}
?>
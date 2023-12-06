<?php
require_once 'Pessoa.class.php';

class Mecanico extends Pessoa {
    //private $id_mecanico;
    private $salario;
    private $cargo;
    private $especializacao;

    function __construct($nome = "", $cpf = "", $telefone = "", $endereco = "", $salario = "", $cargo = "", $especializacao = "") {
        parent::__construct($nome, $cpf, $telefone, $endereco);
        $this->salario = $salario;        
        $this->cargo = $cargo;        
        $this->especializacao = $especializacao;        
    }

    /*
    function getId() {
        return $this->id_mecanico;
    }
    function setId($id_mecanico) {
        return $this->id_mecanico = $id_mecanico;
    }
    */

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

    function toString() {
        return parent::toString() .
            "<br>Salário: R$". $this->salario . 
            "<br>Cargo: ". $this->cargo . 
            "<br>Especialização: " . $this->especializacao;
    }

    function toPrint() {
        echo $this->toString();
    }
}
?>
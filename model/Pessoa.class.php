<?php
class Pessoa {
    private $id_pessoa;
    private $nome;
    private $cpf;
    private $telefone;
    private $endereco;

    function __construct($nome = "", $cpf = "", $telefone = "", $endereco = "") {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone= $telefone;
        $this->endereco= $endereco;         
    }

    function getId() {
        return $this->id_pessoa;
    }
    function setId($id_pessoa) {
        return $this->id_pessoa = $id_pessoa;
    }

    function getNome() {
        return $this->nome;
    }
    function setNome($nome) {
        return $this->nome = $nome;
    }

    function getCpf() {
        return $this->cpf;
    }
    function setCpf($cpf) {
        return $this->cpf = $cpf;
    }

    function getTelefone() {
        return $this->telefone;
    }
    function setTelefone($telefone) {
        return $this->telefone = $telefone;
    }

    function getEndereco() {
        return $this->endereco;
    }
    function setEndereco($endereco) {
        return $this->endereco = $endereco;
    }

    function toString() {
        return "Nome: ". $this->nome . 
            "<br>CPF: ". $this->cpf . 
            "<br>Telefone: " . $this->telefone . 
            "<br>Endereço: " . $this->endereco;
    }
}
?>
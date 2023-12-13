<?php
// Criando a classe Pessoa
class Pessoa {
    // Definindo os atributos
    private $id_pessoa;
    private $nome;
    private $cpf;
    private $telefone;
    private $endereco;

    // Criando o construtor
    function __construct($nome = "", $cpf = "", $telefone = "", $endereco = "") {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone= $telefone;
        $this->endereco= $endereco;         
    }

    // Definindo os gets e sets
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

    // Definindo o toString para transformar os dados em string
    function toString() {
        return "Nome: ". $this->nome . 
            "<br>CPF: ". $this->cpf . 
            "<br>Telefone: " . $this->telefone . 
            "<br>Endereço: " . $this->endereco;
    }
}
?>
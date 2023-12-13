<?php
// Requerindo a classe Pessoa
require_once 'Pessoa.class.php';

// Criando a classe Cliente (subclasse de Pessoa)
class Cliente extends Pessoa {
    // Definindo os atributos
    private $formaPagamento;

    // Criando o construtor
    function __construct($nome = "", $cpf = "", $telefone = "", $endereco = "", $formaPagamento = "") {
        parent::__construct($nome, $cpf, $telefone, $endereco);
        $this->formaPagamento = $formaPagamento;
    }

    // Definindo os gets e sets
    function getPagamento() {
        return $this->formaPagamento;
    }
    function setPagamento($formaPagamento) {
        return $this->formaPagamento = $formaPagamento;
    }

    // Definindo o toString para transformar os dados em string (jutamente com os dados da superclasse Pessoa)
    function toString() {
        return parent::toString() .
            "<br>Pref. Pagamento: ". $this->formaPagamento;
    }
}
?>
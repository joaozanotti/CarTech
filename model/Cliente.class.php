<?php
require_once 'Pessoa.class.php';

class Cliente extends Pessoa {
    private $formaPagamento;

    function __construct($nome = "", $cpf = "", $telefone = "", $endereco = "", $formaPagamento = "") {
        parent::__construct($nome, $cpf, $telefone, $endereco);
        $this->formaPagamento = $formaPagamento;
    }

    function getPagamento() {
        return $this->formaPagamento;
    }
    function setPagamento($formaPagamento) {
        return $this->formaPagamento = $formaPagamento;
    }

    function toString() {
        return parent::toString() .
            "<br>Pref. Pagamento: ". $this->formaPagamento;
    }
}
?>
<?php
require_once 'Pessoa.class.php';

class Cliente extends Pessoa {
    //private $id_cliente;
    private $formaPagamento;

    function __construct($nome = "", $cpf = "", $telefone = "", $endereco = "", $formaPagamento = "") {
        parent::__construct($nome, $cpf, $telefone, $endereco);
        $this->formaPagamento = $formaPagamento;
    }
    /*
    function getId() {
        return $this->id_cliente;
    }
    function setId($id_cliente) {
        return $this->id_cliente = $id_cliente;
    }
    */

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

    function toPrint() {
        echo $this->toString();
    }
}
?>
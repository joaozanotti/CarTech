<?php
require_once 'Cliente.class.php';
require_once 'Mecanico.class.php';

class Servico {
    private $id_servico;
    private $tipo;
    private $valor;
    private $data_hora;
    private $tempo_duracao;
    public Cliente $cliente;
    public Mecanico $mecanico;

    function __construct($tipo = "", $valor = "", $data_hora = "", $tempo_duracao = "", $cliente = "", $mecanico = "") {
        $this->tipo = $tipo;
        $this->valor = $valor;
        $this->data_hora = $data_hora;
        $this->tempo_duracao = $tempo_duracao;
        $this->cliente = $cliente;
        $this->mecanico = $mecanico;
    }

    function getId() {
        return $this->id_servico;
    }
    function setId($id_servico) {
        return $this->id_servico = $id_servico;
    }

    function getTipo() {
        return $this->tipo;
    }
    function setTipo($tipo) {
        return $this->tipo = $tipo;
    }

    function getValor() {
        return $this->valor;
    }
    function setValor($valor) {
        return $this->valor = $valor;
    }

    function getData() {
        return $this->data_hora;
    }
    function setData($data_hora) {
        return $this->data_hora = $data_hora;
    }

    function getTempo() {
        return $this->tempo_duracao;
    }
    function setTempo($tempo_duracao) {
        return $this->tempo_duracao = $tempo_duracao;
    }

    function toString() {
        return "Tipo: ". $this->tipo .
        "<br>Valor: ". $this->valor .
        "<br>Data e hora: " . $this->data_hora .
        "<br>Tempo de duração: " . $this->tempo_duracao .
        "<br>Cliente: " . $this->cliente->toString() .
        "<br>Mecânico responsável: " . $this->mecanico->toString();
    }

    function toPrint() {
        echo $this->toString();
    }
}
?>
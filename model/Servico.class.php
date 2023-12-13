<?php
// Requerindo as classes Cliente e Mecanico
require_once 'Cliente.class.php';
require_once 'Mecanico.class.php';

// Criando a classe Servico (relação entre Cliente e Mecanico)
class Servico {
    // Definindo os atributos
    private $id_servico;
    private $tipo;
    private $valor;
    private $data_hora;
    private $tempo_duracao;
    private Cliente $cliente;
    private Mecanico $mecanico;

    // Criando o construtor
    function __construct($tipo = "", $valor = "", $data_hora = "", $tempo_duracao = "", $cliente, $mecanico) {
        $this->tipo = $tipo;
        $this->valor = $valor;
        // Definindo a data como a atual, usando um comando sql, se não houver dados
        if ($data_hora == "") {
            $this->data_hora = 'NOW()';
        // Definindo a data como ela mesma, se houver dados
        } else {
            $this->data_hora = $data_hora;
        }
        $this->tempo_duracao = $tempo_duracao;
        $this->cliente = $cliente;
        $this->mecanico = $mecanico;
    }

    // Definindo os gets e sets
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
    function setData($data_hora = "") {
        if ($data_hora == "") {
            return $this->data_hora = 'NOW()';
        } else {
            return $this->data_hora = $data_hora;
        }
    }

    function getTempo() {
        return $this->tempo_duracao;
    }
    function setTempo($tempo_duracao) {
        return $this->tempo_duracao = $tempo_duracao;
    }

    function getCliente() {
        return $this->cliente;
    }
    function setCliente($cliente) {
        return $this->cliente = $cliente;
    }

    function getMecanico() {
        return $this->mecanico;
    }
    function setMecanico($mecanico) {
        return $this->mecanico = $mecanico;
    }

    // Definindo o toString para transformar os dados em string (juntamente com os dados do Cliente e do Mecanico)
    function toString() {
        return "Tipo: ". $this->tipo .
        "<br>Valor: ". $this->valor .
        "<br>Data e hora: " . $this->data_hora .
        "<br>Tempo de duração: " . $this->tempo_duracao .
        "<br>Cliente:<br>" . $this->cliente->toString() .
        "<br>Mecânico responsável:<br>" . $this->mecanico->toString();
    }
}
?>
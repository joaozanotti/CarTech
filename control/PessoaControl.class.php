<?php

class PessoaControl {
    private $conexao;

    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function listarObj() {
        $sql = "SELECT * FROM pessoas";
        $result = $this->conexao->query($sql);
        $pessoas = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pessoas[] = $row;
            }
        }

        if (count($pessoas) != 0) {
            $vetPessoas = array();
            for ($i = 0; $i < count($pessoas); $i++) { 
                $vetPessoas[$i] = new Pessoa (
                    $pessoas[$i]['nome'], 
                    $pessoas[$i]['cpf'], 
                    $pessoas[$i]['telefone'], 
                    $pessoas[$i]['endereco']
                );
                $vetPessoas[$i]->setId($pessoas[$i]['id_pessoa']);
            }
            return $vetPessoas;
        }
        return null;
    }

    public function buscarPorCpf($cpf) {
        // Buscando dados da tabela de pessoas
        $sql = "SELECT * FROM pessoas WHERE cpf='$cpf'";
        $result = $this->conexao->query($sql);
        $dadosPessoa = "";

        if ($result->num_rows > 0) {
            $dadosPessoa = $result->fetch_assoc();
        } else {
            $dadosPessoa = "";
        }

        // Criando a pessoa com todos os dados
        if ($dadosPessoa != "") {
            $pessoa = new Cliente(
                $dadosPessoa['nome'], 
                $dadosPessoa['cpf'], 
                $dadosPessoa['telefone'], 
                $dadosPessoa['endereco'], 
            );
            $pessoa->setId($dadosPessoa['id_pessoa']);
            return $pessoa;
        }
        return null;
    }
}
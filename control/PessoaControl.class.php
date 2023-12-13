<?php

// Criando a classe PessoaControl (conexão de Pessoa com o banco)
class PessoaControl {
    // Definindo o atributo de conexão com o banco
    private $conexao;

    // Criando o construtor
    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    // Criando a function para resgatar os dados do banco, transformado-os em objetos
    public function listarObj() {
        // Buscando os dados das pessoas
        $sql = "SELECT * FROM pessoas";
        $result = $this->conexao->query($sql);
        $pessoas = array();

        // Armazenando os dados das pessoas baseados nos dados dos mecânicos
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pessoas[] = $row;
            }
        }

        // Percorrendo o vetor de pessoa, criando objetos e armazenando em outro vetor
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

    // Criando a function para buscar, pelo cpf, um dado no banco e transformar em objeto
    public function buscarPorCpf($cpf) {
        // Buscando dados da tabela de pessoas
        $sql = "SELECT * FROM pessoas WHERE cpf='$cpf'";
        $result = $this->conexao->query($sql);
        $dadosPessoa = "";

        // Armazenando os dados da pessoa
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
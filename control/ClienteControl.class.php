<?php

// Criando a classe ClienteControl (conexão de Cliente com o banco)
class ClienteControl {
    // Definindo o atributo de conexão com o banco
    private $conexao;

    // Criando o construtor
    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    // Criando a function para resgatar os dados do banco, transformado-os em objetos
    public function listarObj() {
        // Buscando os dados dos clientes
        $sql = "SELECT * FROM clientes";
        $result = $this->conexao->query($sql);
        $clientes = array();

        // Armazenando os dados dos clientes
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $clientes[] = $row;
            }
        }

        // Buscando os dados das pessoas
        $sql = "SELECT * FROM pessoas";
        $result = $this->conexao->query($sql);
        $pessoas = array();

        // Armazenando os dados das pessoas baseados nos dados dos clientes
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                foreach ($clientes as $cliente) {
                    if ($row['id_pessoa'] == $cliente['id_cliente']) {
                        $pessoas[] = $row;
                    }
                }
            }
        }

        // Percorrendo o vetor de clientes, criando objetos e armazenando em outro vetor
        if (count($clientes) != 0 && count($pessoas) != 0) {
            $clientesPessoas = array();
            for ($i = 0; $i < count($pessoas); $i++) { 
                $clientesPessoas[$i] = new Cliente(
                    $pessoas[$i]['nome'], 
                    $pessoas[$i]['cpf'], 
                    $pessoas[$i]['telefone'], 
                    $pessoas[$i]['endereco'], 
                    $clientes[$i]['formaPagamento']);
                $clientesPessoas[$i]->setId($pessoas[$i]['id_pessoa']);
            }
            return $clientesPessoas;
        }
        return null;
    }


    // Criando a function para atualizar os dados no banco
    public function atualizar($obj) {        
        if ($obj instanceof Cliente) {
            // Atualizando na tabela de pessoas
            $sql = "UPDATE pessoas SET nome='".$obj->getNome()."', cpf='".$obj->getCpf()."', telefone='".$obj->getTelefone()."', endereco='".$obj->getEndereco()."' WHERE id_pessoa='".$obj->getId()."'";
            $result = $this->conexao->query($sql);

            if ($result) {
                // Atualizando na tabela de clientes
                $sql = "UPDATE clientes SET formaPagamento='".$obj->getPagamento()."' WHERE id_cliente='".$obj->getId()."'";
                $result = $this->conexao->query($sql);
                return true;
            }
        }
        return false;
    }

    // Criando a function para deletar os dados no banco
    public function deletar($obj) {   
        if ($obj instanceof Cliente) {  
            // Deletando na tabela de clientes   
            $sql = "DELETE FROM clientes WHERE id_cliente='".$obj->getId()."'";
            $result = $this->conexao->query($sql);

            if ($result) {
                // Deletando na tabela de pessoas
                $sql = "DELETE FROM pessoas WHERE id_pessoa='".$obj->getId()."'";
                $result = $this->conexao->query($sql);
                return true;
            }
        }
        return false;
    }

    // Criando a function para cadastrar os dados no banco
    public function cadastrar($obj) {  
        if ($obj instanceof Cliente) {   
            // Inserindo na tabela de pessoas
            $sql = "INSERT INTO pessoas (nome, cpf, telefone, endereco) VALUES ('".$obj->getNome()."', '".$obj->getCpf()."', '".$obj->getTelefone()."', '" .$obj->getEndereco()."')";
            $result = $this->conexao->query($sql);

            if ($result) {
                // Buscando o id que acabou de ser adicionado
                $sql = "SELECT id_pessoa FROM pessoas WHERE cpf = '".$obj->getCpf()."'";
                $result = $this->conexao->query($sql);
                $lastAdd = $result->fetch_assoc();

                // Inserindo na tabela de clientes
                $sql = "INSERT INTO clientes (id_cliente, formaPagamento) VALUES ('".$lastAdd['id_pessoa']."', '".$obj->getPagamento()."')";
                $result = $this->conexao->query($sql);
                return true;
            }
        }
        return false;
    }

    // Criando a function para buscar, pelo id, um dado no banco e transformar em objeto
    public function buscarPorId($id) {
        // Buscando dados da tabela de pessoas
        $sql = "SELECT * FROM pessoas WHERE id_pessoa = $id";
        $result = $this->conexao->query($sql);
        $dadosPessoa = "";

        if ($result->num_rows > 0) {
            // Armazenando os dados da pessoa
            $dadosPessoa = $result->fetch_assoc();

            // Buscando dados da tabela de clientes
            $sql = "SELECT * FROM clientes WHERE id_cliente = $id";
            $result = $this->conexao->query($sql);
            $dadosCliente = "";

            // Armazenando os dados do cliente
            if ($result->num_rows > 0) {
                $dadosCliente = $result->fetch_assoc();
            } else {
                $dadosCliente = "";
            }
        } else {
            $dadosPessoa = "";
        }
        
        // Criando o cliente com todos os dados
        if ($dadosPessoa != "" && $dadosCliente != "") {
            $cliente = new Cliente(
                $dadosPessoa['nome'], 
                $dadosPessoa['cpf'], 
                $dadosPessoa['telefone'], 
                $dadosPessoa['endereco'], 
                $dadosCliente['formaPagamento']
            );
            $cliente->setId($dadosPessoa['id_pessoa']);
            return $cliente;
        }
        return null;
    }

    // Criando a function para buscar, pelo cpf, um dado no banco e transformar em objeto 
    public function buscarPorCpf($cpf) {
        // Buscando dados da tabela de pessoas
        $sql = "SELECT * FROM pessoas WHERE cpf='$cpf'";
        $result = $this->conexao->query($sql);
        $dadosPessoa = "";

        if ($result->num_rows > 0) {
            // Armazenando os dados da pessoa
            $dadosPessoa = $result->fetch_assoc();

            // Buscando dados da tabela de clientes
            $sql = "SELECT * FROM clientes WHERE id_cliente = ".$dadosPessoa['id_pessoa']."";
            $result = $this->conexao->query($sql);
            $dadosCliente = "";

            // Armazenando os dados do cliente
            if ($result->num_rows > 0) {
                $dadosCliente = $result->fetch_assoc();
            } else {
                $dadosCliente = "";
            }
        } else {
            $dadosPessoa = "";
        }

        // Criando o cliente com todos os dados
        if ($dadosPessoa != "" && $dadosCliente != "") {
            $cliente = new Cliente(
                $dadosPessoa['nome'], 
                $dadosPessoa['cpf'], 
                $dadosPessoa['telefone'], 
                $dadosPessoa['endereco'], 
                $dadosCliente['formaPagamento']
            );
            $cliente->setId($dadosPessoa['id_pessoa']);
            return $cliente;
        }
        return null;
    }
}

?>
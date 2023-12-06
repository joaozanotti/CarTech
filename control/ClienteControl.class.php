<?php

class ClienteControl {
    private $conexao;
    //private $cliente;
    //private $id;

    function __construct($conexao) {
        $this->conexao = $conexao;
        //$cliente = new Cliente();
    }

    /*
    public function listar() {
        $sql = "SELECT * FROM clientes";
        $result = $this->conexao->query($sql);

        $clientes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $clientes[] = $row;
            }
        }

        return $clientes;
    }
    */

    public function listarObj() {
        $sql = "SELECT * FROM clientes";
        $result = $this->conexao->query($sql);
        $clientes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $clientes[] = $row;
            }
        }

        $sql = "SELECT * FROM pessoas";
        $result = $this->conexao->query($sql);
        $pessoas = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                foreach ($clientes as $cliente) {
                    if ($row['id_pessoa'] == $cliente['id_cliente']) {
                        $pessoas[] = $row;
                    }
                }
            }
        }

        if (count($clientes) != 0 && count($pessoas) != 0) {
            $clientesPessoas = array();
            for ($i = 0; $i < count($pessoas); $i++) { 
                $clientesPessoas[$i] = new Cliente($pessoas[$i]['nome'], $pessoas[$i]['cpf'], $pessoas[$i]['telefone'], $pessoas[$i]['endereco'], $clientes[$i]['formaPagamento']);
                $clientesPessoas[$i]->setId($pessoas[$i]['id_pessoa']);
            }
            return $clientesPessoas;
        }
        return null;
    }


    public function atualizar($obj) {        
        if ($obj instanceof Cliente) {
            $sql = "UPDATE pessoas SET nome='".$obj->getNome()."', cpf='".$obj->getCpf()."', telefone='".$obj->getTelefone()."', endereco='".$obj->getEndereco()."' WHERE id_pessoa='".$obj->getId()."'";
            $result = $this->conexao->query($sql);

            if ($result) {
                $sql = "UPDATE clientes SET formaPagamento='".$obj->getPagamento()."' WHERE id_cliente='".$obj->getId()."'";
                $result = $this->conexao->query($sql);
                return true;
            }
        }
        return false;
    }

    public function deletar($obj) {   
        if ($obj instanceof Cliente) {     
            $sql = "DELETE FROM clientes WHERE id_cliente='".$obj->getId()."'";
            $result = $this->conexao->query($sql);

            if ($result) {
                $sql = "DELETE FROM pessoas WHERE id_pessoa='".$obj->getId()."'";
                $result = $this->conexao->query($sql);
                return true;
            }
        }
        return false;
    }

    public function cadastrar($obj) {  
        if ($obj instanceof Cliente) {      
            $sql = "INSERT INTO pessoas (nome, cpf, telefone, endereco) VALUES ('".$obj->getNome()."', '".$obj->getCpf()."', '".$obj->getTelefone()."', '" .$obj->getEndereco()."')";
            $result = $this->conexao->query($sql);

            if ($result) {
                $sql = "SELECT id_pessoa FROM pessoas WHERE cpf = '".$obj->getCpf()."'";
                $result = $this->conexao->query($sql);
                $lastAdd = $result->fetch_assoc();

                $sql = "INSERT INTO clientes (id_cliente, formaPagamento) VALUES ('".$lastAdd['id_pessoa']."', '".$obj->getPagamento()."')";
                $result = $this->conexao->query($sql);
                return true;
            }
        }
        return false;
    }

    public function buscarPorId($id) {
        // Buscando dados da tabela de pessoas
        $sql = "SELECT * FROM pessoas WHERE id_pessoa = $id";
        $result = $this->conexao->query($sql);
        $dadosPessoa = "";

        if ($result->num_rows > 0) {
            $dadosPessoa = $result->fetch_assoc();
        }

        // Buscando dados da tabela de clientes
        $sql = "SELECT * FROM clientes WHERE id_cliente = $id";
        $result = $this->conexao->query($sql);
        $dadosCliente = "";

        if ($result->num_rows > 0) {
            $dadosCliente = $result->fetch_assoc();
        }

        // Criando o cliente com todos os dados
        if ($dadosPessoa != "" && $dadosCliente != "") {
            $cliente = new Cliente($dadosPessoa['nome'], $dadosPessoa['cpf'], $dadosPessoa['telefone'], $dadosPessoa['endereco'], $dadosCliente['formaPagamento']);
            $cliente->setId($dadosPessoa['id_pessoa']);
            return $cliente;
        }
        return null;
    }
}

?>
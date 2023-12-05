<?php

class ClienteControl {
    private $conexao;
    private $cliente;

    //private $id;

    function __construct($conexao) {
        $this->conexao = $conexao;
        $cliente = new Cliente();
    }

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

    public function listarObj() {
        $sql = "SELECT * FROM clientes";
        $result = $this->conexao->query($sql);
        $clientes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id_cliente'];
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

        $clientesPessoas = array();
        for ($i = 0; $i < array_length($pessoas); $i++) { 
            $clientesPessoas[] = new Cliente($pessoas[$i]['nome']);
        }
    }


    public function atualizar($obj) {        

        $sql = "UPDATE usuarios SET nome='".$obj->getNome()."', email='".$obj->getEmail()."', senha='".$obj->getSenha()."' WHERE id='".$obj->getId()."'";

        $result = $this->conexao->query($sql);

        if ($result) {
            echo "Objeto atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar o objeto.";
        }

        //print_r($result);


    }

    public function deletar($obj) {        
        $sql = "DELETE FROM usuarios WHERE id='".$obj->getId()."'";

       // echo $sql;

        $result = $this->conexao->query($sql);

        if ($result) {
            echo "Objeto excluído com sucesso!";
        } else {
            echo "Erro ao excluir o objeto.";
        }

        //print_r($result);


    }

    public function cadastrar($obj) {        
        $sql = "INSERT INTO usuarios (nome, email, senha)
        VALUES ('".$obj->getNome()."', '".$obj->getEmail()."', '".$obj->getSenha()."')";

        $result = $this->conexao->query($sql);

        if ($result) {
            echo "Objeto cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar objeto: ";
        }

        //print_r($result);


    }

    public function buscarPorId($id) {
        // Buscando dados da tabela de pessoas
        $sql = "SELECT * FROM pessoas WHERE id_pessoa = $id";
        $result = $this->conexao->query($sql);
        $dadosPessoa = "";

        if ($result->num_rows > 0) {
            $dadosPessoa = $result->fetch_assoc();
        } else {
            echo "Nao encontrou o id: ". $id;
        }

        // Buscando dados da tabela de clientes
        $sql = "SELECT * FROM clientes WHERE id_cliente = $id";
        $result = $this->conexao->query($sql);
        $dadosCliente = "";

        if ($result->num_rows > 0) {
            $dadosCliente = $result->fetch_assoc();
        } else {
            echo "Nao encontrou o id: ". $id;
        }

        // Criando o cliente com todos os dados
        if ($dadosPessoa != "" && $dadosCliente != "") {
            $cliente = new Cliente($dadosPessoa['nome'], $dadosPessoa['cpf'], $dadosPessoa['telefone'], $dadosPessoa['endereco'], $dadosCliente['formaPagamento']);
            return $cliente;
        }
        return null;
    }
}

?>
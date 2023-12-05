<?php

class MecanicoControl {
    private $conexao;
    private $mecanico;

    //private $id;

    function __construct($conexao) {
        $this->conexao = $conexao;
        $mecanico = new Mecanico();
    }

    public function listar() {
        $sql = "SELECT * FROM mecanicos";
        $result = $this->conexao->query($sql);

        $mecanicos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mecanicos[] = $row;
            }
        }

        return $mecanicos;
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

        // Buscando dados da tabela de mecânicos
        $sql = "SELECT * FROM mecanicos WHERE id_mecanico = $id";
        $result = $this->conexao->query($sql);
        $dadosMecanico = "";

        if ($result->num_rows > 0) {
            $dadosMecanico = $result->fetch_assoc();
        } else {
            echo "Nao encontrou o id: ". $id;
        }

        // Criando o mecânico com todos os dados
        if ($dadosPessoa != "" && $dadosMecanico != "") {
            $mecanico = new Mecanico($dadosPessoa['nome'], $dadosPessoa['cpf'], $dadosPessoa['telefone'], $dadosPessoa['endereco'], $dadosMecanico['salario'], $dadosMecanico['cargo'], $dadosMecanico['especializacao']);
            return $mecanico;
        }
        return null;
    }
}

?>
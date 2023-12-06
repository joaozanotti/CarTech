<?php

class MecanicoControl {
    private $conexao;
    //private $mecanico;

    //private $id;

    function __construct($conexao) {
        $this->conexao = $conexao;
        //$mecanico = new Mecanico();
    }

    /*
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
    */

    public function listarObj() {
        $sql = "SELECT * FROM mecanicos";
        $result = $this->conexao->query($sql);
        $mecanicos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mecanicos[] = $row;
            }
        }

        $sql = "SELECT * FROM pessoas";
        $result = $this->conexao->query($sql);
        $pessoas = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                foreach ($mecanicos as $mecanico) {
                    if ($row['id_pessoa'] == $mecanico['id_mecanico']) {
                        $pessoas[] = $row;
                    }
                }
            }
        }

        if (count($mecanicos) != 0 && count($pessoas) != 0) {
            $mecanicosPessoas = array();
            for ($i = 0; $i < count($pessoas); $i++) {
                $mecanicosPessoas[$i] = new Mecanico($pessoas[$i]['nome'], $pessoas[$i]['cpf'], $pessoas[$i]['telefone'], $pessoas[$i]['endereco'], $mecanicos[$i]['salario'], $mecanicos[$i]['cargo'], $mecanicos[$i]['especializacao']);
                $mecanicosPessoas[$i]->setId($pessoas[$i]['id_pessoa']);
            }
    
            return $mecanicosPessoas;
        }
        return null;
    }

    public function atualizar($obj) {        
        if ($obj instanceof Mecanico) {
            $sql = "UPDATE pessoas SET nome='".$obj->getNome()."', cpf='".$obj->getCpf()."', telefone='".$obj->getTelefone()."', endereco='".$obj->getEndereco()."' WHERE id_pessoa='".$obj->getId()."'";
            $result = $this->conexao->query($sql);

            if ($result) {
                $sql = "UPDATE mecanicos SET salario='".$obj->getSalario()."', cargo='".$obj->getCargo()."', especializacao='".$obj->getEspecializacao()."' WHERE id_mecanico='".$obj->getId()."'";
                $result = $this->conexao->query($sql);
                return true;   
            }
        }
        return false;
    }

    public function deletar($obj) { 
        if ($obj instanceof Mecanico) {
            $sql = "DELETE FROM mecanicos WHERE id_mecanico='".$obj->getId()."'";
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
        if ($obj instanceof Mecanico) {      
            $sql = "INSERT INTO pessoas (nome, cpf, telefone, endereco) VALUES ('".$obj->getNome()."', '".$obj->getCpf()."', '".$obj->getTelefone()."', '" .$obj->getEndereco()."')";
            $result = $this->conexao->query($sql);

            if ($result) {
                $sql = "SELECT id_pessoa FROM pessoas WHERE cpf = '".$obj->getCpf()."'";
                $result = $this->conexao->query($sql);
                $lastAdd = $result->fetch_assoc();

                $sql = "INSERT INTO mecanicos (id_mecanico, salario, cargo, especializacao) VALUES ('".$lastAdd['id_pessoa']."', '".$obj->getSalario()."', '".$obj->getCargo()."', '" .$obj->getEspecializacao()."')";
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

        // Buscando dados da tabela de mecânicos
        $sql = "SELECT * FROM mecanicos WHERE id_mecanico = $id";
        $result = $this->conexao->query($sql);
        $dadosMecanico = "";

        if ($result->num_rows > 0) {
            $dadosMecanico = $result->fetch_assoc();
        }

        // Criando o mecânico com todos os dados
        if ($dadosPessoa != "" && $dadosMecanico != "") {
            $mecanico = new Mecanico($dadosPessoa['nome'], $dadosPessoa['cpf'], $dadosPessoa['telefone'], $dadosPessoa['endereco'], $dadosMecanico['salario'], $dadosMecanico['cargo'], $dadosMecanico['especializacao']);
            $mecanico->setId($dadosPessoa['id_pessoa']);
            return $mecanico;
        }
        return null;
    }
}

?>
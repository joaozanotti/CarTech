<?php

// Criando a classe MecanicoControl (conexão de Mecanico com o banco)
class MecanicoControl {
    // Definindo o atributo de conexão com o banco
    private $conexao;

    // Criando o construtor
    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    // Criando a function para resgatar os dados do banco, transformado-os em objetos
    public function listarObj() {
        // Buscando os dados dos mecânicos
        $sql = "SELECT * FROM mecanicos";
        $result = $this->conexao->query($sql);
        $mecanicos = array();

        // Armazenando os dados dos mecânicos
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mecanicos[] = $row;
            }
        }

        // Buscando os dados das pessoas
        $sql = "SELECT * FROM pessoas";
        $result = $this->conexao->query($sql);
        $pessoas = array();

        // Armazenando os dados das pessoas baseados nos dados dos mecânicos
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                foreach ($mecanicos as $mecanico) {
                    if ($row['id_pessoa'] == $mecanico['id_mecanico']) {
                        $pessoas[] = $row;
                    }
                }
            }
        }

        // Percorrendo o vetor de mecânicos, criando objetos e armazenando em outro vetor
        if (count($mecanicos) != 0 && count($pessoas) != 0) {
            $mecanicosPessoas = array();
            for ($i = 0; $i < count($pessoas); $i++) {
                $mecanicosPessoas[$i] = new Mecanico(
                    $pessoas[$i]['nome'], 
                    $pessoas[$i]['cpf'], 
                    $pessoas[$i]['telefone'], 
                    $pessoas[$i]['endereco'], 
                    $mecanicos[$i]['salario'], 
                    $mecanicos[$i]['cargo'], 
                    $mecanicos[$i]['especializacao']
                );
                $mecanicosPessoas[$i]->setId($pessoas[$i]['id_pessoa']);
            }
    
            return $mecanicosPessoas;
        }
        return null;
    }

    // Criando a function para atualizar os dados no banco
    public function atualizar($obj) {        
        if ($obj instanceof Mecanico) {
            // Atualizando na tabela de pessoas
            $sql = "UPDATE pessoas SET nome='".$obj->getNome()."', cpf='".$obj->getCpf()."', telefone='".$obj->getTelefone()."', endereco='".$obj->getEndereco()."' WHERE id_pessoa='".$obj->getId()."'";
            $result = $this->conexao->query($sql);

            if ($result) {
                // Atualizando na tabela de mecânicos
                $sql = "UPDATE mecanicos SET salario='".$obj->getSalario()."', cargo='".$obj->getCargo()."', especializacao='".$obj->getEspecializacao()."' WHERE id_mecanico='".$obj->getId()."'";
                $result = $this->conexao->query($sql);
                return true;   
            }
        }
        return false;
    }

    // Criando a function para deletar os dados no banco
    public function deletar($obj) { 
        if ($obj instanceof Mecanico) {
            // Deletando na tabela de mecânicos
            $sql = "DELETE FROM mecanicos WHERE id_mecanico='".$obj->getId()."'";
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
        if ($obj instanceof Mecanico) {
            // Inserindo na tabela de pessoas  
            $sql = "INSERT INTO pessoas (nome, cpf, telefone, endereco) VALUES ('".$obj->getNome()."', '".$obj->getCpf()."', '".$obj->getTelefone()."', '" .$obj->getEndereco()."')";
            $result = $this->conexao->query($sql);

            if ($result) {
                // Buscando o id que acabou de ser adicionado
                $sql = "SELECT id_pessoa FROM pessoas WHERE cpf = '".$obj->getCpf()."'";
                $result = $this->conexao->query($sql);
                $lastAdd = $result->fetch_assoc();

                // Inserindo na tabela de clientes
                $sql = "INSERT INTO mecanicos (id_mecanico, salario, cargo, especializacao) VALUES ('".$lastAdd['id_pessoa']."', '".$obj->getSalario()."', '".$obj->getCargo()."', '" .$obj->getEspecializacao()."')";
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

            // Buscando dados da tabela de mecânicos
            $sql = "SELECT * FROM mecanicos WHERE id_mecanico = $id";
            $result = $this->conexao->query($sql);
            $dadosMecanico = "";

            // Armazenando os dados do mecânicos
            if ($result->num_rows > 0) {
                $dadosMecanico = $result->fetch_assoc();
            } else {
                $dadosMecanico = "";
            }
        } else {
            $dadosPessoa = "";
        }

        // Criando o mecânico com todos os dados
        if ($dadosPessoa != "" && $dadosMecanico != "") {
            $mecanico = new Mecanico(
                $dadosPessoa['nome'], 
                $dadosPessoa['cpf'], 
                $dadosPessoa['telefone'], 
                $dadosPessoa['endereco'], 
                $dadosMecanico['salario'], 
                $dadosMecanico['cargo'], 
                $dadosMecanico['especializacao']
            );
            $mecanico->setId($dadosPessoa['id_pessoa']);
            return $mecanico;
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

            // Buscando dados da tabela de mecânicos
            $sql = "SELECT * FROM mecanicos WHERE id_mecanico = ".$dadosPessoa['id_pessoa']."";
            $result = $this->conexao->query($sql);
            $dadosMecanico = "";
    
            // Armazenando os dados do mecânicos
            if ($result->num_rows > 0) {
                $dadosMecanico = $result->fetch_assoc();
            } else {
                $dadosMecanico = "";
            }
        } else {
            $dadosPessoa = "";
        }

        // Criando o mecânico com todos os dados
        if ($dadosPessoa != "" && $dadosMecanico != "") {
            $mecanico = new Mecanico(
                $dadosPessoa['nome'], 
                $dadosPessoa['cpf'], 
                $dadosPessoa['telefone'], 
                $dadosPessoa['endereco'], 
                $dadosMecanico['salario'], 
                $dadosMecanico['cargo'], 
                $dadosMecanico['especializacao']
            );
            $mecanico->setId($dadosPessoa['id_pessoa']);
            return $mecanico;
        }
        return null;
    }
}

?>
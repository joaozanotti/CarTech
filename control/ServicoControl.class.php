<?php
require_once 'ClienteControl.class.php';
require_once 'MecanicoControl.class.php';

class ServicoControl {
    private $conexao;
    private ClienteControl $clienteControl;
    private MecanicoControl $mecanicoControl;

    function __construct($conexao, $clienteControl, $mecanicoControl) {
        $this->conexao = $conexao;
        $this->clienteControl = $clienteControl;
        $this->mecanicoControl = $mecanicoControl;
    }

    public function listarObj() {
        $sql = "SELECT * FROM servicos";
        $result = $this->conexao->query($sql);
        $servicos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $servicos[] = $row;
            }
        }
        
        if (count($servicos) != 0) {
            $vetServicos = array();
            for ($i = 0; $i < count($servicos); $i++) { 
                $vetServicos[$i] = new Servico(
                    $servicos[$i]['tipo'], 
                    $servicos[$i]['valor'], 
                    $servicos[$i]['data_hora'], 
                    $servicos[$i]['tempo_duracao'], 
                    $this->clienteControl->buscarPorId($servicos[$i]['id_cliente']), 
                    $this->mecanicoControl->buscarPorId($servicos[$i]['id_mecanico'])
                );
                $vetServicos[$i]->setId($servicos[$i]['id_servico']);
            }
            return $vetServicos;
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
        $sql = "SELECT * FROM servicos WHERE id_servico = $id";
        $result = $this->conexao->query($sql);
        $dadosServico = "";

        if ($result->num_rows > 0) {
            $dadosServico = $result->fetch_assoc();
        }

        // Criando o cliente com todos os dados
        if ($dadosServico != "") {
            $servico = new Servico(
                $dadosServico['tipo'], 
                $dadosServico['valor'], 
                $dadosServico['data_hora'], 
                $dadosServico['tempo_duracao'], 
                $this->clienteControl->buscarPorId($dadosServico['id_cliente']), 
                $this->mecanicoControl->buscarPorId($dadosServico['id_mecanico'])
            );
            $servico->setId($dadosServico['id_servico']);
            return $servico;
        }
        return null;
    }
}

?>
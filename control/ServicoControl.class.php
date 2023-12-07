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
        if ($obj instanceof Servico) {
            $sql = "UPDATE servicos SET tipo='".$obj->getTipo()."', valor='".$obj->getValor()."', data_hora=".$obj->getData().", tempo_duracao='".$obj->getTempo()."', id_cliente='".$obj->getCliente()->getId()."', id_mecanico='".$obj->getMecanico()->getId()."' WHERE id_servico='".$obj->getId()."'";
            $result = $this->conexao->query($sql);
            if ($result) {
                return true;
            }
        }
        return false;
    }

    public function deletar($obj) {   
        if ($obj instanceof Servico) {     
            $sql = "DELETE FROM servicos WHERE id_servico='".$obj->getId()."'";
            $result = $this->conexao->query($sql);
            if ($result) {
                return true;
            }
        }
        return false;
    }

    public function cadastrar($obj) {
        if ($obj instanceof Servico) {
            $sql = "INSERT INTO servicos (tipo, valor, data_hora, tempo_duracao, id_cliente, id_mecanico) VALUES ('".$obj->getTipo()."', '".$obj->getValor()."', ".$obj->getData().", '".$obj->getTempo()."', '".$obj->getCliente()->getId()."', '".$obj->getMecanico()->getId()."')";
            $result = $this->conexao->query($sql);

            if ($result) {
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
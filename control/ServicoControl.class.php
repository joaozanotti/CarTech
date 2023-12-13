<?php
// Requerindo as classes ClienteControl e MecanicoControl
require_once 'ClienteControl.class.php';
require_once 'MecanicoControl.class.php';

// Criando a classe ServicoControl (conexão de Servico com o banco)
class ServicoControl {
    // Definindo o atributo de conexão com o banco e os atributos da relação
    private $conexao;
    private ClienteControl $clienteControl;
    private MecanicoControl $mecanicoControl;

    // Criando o construtor
    function __construct($conexao, $clienteControl, $mecanicoControl) {
        $this->conexao = $conexao;
        $this->clienteControl = $clienteControl;
        $this->mecanicoControl = $mecanicoControl;
    }

    // Criando a function para resgatar os dados do banco, transformado-os em objetos
    public function listarObj() {
        // Buscando os dados dos serviços
        $sql = "SELECT * FROM servicos";
        $result = $this->conexao->query($sql);
        $servicos = array();

        // Armazenando os dados dos serviços
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $servicos[] = $row;
            }
        }
        
        // Percorrendo o vetor de serviços, criando objetos e armazenando em outro vetor
        if (count($servicos) != 0) {
            $vetServicos = array();
            for ($i = 0; $i < count($servicos); $i++) { 
                $vetServicos[$i] = new Servico(
                    $servicos[$i]['tipo'],
                    $servicos[$i]['valor'], 
                    $servicos[$i]['data_hora'], 
                    $servicos[$i]['tempo_duracao'], 
                    // Usando o control de cliente para retornar o objeto do cliente
                    $this->clienteControl->buscarPorId($servicos[$i]['id_cliente']), 
                    // Usando o control de mecânico para retornar o objeto do mecânico
                    $this->mecanicoControl->buscarPorId($servicos[$i]['id_mecanico'])
                );
                $vetServicos[$i]->setId($servicos[$i]['id_servico']);
            }
            return $vetServicos;
        }
        return null;
    }

    // Criando a function para atualizar os dados no banco
    public function atualizar($obj) {        
        if ($obj instanceof Servico) {
            // Atualizando na tabela de serviços
            $sql = "UPDATE servicos SET tipo='".$obj->getTipo()."', valor='".$obj->getValor()."', data_hora='".$obj->getData()."', tempo_duracao='".$obj->getTempo()."', id_cliente='".$obj->getCliente()->getId()."', id_mecanico='".$obj->getMecanico()->getId()."' WHERE id_servico='".$obj->getId()."'";
            $result = $this->conexao->query($sql);
            if ($result) {
                return true;
            }
        }
        return false;
    }

    // Criando a function para deletar os dados no banco
    public function deletar($obj) {   
        if ($obj instanceof Servico) {    
            // Deletando na tabela de serviços
            $sql = "DELETE FROM servicos WHERE id_servico='".$obj->getId()."'";
            $result = $this->conexao->query($sql);
            if ($result) {
                return true;
            }
        }
        return false;
    }

    // Criando a function para cadastrar os dados no banco
    public function cadastrar($obj) {
        if ($obj instanceof Servico) {
            // Inserindo na tabela de serviços
            $sql = "INSERT INTO servicos (tipo, valor, data_hora, tempo_duracao, id_cliente, id_mecanico) VALUES ('".$obj->getTipo()."', '".$obj->getValor()."', ".$obj->getData().", '".$obj->getTempo()."', '".$obj->getCliente()->getId()."', '".$obj->getMecanico()->getId()."')";
            $result = $this->conexao->query($sql);

            if ($result) {
                return true;
            }
        }
        return false;
    }

    // Criando a function para buscar, pelo id, um dado no banco e transformar em objeto
    public function buscarPorId($id) {
        // Buscando dados da tabela de serviços
        $sql = "SELECT * FROM servicos WHERE id_servico = $id";
        $result = $this->conexao->query($sql);
        $dadosServico = "";

        // Armazenando os dados do serviço
        if ($result->num_rows > 0) {
            $dadosServico = $result->fetch_assoc();
        }

        // Criando o serviço com todos os dados
        if ($dadosServico != "") {
            $servico = new Servico(
                $dadosServico['tipo'], 
                $dadosServico['valor'], 
                $dadosServico['data_hora'], 
                $dadosServico['tempo_duracao'], 
                // Usando o control de cliente para retornar o objeto do cliente
                $this->clienteControl->buscarPorId($dadosServico['id_cliente']), 
                // Usando o control de mecânico para retornar o objeto do mecânico
                $this->mecanicoControl->buscarPorId($dadosServico['id_mecanico'])
            );
            $servico->setId($dadosServico['id_servico']);
            return $servico;
        }
        return null;
    }
}

?>
<?php
// Requerindo as funções de estruturação do html e as classes de control
require_once '../../control/public.php';
require_once '../../control/funcoes.php';

// Recebendo as mensagens de resultado pelo GET
$msgExcluir = @$_GET['resultExcluir'];
$msgEditar = @$_GET['resultEditar'];

// Criando o header
echo criaHeader("Serviços");
?>

<!-- Criando o main -->
<main class="d-flex flex-column align-items-center justify-content-center flex-grow-1 my-4">
   <!-- Listando os serviços que estão cadastrados -->
   <h2 class="mb-4">Listagem de serviços</h2>
   <?php
      // Buscando os dados de todos os serviços
      $vetServicos = $servicoControl->listarObj();
   
      // Verificando se existem serviços cadastrados
      if ($vetServicos != null) {
         // Exibindo os dados dos serviços
         echo '<table class="table table-bordered table-striped table-hover text-center align-middle" style="width: 90%;">
                  <thead class="table-dark align-middle">
                     <tr>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Data e Hora</th>
                        <th>Tempo de Duração</th>
                        <th>Cliente Atendido</th>
                        <th>Mecânico Responsável</th>
                        <th>Ação</th>
                     </tr>
                  </thead>
                  <tbody>';

            foreach ($vetServicos as $servico) {
               // Transformando o dado da data para melhorar a visualização
               $dataHora = date('d/m/Y H:i:s', strtotime($servico->getData()));

               // Criando as linhas e enviando uma url e um id pelo link para selecionar a funcionalidade no outro arquivo
               echo '<tr>
                        <td>'.$servico->getTipo().'</td>
                        <td>R$'.$servico->getValor().'</td>
                        <td>'.$dataHora.'</td>
                        <td>'.$servico->getTempo().'</td>
                        <td>'.$servico->getCliente()->getNome().'</td>
                        <td>'.$servico->getMecanico()->getNome().'</td>
                        <td>
                           <a href="../localizar.php?url=servico&id='.$servico->getId().'" class="btn btn-primary">Editar</a>
                           <a href="../excluir.php?url=servico&id='.$servico->getId().'" class="btn btn-danger">Excluir</a>
                        </td>
                     </tr>';
            }
            
            echo '</tbody>
               </table>';

      } else {
         echo '<p>Nenhum serviço encontrado.</p>';
      }

      // Exibindo as mensagens de resultado
      if ($msgExcluir == "erroPessoa") {
         echo '<p class="form-error px-3">Erro! Este serviço não existe.</p>';
      } else if ($msgExcluir == "sucesso") {
         echo '<p class="form-success px-3">Serviço excluído com sucesso!</p>';
      } else if ($msgEditar == "sucesso") {
         echo '<p class="form-success px-3">Serviço editado com sucesso!</p>';
      }
   ?>
</main>

<?php
// Criando o footer
echo criaFooter();
?>
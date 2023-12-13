<?php
// Requerindo as funções de estruturação do html e as classes de control
require_once '../../control/public.php';
require_once '../../control/funcoes.php';

// Recebendo as mensagens de resultado pelo GET
$msgExcluir = @$_GET['resultExcluir'];
$msgEditar = @$_GET['resultEditar'];

// Criando o header
echo criaHeader("Mecânicos");
?>

<!-- Criando o main -->
<main class="d-flex flex-column align-items-center justify-content-center flex-grow-1 my-4">
   <!-- Listando os mecânicos que estão cadastrados -->
   <h2 class="mb-4">Listagem de mecânicos</h2>
   <?php
      // Buscando os dados de todos os mecânicos
      $vetMecanicos = $mecanicoControl->listarObj();

      // Verificando se existem mecânicos cadastrados
      if ($vetMecanicos != null) {
         // Exibindo os dados dos mecânicos
         echo '<table class="table table-bordered table-striped table-hover text-center align-middle" style="width: 90%;">
                  <thead class="table-dark align-middle">
                     <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Salário</th>
                        <th>Cargo</th>
                        <th>Especialização</th>
                        <th>Ação</th>
                     </tr>
                  </thead>
                  <tbody>';
            
            foreach ($vetMecanicos as $mecanico) {
               // Criando as linhas e enviando uma url e um id pelo link para selecionar a funcionalidade no outro arquivo 
               echo '<tr>
                        <td>'.$mecanico->getNome().'</td>
                        <td>'.$mecanico->getCpf().'</td>
                        <td>'.$mecanico->getTelefone().'</td>
                        <td>'.$mecanico->getEndereco().'</td>
                        <td>R$'.$mecanico->getSalario().'</td>
                        <td>'.$mecanico->getCargo().'</td>
                        <td>'.$mecanico->getEspecializacao().'</td>
                        <td>
                           <a href="../localizar.php?url=mecanico&id='.$mecanico->getId().'" class="btn btn-primary">Editar</a>
                           <a href="../excluir.php?url=mecanico&id='.$mecanico->getId().'" class="btn btn-danger">Excluir</a>
                        </td>
                     </tr>';
            }

            echo '</tbody>
               </table>';

      } else {
         echo '<p>Nenhum mecânico encontrado.</p>';
      }

      // Exibindo as mensagens de resultado
      if ($msgExcluir == "erroInfo") {
         echo '<p class="form-error px-3">Erro! Este mecânico está cadastrado em algum serviço.</p>';
      } else if ($msgExcluir == "erroPessoa") {
         echo '<p class="form-error px-3">Erro! Este mecânico não existe.</p>';
      } else if ($msgExcluir == "sucesso") {
         echo '<p class="form-success px-3">Mecânico excluído com sucesso!</p>';
      } else if ($msgEditar == "sucesso") {
         echo '<p class="form-success px-3">Mecânico editado com sucesso!</p>';
      }
   ?>
</main>

<?php
// Criando o footer
echo criaFooter();
?>
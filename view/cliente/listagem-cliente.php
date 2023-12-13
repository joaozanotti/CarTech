<?php
// Requerindo as funções de estruturação do html e as classes de control
require_once '../../control/public.php';
require_once '../../control/funcoes.php';

// Recebendo as mensagens de resultado pelo GET
$msgExcluir = @$_GET['resultExcluir'];
$msgEditar = @$_GET['resultEditar'];

// Criando o header
echo criaHeader("Clientes");
?>

<!-- Criando o main -->
<main class="d-flex flex-column align-items-center justify-content-center flex-grow-1 my-4">
   <!-- Listando os clientes que estão cadastrados -->
   <h2 class="mb-4">Listagem de clientes</h2>
   <?php
      // Buscando os dados de todos os clientes
      $vetClientes = $clienteControl->listarObj();
   
      // Verificando se existem clientes cadastrados
      if ($vetClientes != null) {
         // Exibindo os dados dos clientes
         echo '<table class="table table-bordered table-striped table-hover text-center align-middle" style="width: 90%;">
                  <thead class="table-dark align-middle">
                     <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Pref. Pagamento</th>
                        <th>Ação</th>
                     </tr>
                  </thead>
                  <tbody>';

            $vetClientes = $clienteControl->listarObj();
            foreach ($vetClientes as $cliente) {
               // Criando as linhas e enviando uma url e um id pelo link para selecionar a funcionalidade no outro arquivo
               echo '<tr>
                        <td>'.$cliente->getNome().'</td>
                        <td>'.$cliente->getCpf().'</td>
                        <td>'.$cliente->getTelefone().'</td>
                        <td>'.$cliente->getEndereco().'</td>
                        <td>'.$cliente->getPagamento().'</td>
                        <td>
                           <a href="../localizar.php?url=cliente&id='.$cliente->getId().'" class="btn btn-primary">Editar</a>
                           <a href="../excluir.php?url=cliente&id='.$cliente->getId().'" class="btn btn-danger">Excluir</a>
                        </td>
                     </tr>';
            }
            echo '</tbody>
               </table>';

      } else {
         echo '<p>Nenhum cliente encontrado.</p>';
      }
         
      // Exibindo as mensagens de resultado
      if ($msgExcluir == "erroInfo") {
         echo '<p class="form-error px-3">Erro! Este cliente está cadastrado em algum serviço.</p>';
      } else if ($msgExcluir == "erroPessoa") {
         echo '<p class="form-error px-3">Erro! Este cliente não existe.</p>';
      } else if ($msgExcluir == "sucesso") {
         echo '<p class="form-success px-3">Cliente excluído com sucesso!</p>';
      } else if ($msgEditar == "sucesso") {
         echo '<p class="form-success px-3">Cliente editado com sucesso!</p>';
      }
   ?>
</main>

<?php
// Criando o footer
echo criaFooter();
?>
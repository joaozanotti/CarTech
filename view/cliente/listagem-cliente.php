<?php
require_once '../../control/public.php';
require_once '../../control/funcoes.php';
$msgExcluir = @$_GET['resultExcluir'];
$msgEditar = @$_GET['resultEditar'];

echo criaHeader("Clientes");
?>
<main class="d-flex flex-column align-items-center justify-content-center flex-grow-1 my-4">
   <h2 class="mb-4">Listagem de clientes</h2>
   <table class="table table-bordered table-striped table-hover text-center align-middle" style="width: 90%;">
      <thead class="table-dark">
         <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Pref. Pagamento</th>
            <th>Ação</th>
         </tr>
      </thead>
      <tbody>
         <?php
            $vetClientes = $clienteControl->listarObj();
            foreach ($vetClientes as $cliente) {
               echo '<tr>
                        <td>'.$cliente->getNome().'</td>
                        <td>'.$cliente->getCpf().'</td>
                        <td>'.$cliente->getTelefone().'</td>
                        <td>'.$cliente->getEndereco().'</td>
                        <td>'.$cliente->getPagamento().'</td>
                        <td>
                           <a href="../localizar.php?id=cliente'.$cliente->getId().'" class="btn btn-primary">Editar</a>
                           <a href="../excluir.php?id=cliente'.$cliente->getId().'" class="btn btn-danger">Excluir</a>
                        </td>
                     </tr>';
            }
         ?>
      </tbody>
   </table>
   <?php
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
echo criaFooter();
?>
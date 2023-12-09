<?php
require_once '../../control/public.php';
require_once '../../control/funcoes.php';
$msgExcluir = @$_GET['resultExcluir'];

echo criaHeader("Mecânicos");
?>
<main class="d-flex flex-column align-items-center justify-content-center flex-grow-1 my-4">
   <h2 class="mb-4">Listagem de mecânicos</h2>
   <table class="table table-bordered table-striped table-hover text-center align-middle" style="width: 90%;">
      <thead class="table-dark">
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
      <tbody>
         <?php
            $vetMecanicos = $mecanicoControl->listarObj();
            foreach ($vetMecanicos as $mecanico) {
               echo '<tr>
                        <td>'.$mecanico->getNome().'</td>
                        <td>'.$mecanico->getCpf().'</td>
                        <td>'.$mecanico->getTelefone().'</td>
                        <td>'.$mecanico->getEndereco().'</td>
                        <td>R$'.$mecanico->getSalario().'</td>
                        <td>'.$mecanico->getCargo().'</td>
                        <td>'.$mecanico->getEspecializacao().'</td>
                        <td>
                           <a href="../localizar.php?id=mecanico'.$mecanico->getId().'" class="btn btn-primary">Editar</a>
                           <a href="../excluir.php?id=mecanico'.$mecanico->getId().'" class="btn btn-danger">Excluir</a>
                        </td>
                     </tr>';
            }
         ?>
      </tbody>
   </table>
   <?php
      if ($msgExcluir == "erroInfo") {
         echo '<p class="form-error px-3">Erro! Este mecânico está cadastrado em algum serviço.</p>';
      } else if ($msgExcluir == "erroPessoa") {
         echo '<p class="form-error px-3">Erro! Este mecânico não existe.</p>';
      } else if ($msgExcluir == "sucesso") {
         echo '<p class="form-success px-3">Mecânico excluído com sucesso!</p>';
      }
   ?>
</main>
<?php
echo criaFooter();
?>
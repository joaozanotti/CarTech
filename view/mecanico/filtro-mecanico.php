<?php
require_once '../../control/public.php';
require_once '../../control/funcoes.php';
$msg = @$_GET['result'];

echo criaHeader("Mecânicos");
?>
<main class="d-flex align-items-center justify-content-around flex-grow-1 my-4">
    <div class="listagem ms-5">
        <div class="mecanicos d-flex flex-column align-items-center mb-4">
        <h2 class="mb-4">Mecânicos cadastrados</h2>
            <?php
                $vetMecanicos = $mecanicoControl->listarObj();

                if ($vetMecanicos != null) {
                    echo '<table class="table table-bordered table-striped table-hover text-center align-middle">
                    <thead class="table-dark align-middle">
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                        </tr>
                    </thead>
                    <tbody>';
        
                    
                    foreach ($vetMecanicos as $mecanico) {
                    echo '<tr>
                            <td>'.$mecanico->getNome().'</td>
                            <td>'.$mecanico->getCpf().'</td>
                        </tr>';
                    }

                    echo '</tbody>
                    </table>';

                } else {
                    echo '<p>Nenhum mecânico encontrado.</p>';
                }
            ?>
        </div>
    </div>
    <div class="formulario me-5 d-flex flex-column align-items-center">
        <h1 class="mb-3 me-5">Filtrar mecânicos</h1>
        <form action="../filtrar.php?url=mecanico" method="post" class="w-100 me-5">
            <p>
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" id="cpf" name="cpf" class="form-control border border-secondary" placeholder="Digite o CPF... (Apenas 14 dígitos)" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
            </p>
            <p class="d-flex justify-content-center mt-4">
                <input type="submit" value="Pesquisar" class="btn btn-dark mx-2 border border-dark border-2">
                <input type="reset" value="Limpar" class="btn btn-dark mx-2 border border-dark border-2">
            </p>
            <p>
                <?php
                    if ($msg == "erroInfo") {
                        echo "<p class='form-error'>Erro! CPF do mecânico inválido.</p>";
                    } else if ($msg == "erroPessoa") {
                        echo "<p class='form-error'>Mecânico não encontrado.</p>";
                    }
                ?>
            </p>
        </form>
    </div>
</main>
<?php
echo criaFooter();
?>
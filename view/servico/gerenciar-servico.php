<?php
include '../../control/funcoes.php';
echo criaHeader("Serviços", 3);
?>

<main class="d-flex align-items-center justify-content-center flex-grow-1">
    <div class="text-center w-50">
        <h4>Selecione uma funcionalidade:</h4>
        <a href="./cadastro-servico.php" class="btn btn-secondary">Cadastrar serviço</a>
        <a href="./listagem-servico.php" class="btn btn-secondary">Listar serviços</a>
    </div>
    <div class="text-center w-50">
        <img src="../../img/logopreta.png" alt="Logo da CarTech" class="w-25">
    </div>
</main>

<?php
echo criaFooter();
?>
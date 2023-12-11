<?php
require_once '../control/funcoes.php';

echo criaHeader("Home");
?>
<main class="d-flex flex-column align-items-center justify-content-center flex-grow-1">
    <div class="info row align-items-center justify-content-center w-100 mt-5 mb-4">
        <div class="texto col-8 d-flex flex-column align-items-end">
            <div style="width: 92.5%;">
                <h5 style="font-size: 1.6em; text-align:justify;">Bem-vindo à <span class="text-danger">Car Tech</span>, o seu destino confiável para soluções automotivas de qualidade excepcional!</h5>
                <p style="font-size: 1.10em; text-align:justify;">Na Car Tech, a nossa paixão pela excelência automotiva é evidente em cada serviço que oferecemos. Nossa missão é proporcionar serviços de manutenção, reparo e diagnóstico precisos para uma ampla gama de veículos, utilizando tecnologia de ponta e conhecimentos especializados. Desde simples verificações até reparos complexos, cada detalhe é tratado com a máxima atenção para garantir que seu veículo retorne à estrada em condições ideais.</p>
            </div>
        </div>
        <div class="logo col-4 d-flex justify-content-center">
            <img src="../img/home.png" alt="Imagem do Início" style="width: 70%;">
        </div>
    </div>
    <div class="servicos d-flex align-items-center justify-content-around text-center w-100 mt-4 mb-5">
            <div class="card border-danger border-2 ms-5" style="width: 20%; height: 10em; background-color: #cccccc;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title">ATENDIMENTO PROFISSIONAL</h5>
                    <h6 class="card-subtitle mb-2"><i class="bi bi-suitcase-lg" style="font-size: 2em;"></i></h6>
                </div>
            </div>
           <div class="card border-danger border-2" style="width: 20%; height: 10em; background-color: #cccccc;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title">ALTA TECNOLOGIA</h5>
                    <h6 class="card-subtitle mb-2"><i class="bi bi-sliders" style="font-size: 2em;"></i></h6>
                </div>
            </div>
            <div class="card border-danger border-2" style="width: 20%; height: 10em; background-color: #cccccc;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title">TRANSPARÊNCIA NO SERVIÇO</h5>
                    <h6 class="card-subtitle mb-2"><i class="bi bi-search" style="font-size: 2em;"></i></h6>
                </div>
            </div>
            <div class="card border-danger border-2 me-5" style="width: 20%; height: 10em; background-color: #cccccc;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title">CONFIABILIDADE E SEGURANÇA</h5>
                    <h6 class="card-subtitle mb-2"><i class="bi bi-shield-check" style="font-size: 2em;"></i></h6>
                </div>
            </div>
    </div>
</main>
<?php
echo criaFooter();
?>
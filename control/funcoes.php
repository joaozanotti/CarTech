<?php
// Definindo a função que cria o cabeçalho
function criaHeader($titulo, $funcao = "") {
    return '<!DOCTYPE html>
            <html lang="pt-br">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>'.$titulo.' - CarTech</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
                '.criarCss($titulo, $funcao).'
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
                '.criarIcone($titulo, $funcao).'
            </head>
            <body class="d-flex flex-column min-vh-100">
                <header class="text-bg-dark justify-content-between align-items-center">
                    <div class="px-5">
                        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="#" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        '.criarLinks($titulo, $funcao).'
                        </div>
                    </div>
                    '.criarNav($titulo, $funcao).'
                </header>';
}

// Definindo a função que cria o css
function criarCss($titulo, $funcao) {
    if ($titulo == "Home" || ($funcao == "Editar" || $funcao == "Filtrar")) {
        return '<link rel="stylesheet" href="../css/style.css">';
    } else {
        return '<link rel="stylesheet" href="../../css/style.css">';
    }
}

// Definindo a função que cria o ícone da aba
function criarIcone($titulo, $funcao) {
    if ($titulo == "Home" || ($funcao == "Editar" || $funcao == "Filtrar")) {
        return '<link rel="icon" type="image/x-icon" href="../img/icone.png">';
    } else {
        return '<link rel="icon" type="image/x-icon" href="../../img/icone.png">';
    }
}

// Definindo a função que cria os links principais
function criarLinks($titulo, $funcao) {
    if ($titulo == "Home") {
        return '<img src="../img/logobranca.png" alt="Logo da CarTech" width="80" class="py-2 ms-2">
                </a>
                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li class="border border-danger border-2 rounded-2">
                    <a href="./index.php" class="nav-link text-white d-flex align-items-center">
                        <i class="bi bi-house-door-fill text-danger"></i>
                        INÍCIO
                    </a>
                    </li>
                    <li class="border border-dark border-2">
                    <a href="cliente/gerenciar-cliente.php" class="nav-link text-white d-flex align-items-center">
                        <i class="bi bi-gear-fill text-danger"></i>
                        GERENCIAR
                    </a>
                    </li>
                </ul>';

    } else if ($funcao == "Editar" || $funcao == "Filtrar") {
        return '<img src="../img/logobranca.png" alt="Logo da CarTech" width="80" class="py-2 ms-2">
                </a>
                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li class="border border-dark border-2">
                    <a href="./index.php" class="nav-link text-white d-flex align-items-center">
                        <i class="bi bi-house-door-fill text-danger"></i>
                        INÍCIO
                    </a>
                    </li>
                    <li class="border border-danger border-2 rounded-2">
                    <a href="cliente/gerenciar-cliente.php" class="nav-link text-white d-flex align-items-center">
                        <i class="bi bi-gear-fill text-danger"></i>
                        GERENCIAR
                    </a>
                    </li>
                </ul>';

    } else {
        return '<img src="../../img/logobranca.png" alt="Logo da CarTech" width="80" class="py-2 ms-2">
                </a>
                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li class="border border-dark border-2">
                    <a href="../index.php" class="nav-link text-white d-flex align-items-center">
                        <i class="bi bi-house-door-fill text-danger"></i>
                        INÍCIO
                    </a>
                    </li>
                    <li class="border border-danger border-2 rounded-2">
                    <a href="../cliente/gerenciar-cliente.php" class="nav-link text-white d-flex align-items-center">
                        <i class="bi bi-gear-fill text-danger"></i>
                        GERENCIAR
                    </a>
                    </li>
                </ul>';
    }
}

// Definindo a função que cria a nav e os seus links
function criarNav($titulo, $funcao) {
    if ($titulo == "Clientes" && ($funcao == "Editar" || $funcao == "Filtrar")) {
        return '<div class="px-3 border-bottom border-dark border-2 bg-secondary">
                    <div class="d-flex py-2 flex-wrap justify-content-center">
                        <div class="px-2">
                            <a href="cliente/gerenciar-cliente.php" class="nav-link text-white px-2 py-1 border border-2 border-white rounded-2 d-flex align-items-center">
                                <i class="bi bi-person-fill"></i>
                                CLIENTES
                            </a>
                        </div>
                        <div class="px-2">
                            <a href="mecanico/gerenciar-mecanico.php" class="nav-link text-white px-2 py-1 border border-2 border-secondary d-flex align-items-center">
                                <i class="bi bi-person-fill-gear"></i>
                                MECÂNICOS
                            </a>
                        </div>
                        <div class="px-2">
                            <a href="servico/gerenciar-servico.php" class="nav-link text-white px-2 py-1 border border-2 border-secondary d-flex align-items-center">
                                <i class="bi bi-suitcase-lg-fill"></i>
                                SERVIÇOS
                            </a>
                        </div>
                    </div>
                </div>';

    } else if ($titulo == "Clientes") {
        return '<div class="px-3 border-bottom border-dark border-2 bg-secondary">
                    <div class="d-flex py-2 flex-wrap justify-content-center">
                        <div class="px-2">
                            <a href="../cliente/gerenciar-cliente.php" class="nav-link text-white px-2 py-1 border border-2 border-white rounded-2 d-flex align-items-center">
                                <i class="bi bi-person-fill"></i>
                                CLIENTES
                            </a>
                        </div>
                        <div class="px-2">
                            <a href="../mecanico/gerenciar-mecanico.php" class="nav-link text-white px-2 py-1 border border-2 border-secondary d-flex align-items-center">
                                <i class="bi bi-person-fill-gear"></i>
                                MECÂNICOS
                            </a>
                        </div>
                        <div class="px-2">
                            <a href="../servico/gerenciar-servico.php" class="nav-link text-white px-2 py-1 border border-2 border-secondary d-flex align-items-center">
                                <i class="bi bi-suitcase-lg-fill"></i>
                                SERVIÇOS
                            </a>
                        </div>
                    </div>
                </div>';

    } else if ($titulo == "Mecânicos" && ($funcao == "Editar" || $funcao == "Filtrar")) {
        return '<div class="px-3 border-bottom border-dark border-2 bg-secondary">
                    <div class="d-flex py-2 flex-wrap justify-content-center">
                        <div class="px-2">
                            <a href="cliente/gerenciar-cliente.php" class="nav-link text-white px-2 py-1 border border-2 border-secondary d-flex align-items-center">
                                <i class="bi bi-person-fill"></i>
                                CLIENTES
                            </a>
                        </div>
                        <div class="px-2">
                            <a href="mecanico/gerenciar-mecanico.php" class="nav-link text-white px-2 py-1 border border-2 border-white rounded-2 d-flex align-items-center">
                                <i class="bi bi-person-fill-gear"></i>
                                MECÂNICOS
                            </a>
                        </div>
                        <div class="px-2">
                            <a href="servico/gerenciar-servico.php" class="nav-link text-white px-2 py-1 border border-2 border-secondary d-flex align-items-center">
                                <i class="bi bi-suitcase-lg-fill"></i>
                                SERVIÇOS
                            </a>
                        </div>
                    </div>
                </div>';

    } else if ($titulo == "Mecânicos") {
        return '<div class="px-3 border-bottom border-dark border-2 bg-secondary">
                    <div class="d-flex py-2 flex-wrap justify-content-center">
                        <div class="px-2">
                            <a href="../cliente/gerenciar-cliente.php" class="nav-link text-white px-2 py-1 border border-2 border-secondary d-flex align-items-center">
                                <i class="bi bi-person-fill"></i>
                                CLIENTES
                            </a>
                        </div>
                        <div class="px-2">
                            <a href="../mecanico/gerenciar-mecanico.php" class="nav-link text-white px-2 py-1 border border-2 border-white rounded-2 d-flex align-items-center">
                                <i class="bi bi-person-fill-gear"></i>
                                MECÂNICOS
                            </a>
                        </div>
                        <div class="px-2">
                            <a href="../servico/gerenciar-servico.php" class="nav-link text-white px-2 py-1 border border-2 border-secondary d-flex align-items-center">
                                <i class="bi bi-suitcase-lg-fill"></i>
                                SERVIÇOS
                            </a>
                        </div>
                    </div>
                </div>';

    } else if ($titulo == "Serviços" && ($funcao == "Editar" || $funcao == "Filtrar")) {
        return '<div class="px-3 border-bottom border-dark border-2 bg-secondary">
                    <div class="d-flex py-2 flex-wrap justify-content-center">
                        <div class="px-2">
                            <a href="cliente/gerenciar-cliente.php" class="nav-link text-white px-2 py-1 border border-2 border-secondary d-flex align-items-center">
                                <i class="bi bi-person-fill"></i>
                                CLIENTES
                            </a>
                        </div>
                        <div class="px-2">
                            <a href="mecanico/gerenciar-mecanico.php" class="nav-link text-white px-2 py-1 border border-2 border-secondary d-flex align-items-center">
                                <i class="bi bi-person-fill-gear"></i>
                                MECÂNICOS
                            </a>
                        </div>
                        <div class="px-2">
                            <a href="servico/gerenciar-servico.php" class="nav-link text-white px-2 py-1 border border-2 border-white rounded-2 d-flex align-items-center">
                                <i class="bi bi-suitcase-lg-fill"></i>
                                SERVIÇOS
                            </a>
                        </div>
                    </div>
                </div>';

    } else if ($titulo == "Serviços") {
        return '<div class="px-3 border-bottom border-dark border-2 bg-secondary">
                    <div class="d-flex py-2 flex-wrap justify-content-center">
                        <div class="px-2">
                            <a href="../cliente/gerenciar-cliente.php" class="nav-link text-white px-2 py-1 border border-2 border-secondary d-flex align-items-center">
                                <i class="bi bi-person-fill"></i>
                                CLIENTES
                            </a>
                        </div>
                        <div class="px-2">
                            <a href="../mecanico/gerenciar-mecanico.php" class="nav-link text-white px-2 py-1 border border-2 border-secondary d-flex align-items-center">
                                <i class="bi bi-person-fill-gear"></i>
                                MECÂNICOS
                            </a>
                        </div>
                        <div class="px-2">
                            <a href="../servico/gerenciar-servico.php" class="nav-link text-white px-2 py-1 border border-2 border-white rounded-2 d-flex align-items-center">
                                <i class="bi bi-suitcase-lg-fill"></i>
                                SERVIÇOS
                            </a>
                        </div>
                    </div>
                </div>';
                
    } else if ($funcao == "Editar" || $funcao == "Filtrar") {
        return '';

    } else {
        return '';
    }
}

// Definindo a função que cria o footer
function criaFooter() {
    return '<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 bg-dark mt-auto">
                <p class="nav col-md-4 mb-0 px-5 text-white justify-content-start">MECÂNICA <span class="text-danger ms-1">CARTECH</span></p>
                <p class="nav col-md-4 mb-0 text-white justify-content-center">COPYRIGHT © 2023</p> 
                <ul class="nav col-md-4 justify-content-end px-5">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white d-flex align-items-center">
                            <i class="bi bi-question-circle-fill text-danger"></i>
                            CONTATO
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white d-flex align-items-center">
                            <i class="bi bi-info-circle-fill text-danger"></i>
                            SOBRE
                        </a>
                    </li>
                </ul>
            </footer>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </body>
    </html>';
}
?>
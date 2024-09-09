<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title><?= $title?></title>

    <?php if($caminhos == 1){ ?>
    <link rel="shortcut icon" href="public/assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <?php }else{ ?>
    <link rel="shortcut icon" href="../public/assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <?php } ?>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://kit.fontawesome.com/bf7e05c402.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<header class="header">
    <div class="menu">
        <!-- <i class="fas fa-bars"></i> -->
    </div>

    <div class="img-tile">
        <img src="https://telegra.ph/file/daa4ccd71a49aae9a7cc9.png" alt="Logo">
        <h1 class="header__title">ESCOLA NSL</h1>
    </div>

    <div class="user">

        <a data-bs-toggle="offcanvas" href="#offcanvasRight" role="button" aria-controls="offcanvasRight">
            <i class="far fa-user"></i>
        </a>

    </div>
</header>

<div class="boton-header"></div>


<div class="offcanvas offcanvas-end custom-offcanvas" style="width: 250px;" tabindex="-1" id="offcanvasRight"
    aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header bg-dark text-white">
        <h5 id="offcanvasRightLabel" class="mb-0 align-items-center">Painel de Usuário</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body p-3 bg-light d-flex flex-column">
        <div class="user-info mb-4">
            <?php if($gestor != True){ ?>
            
            <!-- Seção de Nome do Usuário -->
            <div class="info-item d-flex align-items-center mb-4">
                <div class="icon-menu-offcanvas me-2">
                    <i class="fas fa-user-circle fa-2x text-primary"></i>
                </div>
                <div>
                    <h6 class="mb-0 text-primary">Nome:</h6>
                    <p class="text-muted mb-0"><?= $_SESSION["NOME"]; ?></p>
                </div>
            </div>

            <!-- Seção de RA do Usuário -->
            <div class="info-item d-flex align-items-center mb-4">
                <div class="icon-menu-offcanvas me-2">
                    <i class="fas fa-id-badge fa-2x text-secondary"></i>
                </div>
                <div>
                    <h6 class="mb-0 text-secondary">RA:</h6>
                    <p class="text-muted mb-0"><?= $_SESSION['RA']; ?></p>
                </div>
            </div>

            <!-- Seção de Turma -->
            <div class="info-item d-flex align-items-center mb-4">
                <div class="icon-menu-offcanvas me-2">
                    <i class="fas fa-school fa-2x text-success"></i>
                </div>
                <div>
                    <h6 class="mb-0 text-success">Turma:</h6>
                    <p class="text-muted mb-0"><?= $_SESSION['TURMA']; ?></p>
                </div>
            </div>

            <!-- Seção de Turno -->
            <div class="info-item d-flex align-items-center mb-4">
                <div class="icon-menu-offcanvas me-2">
                    <i class="fas fa-clock fa-2x text-warning"></i>
                </div>
                <div>
                    <h6 class="mb-0 text-warning">Turno:</h6>
                    <p class="text-muted mb-0"><?= $_SESSION['TURNO']; ?></p>
                </div>
            </div>
            
            <?php } else { ?>
            
            <!-- Seção de Gestor -->
            <div class="info-item d-flex align-items-center mb-4">
                <div class="icon-menu-offcanvas me-2">
                    <i class="fas fa-crown fa-2x text-danger"></i>
                </div>
                <div>
                    <h6 class="mb-0 text-danger">Gestor:</h6>
                    <p class="text-muted mb-0">Você está logado como gestor. Aqui você pode gerenciar e supervisionar as
                        eletivas e tutoria da escola.</p>
                </div>
            </div>

            <?php } ?>
        </div>

        <!-- Botão de Sair -->
        <div class="mt-auto">
            <div class="area-tecnico" >
                <img src="public/assets/images/tecnico.png" alt="">
                <span>#ÉOTECNICOO 😜</span>
            </div>
            <a href="sair" class="btn btn-danger w-100 d-flex align-items-center justify-content-center">
                <i class="fas fa-sign-out-alt me-2"></i> <span>Sair</span>
            </a>
        </div>
    </div>
</div>

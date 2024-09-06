<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title><?= $title?></title>

    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="shortcut icon" href="public/assets/images/favicon.ico" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/bf7e05c402.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container-login container-fluid d-flex justify-content-center align-items-center min-vh-100">
        <div class="wrapper fadeInDown col-12 col-md-8 col-lg-6 col-xl-4">
            <div id="formContent">
                <!-- Ícone do usuário -->
                 <div id="formHeader">
                 <div class="fadeIn first">
                    <img src="https://telegra.ph/file/daa4ccd71a49aae9a7cc9.png" id="icon" alt="User Icon" />
                </div>
                <a class="underlineHover" href="#">ESCOLA NSL</a>
                 </div>



                <!-- Formulário de login -->
                <form method="POST" action="login/autenticar" >
                    <input type="text" id="ra" class="fadeIn second" name="ra" required placeholder="Insira seu RA">
                    <input type="submit" class="fadeIn fourth" name="submit" value="Logar">
                </form>

                <!-- Rodapé -->
                <div id="formFooter">
                    <a class="underlineHover" href="/gestor">GESTOR</a>
                </div>
            </div>
        </div>
    </div>

    <?php if(isset($_SESSION["RaNaoEncontrado"])) {?>

    <div id='RaNaoEncontrado' class='PopUp-sobreposicao show'>
        <div class='conteudo-popup'>

            <!-- 
            <div class="check">
                <img src="public/assets/images/check.png" alt="">
            </div>
             -->
            <div class="check">
                <img src="public/assets/images/cancel.png" alt="">
            </div>
            <h2>ERRO!</h2>

            <p>Esse RA não foi localizado</p>
            <button onclick="Fechar_PopUp('RaNaoEncontrado')" class='Fechar-Popup'>FECHAR</button>
        </div>
    </div>
    <?php unset($_SESSION["RaNaoEncontrado"]); }?>

    <script src="public/assets/js/PopUps.js"></script>
    <script src="public/assets/js/Script.js"></script>
</body>

</html>
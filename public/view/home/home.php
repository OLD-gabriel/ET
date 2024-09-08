<main class="main min-vh-100">
    <div class="home-et">
    <p class="welcome-text">
            <i class="fas fa-handshake"></i>
            Bem-vindo(a) ao sistema de escolha de Eletivas e Tutorias da Escola NSL. Aqui você poderá visualizar as opções
            disponíveis e fazer sua escolha de maneira prática e rápida. <br>
            <i class="fas fa-info-circle"></i> Fique atento ao status das opções abaixo para saber se estão liberadas para seleção.
        </p>
    </div>
    <div class="home-et">
        <h2 class="titulo-et"> ELETIVA & TUTORIA <br> ESCOLA NSL </h2>
        <br>
        <div class="links">

            <a id="link-eletiva" class="link-et" href="<?= $data["liberado"]["ELETIVA"] == "1" ? "eletivas" : "#" ?>">
                <h3>ELETIVA</h3>
                <i class="fas fa-book-open"></i>
                <span id="status-eletiva"
                    class="status <?= $data["liberado"]["ELETIVA"] == "1" ? "status-liberado" : "status-bloqueado" ?>"><?= $data["liberado"]["ELETIVA"] == "1" ? "LIBERADO" : "BLOQUEADO" ?></span>
            </a>

            <a id="link-tutoria" class="link-et" href="#">
                <h3>TUTORIA</h3>
                <i class="fas fa-user-friends"></i>
                <span id="status-tutoria" class="status status-bloqueado">BLOQUEADO</span>
            </a>

        </div>
    </div>
</main>

<?php if(isset($data["SCRIPT"])){ ?>
<script src="public/assets/js/<?=$data["SCRIPT"]?>"></script>
<?php } ?>

<?php if(isset($_SESSION["EletivaDesativada"])) {?>

<div id='EletivaDesativada' class='PopUp-sobreposicao show'>
    <div class='conteudo-popup'>

        <div class="check">
            <img src="public/assets/images/cancel.png" alt="">
        </div>
        <h2>ERRO!</h2>

        <p>O sistema de eletivas está desativado!</p>
        <button onclick="Fechar_PopUp('EletivaDesativada')" class='Fechar-Popup'>FECHAR</button>
    </div>
</div>

<?php unset($_SESSION["EletivaDesativada"]); }?>
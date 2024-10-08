<main class="main min-vh-100">

    <div class="home-et detalhes-info-eletiva">
        <h2 class="titulo-et"> ELETIVAS - ESCOLA NSL </h2>
        <center>
        <span style="margin-bottom:5px;" >
            <i style="margin-right:5px" class="fas fa-user"></i><strong><?= $_SESSION["NOME"] ?></strong>
        </span>
        </center>
<br>
        <h1><i class="fas fa-hand-point-right"></i> Bem-vindo!</h1>
        <p>
            <i class="fas fa-book"></i> Escolha a sua <strong>eletiva</strong> sabiamente.
            <br> <i class="fas fa-eye"></i> Tome cuidado e olhe atentamente antes de fazer sua escolha.
            <br> <i class="fas fa-info-circle"></i> Certifique-se de verificar todos os detalhes!
        </p>
    </div>

    <?php if($data["escolha"] != NULL){ ?>
    <div class="home-et escolha-confirmada">
        <h2><i class="fas fa-check-circle"></i> Parabéns!</h2>
        <p>
            Você escolheu a eletiva <strong><?= $data["escolha"][0]["nome_eletiva"] ?></strong>.
            <br><i class="fas fa-graduation-cap"></i> Estamos ansiosos para vê-lo se destacando nessa jornada!
            <br><i class="fas fa-lightbulb"></i> Aproveite ao máximo essa oportunidade de aprendizado.
        </p>
        <p class="atencao"><i class="fas fa-exclamation-triangle"></i> Lembre-se: sua escolha é definitiva. Reflita bem
            sobre o conteúdo da eletiva e prepare-se para novas descobertas!</p>
    </div>
    <?php } ?>

    <div class="home-et">
        <h2 class="titulo-et" id="TituloEscolherEletiva"> ESCOLHA SUA ELETIVA </h2>
        <div class="area-eletivas">

            <?php foreach($data["eletivas"] as $eletiva){?>
            <div class="eletiva" id="Eletiva-<?= $eletiva["id"] ?>">
                <section class="curso">
                    <h2 class="titulo-curso"><?= $eletiva["nome_eletiva"] ?></h2>
                </section>
                <section class="professores">
                    <h3 class="titulo-professores">PROFESSORES</h3>
                    <div class="professor-lista">
                        <?php
                            $professores = explode(";",$eletiva["nome_professores"]);
                            foreach($professores as $professor){
                                echo "<span class='professor'>{$professor}</span>";
                            }
                        ?>
                    </div>
                </section>



                <section class="vagas">
                    <h3 class="titulo-vagas">VAGAS</h3>
                    <span class="quantidade-vagas" id="Eletiva-vagas-<?= $eletiva["id"] ?>"><?= $eletiva["vagas"] ?>
                        VAGAS</span>
                </section>
                <br>
                <button onclick="PopUpEscolherEletiva('<?= htmlspecialchars($eletiva['id'], ENT_QUOTES, 'UTF-8') ?>','<?= htmlspecialchars($eletiva['nome_eletiva'], ENT_QUOTES, 'UTF-8') ?>')" class="btn-escolher">ESCOLHER</button>
            </div>
            <?php }?>
        </div>
    </div>
    <div class="home-et dicas-finais">
    <h2 class="titulo-dicas">Dicas Úteis</h2>
    <p>
        <i class="fas fa-hourglass-half"></i> As vagas nas eletivas são limitadas, então não demore muito para fazer sua escolha! <br>
        <i class="fas fa-hands-helping"></i> Se precisar de ajuda,  entre em contato com o Vânia Alves ou Alex Menezes.
    </p>
</div>
</main>

<div id='EletivaEscolher' class='PopUp-sobreposicao hide'>
    <div class='conteudo-popup'>

        <!-- 
            <div class="check">
                
                <img src="public/assets/images/check.png" alt="">
            </div>
             -->
        <div class="check">
            <img src="public/assets/images/duvida.png" alt="">
        </div>
        <h2><span id="nome-eletiva-popup">X</span></h2>

        <p>Tem Certeza que deseja escolher essa eletiva?</p>
        <div class="botoes">
            <button onclick="Fechar_PopUp('EletivaEscolher')">FECHAR</button>
            <a id="AncoraEscolherEletiva" href="">ESCOLHER</a>
        </div>
    </div>
</div>

<?php if(isset($_SESSION["EletivaEscolhida"])) {?>

<div id='EletivaEscolhida' class='PopUp-sobreposicao show'>
    <div class='conteudo-popup'>

        <div class="check">
            <img src="public/assets/images/check.png" alt="">
        </div>
        <h2>SUCESSO!</h2>

        <p>Você escolheu a eletiva <span class="destacado"><?= $_SESSION["NomeEletivaEscolhida"]?></span> com sucesso!
        </p>
        <button onclick="Fechar_PopUp('EletivaEscolhida')" class='Fechar-Popup'>FECHAR</button>
    </div>
</div>

<?php 
unset($_SESSION["EletivaEscolhida"]); 
unset($_SESSION["NomeEletivaEscolhida"]); 
}?>


<?php if(isset($_SESSION["ERRO"])) {?>

<div id='EletivaErro' class='PopUp-sobreposicao show'>
    <div class='conteudo-popup'>

        <div class="check">
            <img src="public/assets/images/cancel.png" alt="">
        </div>
        <h2>ERRO!</h2>

        <p>Ocorreu um erro interno! </p>
        <button onclick="Fechar_PopUp('EletivaErro')" class='Fechar-Popup'>FECHAR</button>
    </div>
</div>

<?php unset($_SESSION["ERRO"]); }?>

<?php if(isset($_SESSION["EletivaJaEscolhida"])) {?>

<div id='EletivaJaEscolhida' class='PopUp-sobreposicao show'>
    <div class='conteudo-popup'>

        <div class="check">
            <img src="public/assets/images/cancel.png" alt="">
        </div>
        <h2>ERRO!</h2>

        <p>Você ja escolheu a eletiva <span class="destacado"><?= $data["escolha"][0]["nome_eletiva"]?></span>. </p>
        <button onclick="Fechar_PopUp('EletivaJaEscolhida')" class='Fechar-Popup'>FECHAR</button>
    </div>
</div>

<?php unset($_SESSION["EletivaJaEscolhida"]); }?>

<?php if(isset($data["SCRIPT"])){ ?>
<script src="public/assets/js/<?=$data["SCRIPT"]?>"></script>
<?php } ?>

<?php if(isset($_SESSION["VagasEsgotadas"])) {?>

<div id='VagasEsgotadas' class='PopUp-sobreposicao show'>
    <div class='conteudo-popup'>

        <div class="check">
            <img src="public/assets/images/cancel.png" alt="">
        </div>
        <h2>VAGAS ESGOTADAS!</h2>

        <p>As vagas da eletiva <span class="destacado"><?= $_SESSION["VagasEsgotadas"]?></span> foram esgotadas. </p>
        <button onclick="Fechar_PopUp('VagasEsgotadas')" class='Fechar-Popup'>FECHAR</button>
    </div>
</div>

<?php unset($_SESSION["VagasEsgotadas"]); }?>
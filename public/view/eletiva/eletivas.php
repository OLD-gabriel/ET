<main class="main min-vh-100">
<div class="home-et detalhes-info-eletiva">
        <h2 class="titulo-et"> ELETIVAS - ESCOLA NSL </h2>
        <h1><i class="fas fa-hand-point-right"></i> Bem-vindo!</h1>
        <p>
            <i class="fas fa-book"></i> Escolha a sua <strong>eletiva</strong> sabiamente. 
            <br> <i class="fas fa-eye"></i> Tome cuidado e olhe atentamente antes de fazer sua escolha.
            <br> <i class="fas fa-info-circle"></i> Certifique-se de verificar todos os detalhes!
        </p>
    </div>

    <div class="home-et">
        <h2 class="titulo-et"> ESCOLHA SUA ELETIVA </h2>
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
                    <span class="quantidade-vagas" id="Eletiva-vagas-<?= $eletiva["id"] ?>"><?= $eletiva["vagas"] ?> VAGAS</span>
                </section>
                <br>
                <button onclick="PopUpEscolherEletiva('<?= $eletiva['id'] ?>','<?= $eletiva['nome_eletiva'] ?>')" class="btn-escolher">ESCOLHER</button>
            </div>
            <?php }?>
        </div>
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
                <a id="AncoraEscolherEletiva" href="" >ESCOLHER</a>
            </div>
        </div>
    </div>
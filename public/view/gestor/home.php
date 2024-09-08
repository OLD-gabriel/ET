<main class="min-vh-100">
    <div class="gestor-main">

        <div class="sidebar">
            <button class="menu-button" onclick="mostrarConteudo('AddEletiva')">
                <i class="fas fa-plus-circle"></i> Adicionar Eletiva
            </button>
            <button class="menu-button" onclick="mostrarConteudo('Escolhas')">
                <i class="fas fa-list-ul"></i> Visualizar Escolhas
            </button>
            <button class="menu-button" onclick="mostrarConteudo('Eletivas')">
                <i class="fas fa-tachometer-alt"></i> Gerenciar Eletivas
            </button>
            <button class="menu-button" onclick="mostrarConteudo('content4')">
                <i class="fas fa-info-circle"></i> Status
            </button>
        </div>

        <div class="content">
            <div id="AddEletiva" class="content-section active">

                <div class="container form-container">
                    <div class="form-header">
                        <h2><i class="fas fa-book"></i> Cadastro de Eletiva</h2>
                    </div>

                    <form method="POST" action="eletiva/adicionar">
                        <div class="mb-4">
                            <label for="eletiva" class="form-label"><i class="fas fa-chalkboard"></i> Nome da
                                Eletiva</label>
                            <input type="text" class="form-control" name="nome" id="eletiva"
                                placeholder="Digite o nome da eletiva" required>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <label for="professor1" class="form-label"><i class="fas fa-user"></i> Nome do Professor
                                    1</label>
                                <input type="text" class="form-control" name="nome-professor[]" id="professor1"
                                    placeholder="Professor 1" required>
                            </div>
                            <div class="col-md-4">
                                <label for="professor2" class="form-label"><i class="fas fa-user"></i> Nome do Professor
                                    2</label>
                                <input type="text" class="form-control" name="nome-professor[]" id="professor2"
                                    placeholder="Professor 2">
                            </div>
                            <div class="col-md-4">
                                <label for="professor3" class="form-label"><i class="fas fa-user"></i> Nome do Professor
                                    3</label>
                                <input type="text" class="form-control" name="nome-professor[]" id="professor3"
                                    placeholder="Professor 3">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="vagas" class="form-label"><i class="fas fa-users"></i> Vagas da Eletiva</label>
                            <input type="number" class="form-control" name="vagas" id="vagas"
                                placeholder="Número de vagas" required>
                        </div>

                        <div class="mb-4">
                            <h5 class="form-section-title">Selecione as turmas que podem participar dessa eletiva:</h5>

                            <?php foreach ($data["turmasPorTurno"] as $turno => $turmas): ?>
                            <div class="turno-section">
                                <h3 class="turno-title"><?= $turno ?></h3>

                                <button type="button" class="select-all-button"
                                    onclick="toggleSelection('<?= $turno ?>')"><i class="fas fa-tasks fa-1x"></i>
                                    Selecionar Tudo</button>

                                <div class="turmas-grid">
                                    <?php foreach ($turmas as $turma): ?>
                                    <div class="custom-checkbox">
                                        <input type="checkbox" name="turmas[]" value="<?= $turma["nome"] ?>"
                                            id="turma-eletiva-<?= $turma["id"] ?>" class="turma-checkbox-<?= $turno ?>">
                                        <label for="turma-eletiva-<?= $turma["id"] ?>">
                                            <i class="fas fa-check-circle"></i> <?= $turma["nome"] ?>
                                        </label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-paper-plane"></i> Inserir Eletiva
                            </button>
                        </div>
                    </form>
                </div>

            </div>

            <div id="Escolhas" class="content-section">
                <div>
                    <div class="search-container">
                        <input type="text" id="searchRA" placeholder="RA">
                        <input type="text" id="searchNome" placeholder="Nome do Aluno">
                        <input type="text" id="searchTurno" placeholder="Turno">
                        <input type="text" id="searchEletiva" placeholder="Nome da Eletiva">
                    </div>
                    <div class="export-container">
                        <button onclick="exportToExcel()">Exportar para Excel</button>
                    </div>
                    <table id="EscolhasEletivas" class="table">
                        <thead>
                            <tr>
                                <th>RA</th>
                                <th>ALUNO</th>
                                <th>TURNO</th>
                                <th>ELETIVA</th>
                                <th>EXCLUIR</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>

            <div id="Eletivas" class="content-section">
            <div class="search-container">
                        <input type="text" id="searchNomeEletiva" placeholder="Buscar por nome">
                        <input type="text" id="searchTurnoEletiva" placeholder="Buscar por Turno">
                    </div>
                    <table id="EscolhasEletivas" class="table">
                        <thead>
                            <tr>
                                <th>NOME</th>
                                <th>TURNO</th>
                                <th>VAGAS</th>
                                <th>EXCLUIR</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
            </div>
        </div>

</main>

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

<?php if(isset($_SESSION["InserirEletiva"])) {?>

<div id='InserirEletiva' class='PopUp-sobreposicao show'>
    <div class='conteudo-popup'>

        <div class="check">
            <img src="../public/assets/images/check.png" alt="">
        </div>
        <h2>SUCESSO!</h2>

        <p>Eletiva "<?= $_SESSION["InserirEletivaNome"]?>" inserida com sucesso! </p>
        <button onclick="Fechar_PopUp('InserirEletiva')" class='Fechar-Popup'>FECHAR</button>
    </div>
</div>
<?php 
  unset($_SESSION["InserirEletiva"]); 
  unset($_SESSION["InserirEletivaNome"]); 
}?>

<?php if(isset($data["SCRIPT"])){ ?>
<script src="../public/assets/js/<?=$data["SCRIPT"]?>"></script>
<?php } ?>

<div id='EletivaEscolher' class='PopUp-sobreposicao hide'>
    <div class='conteudo-popup'>

        <div class="check">
            <img src="../public/assets/images/duvida.png" alt="">
        </div>
        <h2>EXCLUIR!</h2>

        <p>Tem Certeza que deseja excluir o aluno <span class="destacado" id="NomeAlunoEscolhaEletiva"></span> da
            eletiva "<span id="NomeEscolhaEletiva"></span>" ?</p>
        <div class="botoes">
            <button onclick="Fechar_PopUp('EletivaEscolher')">FECHAR</button>
            <a id="AncoraExcluirEscolha" href="">EXCLUIR</a>
        </div>
    </div>
</div>

<?php if(isset($_SESSION["ExcluirEscolha"])) {?>

<div id='ExcluirEscolha' class='PopUp-sobreposicao show'>
    <div class='conteudo-popup'>

        <div class="check">
            <img src="../public/assets/images/check.png" alt="">
        </div>
        <h2>SUCESSO!</h2>

        <p>O aluno <span class="destacado"><?= $_SESSION["ExcluirEscolha"]["NomeAluno"]?></span> foi excluido da eletiva
            "<?= $_SESSION["ExcluirEscolha"]["NomeEletiva"]?>" com sucesso! </p>
        <button onclick="Fechar_PopUp('ExcluirEscolha')" class='Fechar-Popup'>FECHAR</button>
    </div>
</div>
<?php unset($_SESSION["ExcluirEscolha"]); }?>
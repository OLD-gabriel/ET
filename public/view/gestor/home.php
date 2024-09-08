<main class="min-vh-100">
    <div class="gestor-main">

        <button class="hamburger-menu" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i> Menu
        </button>

        <div class="sidebar">
            <div class="sidebar-toggle">
                <button class="toggle-button" onclick="Retrair()">
                    <i class="fas fa-angle-double-left"></i>
                </button>
            </div>
            <button class="menu-button" onclick="mostrarConteudo('AddEletiva')">
                <i class="fas fa-plus-circle"></i> <span class="menu-text">Adicionar Eletiva</span>
            </button>
            <button class="menu-button" onclick="mostrarConteudo('Escolhas')">
                <i class="fas fa-list-ul"></i> <span class="menu-text">Visualizar Escolhas</span>
            </button>
            <button class="menu-button" onclick="mostrarConteudo('Eletivas')">
                <i class="fas fa-tachometer-alt"></i> <span class="menu-text">Gerenciar Eletivas</span>
            </button>
            <button class="menu-button" onclick="mostrarConteudo('Status')">
                <i class="fas fa-info-circle"></i> <span class="menu-text">Status</span>
            </button>
        </div>

        <div class="content">

            <div id="Main" class="content-section main-content active">
                <center>
                    <h2 class="main-title"><i class="fas fa-home"></i> Bem-vindo à Gestão de Eletivas</h2>
                </center>

                <div class="main-buttons-container">
                    <button class="main-action-button" onclick="mostrarConteudo('AddEletiva')">
                        <i class="fas fa-plus-circle"></i> Adicionar Eletiva
                    </button>
                    <button class="main-action-button" onclick="mostrarConteudo('Escolhas')">
                        <i class="fas fa-list-ul"></i> Visualizar Escolhas
                    </button>
                    <button class="main-action-button" onclick="mostrarConteudo('Eletivas')">
                        <i class="fas fa-tachometer-alt"></i> Gerenciar Eletivas
                    </button>
                    <button class="main-action-button" onclick="mostrarConteudo('Status')">
                        <i class="fas fa-info-circle"></i> Status dos Sistemas
                    </button>
                </div>
            </div>


            <div id="Status" class="content-section">
                <center>
                    <h2 class="status-title"><i class="fas fa-cogs"></i> Status dos Sistemas</h2>

                </center>

                <div class="status-form">
                    <button type="button" id="button-eletiva"
                        onclick="PopUpStatusEletiva('ELETIVA','<?= $data['liberado']['ELETIVA'] == '1' ? 'desativar' : 'ativar' ?>')"
                        class="btn-status">
                        <i class="fas fa-chalkboard"></i> ELETIVA
                        <?= $data['liberado']['ELETIVA'] == '1' ? 'DESATIVAR' : 'ATIVAR' ?>
                    </button>

                    <button type="button" id="button-tutoria" class="btn-status">
                        <i class="fas fa-user-tie"></i> TUTORIA
                        <?= $data['liberado']['TUTORIA'] == '1' ? 'DESATIVAR' : 'ATIVAR' ?>
                    </button>
                </div>

                <div class="status-messages">
                    <?php if ($data['liberado']['ELETIVA'] == '1'): ?>
                    <p class="status-message liberado">
                        <i class="fas fa-check-circle"></i> O sistema de ELETIVA está <span class="destacado">
                            LIBERADO</span>.
                    </p>
                    <?php else: ?>
                    <p class="status-message bloqueado">
                        <i class="fas fa-times-circle"></i> O sistema de ELETIVA está <span class="destacado">
                            BLOQUEADO</span>.
                    </p>
                    <?php endif; ?>

                    <?php if ($data['liberado']['TUTORIA'] == '1'): ?>
                    <p class="status-message liberado">
                        <i class="fas fa-check-circle"></i> O sistema de TUTORIA está <span class="destacado">
                            LIBERADO</span>.
                    </p>
                    <?php else: ?>
                    <p class="status-message bloqueado">
                        <i class="fas fa-times-circle"></i> O sistema de TUTORIA está <span class="destacado">
                            BLOQUEADO</span>.
                    </p>
                    <?php endif; ?>
                </div>
            </div>

            <div id="AddEletiva" class="content-section">

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

                        <div class="mb-4">
                            <h5 class="form-section-title">Selecione o turno dessa eletiva:</h5>

                            <div class="turmas-grid">
                                <?php foreach ($data["turnos"] as $turno): ?>
                                <div class="custom-checkbox">
                                    <input required type="radio" name="turno" value="<?= $turno?>"
                                        id="turno-eletiva-<?= $turno ?>" class="turma-checkbox-<?= $turno ?>">
                                    <label for="turno-eletiva-<?= $turno ?>">
                                        <i class="fas fa-check-circle"></i> <?= $turno ?>
                                    </label>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-paper-plane"></i> Inserir Eletiva
                            </button>
                        </div>
                    </form>
                    <div><br><br><br></div>
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
                    <table id="EscolhasEletivas" class="tabela">
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
                <div><br><br><br><br><br><br><br><br></div>

            </div>

            <div id="Eletivas" class="content-section">
                <div id="listar-eletivas">

                    <div class="aviso">
                        <i class="fas fa-exclamation-circle icon"></i>
                        <p><span class="destacado">Atenção:</strong> Se você excluir uma eletiva, todos os alunos que a
                                escolheram também
                                serão apagados.</p>
                    </div>
                    <div class="search-container">
                        <input type="text" id="searchNomeEletiva" placeholder="Buscar por nome">
                        <input type="text" id="searchTurnoEletiva" placeholder="Buscar por Turno">
                    </div>
                    <table id="tabelaEletivas" class="tabela">
                        <thead>
                            <tr>
                                <th>NOME</th>
                                <th>PROFESSORES</th>
                                <th>TURNO</th>
                                <th>VAGAS</th>
                                <th>EDITAR</th>
                                <th>EXCLUIR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data["eletivas"] as $eletiva): ?>
                            <tr>
                                <td><?= htmlspecialchars($eletiva["nome_eletiva"], ENT_QUOTES, 'UTF-8') ?></td>
                                <td>
                                    <?php foreach(explode(";", $eletiva["nome_professores"]) as $professor): ?>
                                    <span><?= htmlspecialchars($professor, ENT_QUOTES, 'UTF-8') ?></span> <br>
                                    <?php endforeach; ?>
                                </td>
                                <td><?= htmlspecialchars($eletiva["turno"], ENT_QUOTES, 'UTF-8') ?></td>
                                <td id="Eletiva-vagas-<?= htmlspecialchars($eletiva["id"], ENT_QUOTES, 'UTF-8') ?>">
                                    <?= htmlspecialchars($eletiva["vagas"], ENT_QUOTES, 'UTF-8') ?></td>
                                <td>
                                    <button onclick="EditarEletiva('<?= htmlspecialchars($eletiva['id'], ENT_QUOTES, 'UTF-8') ?>','<?= htmlspecialchars($eletiva['nome_eletiva'], ENT_QUOTES, 'UTF-8') ?>','<?= htmlspecialchars($eletiva['nome_professores'], ENT_QUOTES, 'UTF-8') ?>','<?= htmlspecialchars($eletiva['turno'], ENT_QUOTES, 'UTF-8') ?>','<?= htmlspecialchars($eletiva['vagas'], ENT_QUOTES, 'UTF-8') ?>','<?= htmlspecialchars($eletiva['turmas'], ENT_QUOTES, 'UTF-8') ?>'
                )" class="delete-btn">
                                        <i class="fas fa-pencil-alt" style="color: #23BD24;" title="Editar"></i>
                                    </button>
                                </td>
                                <td>
                                    <button onclick="PopUpExcluirEletiva(
                    '<?= htmlspecialchars($eletiva['id'], ENT_QUOTES, 'UTF-8') ?>',
                    '<?= htmlspecialchars($eletiva['nome_eletiva'], ENT_QUOTES, 'UTF-8') ?>'
                )" class="delete-btn">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div><br><br><br><br><br><br><br><br></div>
                </div>

                <div class="hide" id="editar-eletiva">
                    <div class="container form-container">
                        <div class="form-header">
                            <h2><i class="fas fa-book"></i> Editar Eletiva</h2>
                        </div>

                        <form method="POST" action="eletiva/editar&id=" id="editar-eletiva-form">
                            <div class="mb-4">
                                <label for="editar-eletiva-nome" class="form-label"><i class="fas fa-chalkboard"></i>
                                    Nome da Eletiva</label>
                                <input type="text" class="form-control" name="editar-nome" id="editar-eletiva-nome"
                                    placeholder="Digite o nome da eletiva" required>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="editar-professor1" class="form-label"><i class="fas fa-user"></i> Nome
                                        do Professor 1</label>
                                    <input type="text" class="form-control" name="editar-nome-professor[]"
                                        id="editar-professor1" placeholder="Professor 1" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="editar-professor2" class="form-label"><i class="fas fa-user"></i> Nome
                                        do Professor 2</label>
                                    <input type="text" class="form-control" name="editar-nome-professor[]"
                                        id="editar-professor2" placeholder="Professor 2">
                                </div>
                                <div class="col-md-4">
                                    <label for="editar-professor3" class="form-label"><i class="fas fa-user"></i> Nome
                                        do Professor 3</label>
                                    <input type="text" class="form-control" name="editar-nome-professor[]"
                                        id="editar-professor3" placeholder="Professor 3">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="editar-vagas" class="form-label"><i class="fas fa-users"></i> Vagas da
                                    Eletiva</label>
                                <input type="number" class="form-control" name="editar-vagas" id="editar-vagas"
                                    placeholder="Número de vagas" required>
                            </div>

                            <div class="mb-4">
                                <h5 class="form-section-title">Selecione as turmas que podem participar dessa eletiva:
                                </h5>

                                <?php foreach ($data["turmasPorTurno"] as $turno => $turmas): ?>
                                <div class="turno-section">
                                    <h3 class="turno-title"><?= $turno ?></h3>

                                    <button type="button" class="select-all-button"
                                        onclick="toggleSelection('<?= $turno ?>')">
                                        <i class="fas fa-tasks fa-1x"></i> Selecionar Tudo
                                    </button>

                                    <div class="turmas-grid">
                                        <?php foreach ($turmas as $turma): ?>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="editar-turmas[]" value="<?= $turma["nome"] ?>"
                                                id="editar-turma-eletiva-<?= $turma["id"] ?>"
                                                class="turma-checkbox-<?= $turno ?>">
                                            <label for="editar-turma-eletiva-<?= $turma["id"] ?>"><i
                                                    class="fas fa-check-circle"></i> <?= $turma["nome"] ?></label>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="mb-4">
                                <h5 class="form-section-title">Selecione o turno dessa eletiva:</h5>

                                <div class="turmas-grid">
                                    <?php foreach ($data["turnos"] as $turno): ?>
                                    <div class="custom-checkbox">
                                        <input required type="radio" name="editar-turno" value="<?= $turno ?>"
                                            id="editar-turno-eletiva-<?= $turno ?>"
                                            class="editar-turma-checkbox-<?= $turno ?>">
                                        <label for="editar-turno-eletiva-<?= $turno ?>"><i
                                                class="fas fa-check-circle"></i> <?= $turno ?></label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="button" style="background-color: red;" class="btn-submit"
                                    onclick="CancelarEdicao()"><i class="fas fa-times"></i> Cancelar</button>

                                <button type="submit" class="btn-submit"><i class="fas fa-paper-plane"></i> Atualizar
                                    Eletiva</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</main>

<?php if(isset($_SESSION["ERRO"])) {?>

<div id='EletivaErro' class='PopUp-sobreposicao show'>
    <div class='conteudo-popup'>

        <div class="check">
            <img src="../public/assets/images/cancel.png" alt="">
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
            eletiva "<span id="NomeEscolhaEletiva"></span>" ? Se sim, irá aumentar uma vaga na eletiva!</p>
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

<?php if(isset($_SESSION["ExcluirEletiva"])) {?>

<div id='ExcluirEletiva' class='PopUp-sobreposicao show'>
    <div class='conteudo-popup'>

        <div class="check">
            <img src="../public/assets/images/check.png" alt="">
        </div>
        <h2>SUCESSO!</h2>

        <p>A eletiva <span class="destacado"><?= $_SESSION["ExcluirEletiva"]?></span> foi excluída com sucesso! </p>
        <button onclick="Fechar_PopUp('ExcluirEletiva')" class='Fechar-Popup'>FECHAR</button>
    </div>
</div>
<?php unset($_SESSION["ExcluirEletiva"]); }?>


<div id='EletivaExcluir' class='PopUp-sobreposicao hide'>
    <div class='conteudo-popup'>

        <div class="check">
            <img src="../public/assets/images/duvida.png" alt="">
        </div>
        <h2><span id="nome-eletiva-excluir-popup">X</span></h2>

        <p>Tem Certeza que deseja excluir essa eletiva?</p>
        <div class="botoes">
            <button onclick="Fechar_PopUp('EletivaExcluir')">FECHAR</button>
            <a id="AncoraExcluirEletiva" href="">EXCLUIR</a>
        </div>
    </div>
</div>


<div id='StatusAlterar' class='PopUp-sobreposicao hide'>
    <div class='conteudo-popup'>

        <div class="check">
            <img src="../public/assets/images/duvida.png" alt="">
        </div>
        <h2>STATUS</h2>

        <p>Tem Certeza que deseja <span class="destacado" id="ValorStatus"></span> o sistema de <span
                id="NomeStatus"></span>?</p>
        <div class="botoes">
            <button onclick="Fechar_PopUp('StatusAlterar')">FECHAR</button>
            <a id="AncoraAlterarStatus" href="">ALTERAR</a>
        </div>
    </div>
</div>


<?php if(isset($_SESSION["StatusAlterado"])) {?>

<div id='StatusAlterado' class='PopUp-sobreposicao show'>
    <div class='conteudo-popup'>

        <div class="check">
            <img src="../public/assets/images/check.png" alt="">
        </div>
        <h2>SUCESSO!</h2>

        <p>O sistema de <span class="destacado"><?= $_SESSION["StatusAlterado"]["nome"]?></span> foi
            <?= $_SESSION["StatusAlterado"]["status"]?> com sucesso! </p>
        <button onclick="Fechar_PopUp('StatusAlterado')" class='Fechar-Popup'>FECHAR</button>
    </div>
</div>
<?php unset($_SESSION["StatusAlterado"]); }?>

<?php if(isset($_SESSION["EditarEletiva"])) {?>

<div id='EditarEletiva' class='PopUp-sobreposicao show'>
    <div class='conteudo-popup'>

        <div class="check">
            <img src="../public/assets/images/check.png" alt="">
        </div>
        <h2>SUCESSO!</h2>

        <p>A eletiva <span class="destacado"><?= $_SESSION["EditarEletiva"]?></span> foi editada com sucesso! </p>
        <button onclick="Fechar_PopUp('EditarEletiva')" class='Fechar-Popup'>FECHAR</button>
    </div>
</div>
<?php unset($_SESSION["EditarEletiva"]); }?>
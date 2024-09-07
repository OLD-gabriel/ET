<main class="min-vh-100">
    <div class="gestor-main">

        <div class="sidebar">
            <button class="menu-button" onclick="mostrarConteudo('content1')">
                <i class="fas fa-plus-circle"></i> Adicionar Eletiva
            </button>
            <button class="menu-button" onclick="mostrarConteudo('content2')">
                <i class="fas fa-list-ul"></i> Visualizar Eletivas
            </button>
            <button class="menu-button" onclick="mostrarConteudo('content3')">
                <i class="fas fa-tachometer-alt"></i> Gerenciar Eletivas
            </button>
            <button class="menu-button" onclick="mostrarConteudo('content4')">
                <i class="fas fa-info-circle"></i> Status
            </button>
        </div>

        <div class="content">
            <div id="content1" class="content-section active">

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
                                
                                <!-- Botão para selecionar todas as turmas desse turno -->
                                <button type="button" class="select-all-button" onclick="toggleSelection('<?= $turno ?>')"><i class="fas fa-tasks fa-1x"></i> Selecionar Tudo</button>

                                <div class="turmas-grid">
                                    <?php foreach ($turmas as $turma): ?>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="turmas[]" value="<?= $turma["nome"] ?>" id="turma-eletiva-<?= $turma["id"] ?>" class="turma-checkbox-<?= $turno ?>">
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
            <div id="content2" class="content-section">
                <div>
                    <div>
                        <p>AAAAAAA</p>
                    </div>
                </div>
                <h2>Dashboard</h2>
                <p>This is the dashboard section content.</p>
            </div>
            <div id="content3" class="content-section">
                <h2>Products</h2>
                <p>This is the products section content.</p>
            </div>
            <div id="content4" class="content-section">
                <h2>Customers</h2>
                <p>This is the customers section content.</p>
            </div>
        </div>
    </div>

</main>
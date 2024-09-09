function mostrarConteudo(id) {
    var conteudos = document.querySelectorAll('.content-section');
    conteudos.forEach(function(conteudo) {
        conteudo.classList.remove('active');
    });
    document.getElementById(id).classList.add('active');
}

function toggleSelection(turno) {
    const checkboxes = document.querySelectorAll('.turma-checkbox-' + turno);
    
    const filteredCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.type !== 'radio');
    
    const allChecked = filteredCheckboxes.every(checkbox => checkbox.checked);
    filteredCheckboxes.forEach(checkbox => checkbox.checked = !allChecked);
}

let allData = [];

async function fetchData() {
    try {
        const response = await fetch('../app/Config/Database/GetEscolhas.php');
        const data = await response.json();
        allData = data;
        filterAndUpdateTable();
    } catch (error) {
        console.error('Erro ao buscar dados:', error);
    }
}

function updateTable(data) {
    const tableBody = document.querySelector('#EscolhasEletivas tbody');
    tableBody.innerHTML = '';

    data.forEach(item => {
        const row = document.createElement('tr');

        row.innerHTML = `
            <td>${item.ra_aluno}</td>
            <td>${item.nome_aluno}</td>
            <td>${item.turno_aluno}</td>
            <td>${item.turma_aluno}</td>
            <td>${item.nome_eletiva}</td>
            <td><button class="delete-btn" onclick="PopUpExcluirEscolha('${item.id}', '${encodeURIComponent(item.nome_aluno)}', '${encodeURIComponent(item.nome_eletiva)}')"><i class="fas fa-trash-alt"></i></button></td>
        `;

        tableBody.appendChild(row);
    });
}

function filterAndUpdateTable() {
    const raValue = document.getElementById('searchRA').value.toLowerCase();
    const nomeValue = document.getElementById('searchNome').value.toLowerCase();
    const turnoValue = document.getElementById('searchTurno').value.toLowerCase();
    const eletivaValue = document.getElementById('searchEletiva').value.toLowerCase();

    const filteredData = allData.filter(item => {
        const raMatch = item.ra_aluno.toString().includes(raValue);
        const nomeMatch = item.nome_aluno.toLowerCase().includes(nomeValue);
        const turnoMatch = item.turno_aluno.toLowerCase().includes(turnoValue);
        const eletivaMatch = item.nome_eletiva.toLowerCase().includes(eletivaValue);

        return raMatch && nomeMatch && turnoMatch && eletivaMatch;
    });

    updateTable(filteredData);
}

document.getElementById('searchRA').addEventListener('input', filterAndUpdateTable);
document.getElementById('searchNome').addEventListener('input', filterAndUpdateTable);
document.getElementById('searchTurno').addEventListener('input', filterAndUpdateTable);
document.getElementById('searchEletiva').addEventListener('input', filterAndUpdateTable);

setInterval(fetchData, 500);
fetchData();


function exportToExcel() {
    const table = document.getElementById('EscolhasEletivas');
    const workbook = XLSX.utils.table_to_book(table, { sheet: 'Escolhas Eletivas' });
    XLSX.writeFile(workbook, 'Escolhas_Eletivas.xlsx');
}



document.addEventListener("DOMContentLoaded", function() {
    function atualizarVagas() {
        fetch('../app/Config/Database/GetEletivas.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(eletiva => {
                    const spanVagas = document.getElementById(`Eletiva-vagas-${eletiva.id}`);

                    if (spanVagas) {
                        spanVagas.textContent = `${eletiva.vagas}`;
                    }
                });
            })
    }

        atualizarVagas();
        setInterval(atualizarVagas, 500);
});



function EditarEletiva(id, nome, professores, turno, vagas, turmas) {
    document.getElementById('listar-eletivas').classList.add('hide');
    document.getElementById('editar-eletiva').classList.remove('hide');

    document.getElementById('editar-eletiva-nome').value = nome;
    document.getElementById('editar-vagas').value = vagas;

    const professoresArray = professores.split(';');
    document.getElementById('editar-professor1').value = professoresArray[0] || '';
    document.getElementById('editar-professor2').value = professoresArray[1] || '';
    document.getElementById('editar-professor3').value = professoresArray[2] || '';

    const turmasArray = turmas.split(';');
    document.querySelectorAll('input[name="editar-turmas[]"]').forEach(function (checkbox) {
        checkbox.checked = turmasArray.includes(checkbox.value);
    });

    const turnoRadio = document.querySelector(`input[name="editar-turno"][value="${turno}"]`);
    if (turnoRadio) {
        turnoRadio.checked = true;
    }

    document.getElementById('editar-eletiva-form').action = `eletiva/editar&id=${id}`;
}

function CancelarEdicao() {
    document.getElementById('editar-eletiva').classList.add('hide');
    document.getElementById('listar-eletivas').classList.remove('hide');

    document.getElementById('editar-eletiva-nome').value = '';
    document.getElementById('editar-vagas').value = '';
    document.getElementById('editar-professor1').value = '';
    document.getElementById('editar-professor2').value = '';
    document.getElementById('editar-professor3').value = '';
    document.querySelectorAll('input[name="editar-turmas[]"]').forEach(function (checkbox) {
        checkbox.checked = false;
    });
    document.querySelector('input[name="editar-turno"]:checked').checked = false;
}


function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('show'); 
  }

  function Retrair() {
    const sidebar = document.querySelector('.sidebar');
    const toggleButton = document.querySelector('.toggle-button i');
    
    sidebar.classList.toggle('retracted');

    toggleButton.classList.toggle('rotated');
}
  


document.addEventListener('DOMContentLoaded', function() {
    const nomeInput = document.getElementById('searchNomeEletiva');
    const turnoInput = document.getElementById('searchTurnoEletiva');
    const tabela = document.getElementById('tabelaEletivas');
    const linhas = tabela.querySelectorAll('tbody tr');

    function filtrarTabela() {
        const nomeFiltro = nomeInput.value.toLowerCase();
        const turnoFiltro = turnoInput.value.toLowerCase();

        linhas.forEach(function(linha) {
            const nome = linha.querySelector('td:nth-child(1)').textContent.toLowerCase();
            const turno = linha.querySelector('td:nth-child(3)').textContent.toLowerCase();

            const nomeCorrespondente = nome.includes(nomeFiltro);
            const turnoCorrespondente = turno.includes(turnoFiltro);

            if (nomeCorrespondente && turnoCorrespondente) {
                linha.style.display = '';
            } else {
                linha.style.display = 'none';
            }
        });
    }

    nomeInput.addEventListener('input', filtrarTabela);
    turnoInput.addEventListener('input', filtrarTabela);
});
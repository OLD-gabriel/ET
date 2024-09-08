function mostrarConteudo(id) {
    var conteudos = document.querySelectorAll('.content-section');
    conteudos.forEach(function(conteudo) {
        conteudo.classList.remove('active');
    });
    document.getElementById(id).classList.add('active');
}

function toggleSelection(turno) {
    const checkboxes = document.querySelectorAll('.turma-checkbox-' + turno);
    const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
    checkboxes.forEach(checkbox => checkbox.checked = !allChecked);
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
            <td>${item.nome_eletiva}</td>
            <td><button class="delete-btn" onclick="PopUpExcluirEscolha('${item.id}','${item.nome_aluno}','${item.nome_eletiva}')"><i class="fas fa-trash-alt"></i></button></td>
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

setInterval(fetchData, 10000);
fetchData();


function exportToExcel() {
    const table = document.getElementById('EscolhasEletivas');
    const workbook = XLSX.utils.table_to_book(table, { sheet: 'Escolhas Eletivas' });
    XLSX.writeFile(workbook, 'Escolhas_Eletivas.xlsx');
}
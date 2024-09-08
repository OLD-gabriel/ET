function verificarStatus() {
    fetch('app/Config/Database/GetLiberado.php')
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                const nome = item.nome;
                const status = item.status;

                if (nome === "ELETIVA") {
                    const eletivaLink = document.getElementById('link-eletiva');
                    const eletivaStatus = document.getElementById('status-eletiva');
                    
                    if (status == "1") {
                        eletivaLink.href = "eletivas";
                        eletivaStatus.classList.remove('status-bloqueado');
                        eletivaStatus.classList.add('status-liberado');
                        eletivaStatus.textContent = 'LIBERADO';
                    } else {
                        eletivaLink.href = "#";
                        eletivaStatus.classList.remove('status-liberado');
                        eletivaStatus.classList.add('status-bloqueado');
                        eletivaStatus.textContent = 'BLOQUEADO';
                    }
                } 
            });
        })
        .catch(error => console.error('Erro ao buscar o status:', error));
}

setInterval(verificarStatus, 500);

verificarStatus();


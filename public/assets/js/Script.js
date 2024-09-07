document.addEventListener("DOMContentLoaded", function() {
    function atualizarVagas() {
        fetch('app/Config/Database/GetEletivas.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(eletiva => {
                    const spanVagas = document.getElementById(`Eletiva-vagas-${eletiva.id}`);
                    const divEletiva = document.getElementById(`Eletiva-${eletiva.id}`);
                    let btnEscolher = divEletiva.querySelector('.btn-escolher');

                    if (spanVagas) {
                        if (eletiva.vagas === 0) {
                            divEletiva.style.backgroundColor = '#dcdcdc';

                            spanVagas.textContent = 'SEM VAGAS';

                            if (btnEscolher) {
                                btnEscolher.remove();
                            }

                            divEletiva.parentElement.appendChild(divEletiva);
                        } else {
                            divEletiva.style.backgroundColor = ''; 

                            if (!btnEscolher) {
                                btnEscolher = document.createElement('button');
                                btnEscolher.className = 'btn-escolher';
                                btnEscolher.textContent = 'ESCOLHER';

                                btnEscolher.setAttribute('onclick', `PopUpEscolherEletiva('${eletiva.id}', '${eletiva.nome_eletiva}')`);

                                divEletiva.appendChild(btnEscolher);
                            }
                        }
                        spanVagas.textContent = `${eletiva.vagas} VAGAS`;
                    }
                });
            })
            .catch(error => console.error('Erro ao buscar dados das eletivas:', error));
    }
    atualizarVagas();
    setInterval(atualizarVagas, 500);
});

const buttons = document.querySelectorAll('.menu-button');
const contentDivs = document.querySelectorAll('.content div');

buttons.forEach(button => {
    button.addEventListener('click', function() {
        const target = this.getAttribute('data-target');

        // Hide all content divs
        contentDivs.forEach(div => div.style.display = 'none');

        // Show the selected content
        document.getElementById(target).style.display = 'block';
    });
});

// Initially display the first content div
document.getElementById('content1').style.display = 'block';
document.addEventListener("DOMContentLoaded", function() {
    function atualizarVagas() {
        fetch('app/Config/Database/GetEletivas.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(eletiva => {
                    const spanVagas = document.getElementById(`Eletiva-vagas-${eletiva.id}`);
                    const divEletiva = document.getElementById(`Eletiva-${eletiva.id}`);
                    let btnEscolher = divEletiva ? divEletiva.querySelector('.btn-escolher') : null;

                    if (spanVagas && divEletiva) {
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
    }

    if (document.getElementById('TituloEscolherEletiva')) {
        atualizarVagas();
        setInterval(atualizarVagas, 500);
    }
});
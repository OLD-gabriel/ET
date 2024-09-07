

document.addEventListener("DOMContentLoaded", function() {
  function atualizarVagas() {
      fetch('app/Config/Database/GetEletivas.php')
          .then(response => response.json())
          .then(data => {
              data.forEach(eletiva => {
                  const spanVagas = document.getElementById(`Eletiva-vagas-${eletiva.id}`);
                  const divEletiva = document.getElementById(`Eletiva-${eletiva.id}`);
                  const btnEscolher = divEletiva.querySelector('.btn-escolher');

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
                              const btn = document.createElement('button');
                              btn.className = 'btn-escolher';
                              btn.textContent = 'ESCOLHER';
                              divEletiva.appendChild(btn);
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

function Fechar_PopUp(popup) {
    var popupElement = document.getElementById(popup);
    popupElement.classList.add("hide")
    popupElement.classList.remove("show")
  }
  
  
function Mostrar_PopUp(popup){
    var popupElement = document.getElementById(popup);
    popupElement.classList.add("show")
  popupElement.classList.remove("hide")
}
 

function PopUpEscolherEletiva(id,nome){

  document.getElementById('nome-eletiva-popup').innerHTML = nome
  document.getElementById('AncoraEscolherEletiva').href = "eletiva/escolher&id=" + id;
  Mostrar_PopUp("EletivaEscolher");
}

function PopUpExcluirEletiva(id,nome){

  document.getElementById('nome-eletiva-excluir-popup').innerHTML = nome
  document.getElementById('AncoraExcluirEletiva').href = "eletiva/excluir&id=" + id;
  Mostrar_PopUp("EletivaExcluir");
}

function PopUpStatusEletiva(nome,status){

  document.getElementById('ValorStatus').innerHTML = status
  document.getElementById('NomeStatus').innerHTML = nome
  document.getElementById('AncoraAlterarStatus').href = "status&nome=" + nome + "&status=" + status;
  Mostrar_PopUp("StatusAlterar");
}

function PopUpExcluirEscolha(id,nomeAluno,nomeEletiva){

  nomeAluno = decodeURIComponent(nomeAluno);
  nomeEletiva = decodeURIComponent(nomeEletiva);

  document.getElementById('NomeAlunoEscolhaEletiva').innerHTML = nomeAluno
  document.getElementById('NomeEscolhaEletiva').innerHTML = nomeEletiva
  document.getElementById('AncoraExcluirEscolha').href = "excluir/escolha&id=" + id;
  Mostrar_PopUp("EletivaEscolher");
}


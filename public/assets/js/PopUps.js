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

function PopUpExcluirEscolha(id,nomeAluno,nomeEletiva){

  document.getElementById('NomeAlunoEscolhaEletiva').innerHTML = nomeAluno
  document.getElementById('NomeEscolhaEletiva').innerHTML = nomeEletiva
  document.getElementById('AncoraExcluirEscolha').href = "excluir/escolha&id=" + id;
  Mostrar_PopUp("EletivaEscolher");
}
<?php 

namespace App\Controller\Eletivas;

use App\Controller\AbstractController;
use App\Model\Eletiva;

class EletivaEscolherController extends AbstractController
{
    public function index(array $requestData): void
    {
        if($_SESSION["LOGIN"]){
            $query = new Eletiva();
            $eletiva = $query->PegarEletiva($requestData["id"]);
            
            $dados = [
                "id_eletiva"    => $eletiva["id"],
                "nome_eletiva"  => $eletiva["nome_eletiva"],
                "ra_aluno"      => $_SESSION["RA"],
                "nome_aluno"    => $_SESSION["NOME"],
                "turma_aluno"   => $_SESSION["TURMA"],
                "turno_aluno"   => $_SESSION["TURNO"]
            ];

            $EletivaEscolhida = $query->pesquisarAlunoEletiva($_SESSION["RA"]);

            if($EletivaEscolhida == NULL){

                $liberado = $query->liberado();

                $status = [];
                foreach ($liberado as $eletiva) {
                    $status[$eletiva['nome']] = $eletiva['status'];
                }
                
                if($status["ELETIVA"] == "1"){
                    $inserir = $query->InserirAlunoEletiva($dados);

                if($inserir){
                    $vagas = $eletiva["vagas"] - 1;
                    $diminuir = $query->diminuirVagas($eletiva["id"],$vagas);
                    if($diminuir){
                        $_SESSION["EletivaEscolhida"] = TRUE;
                        $_SESSION["NomeEletivaEscolhida"] = $eletiva["nome_eletiva"];
                        $this->redirect("eletivas");
                    }else{
                        $_SESSION["ERRO"] = True;
                        $this->redirect("eletivas");
                    }
                }else{
                    $_SESSION["ERRO"] = True;
                    $this->redirect("eletivas");
                }
                }else{
                    $_SESSION["EletivaDesativada"] = True;
                    $this->redirect("/home");
                }
                
            }else{
                $_SESSION["EletivaJaEscolhida"] = True;
                $this->redirect("eletivas");  
            }

        }else{
            $this->redirect("/login");
        }
    }
}
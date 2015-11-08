<?php

require dirname(__FILE__) . '/../View/SiteView.php';
require dirname(__FILE__) . '/../Model/VagaModel.php';
require dirname(__FILE__) . '/../Model/InscricaoModel.php';
require dirname(__FILE__) . '/../Model/CandidatoModel.php';

class SiteController{

    public static function index()
    {
        // Carregar o site
        // Obter as vagas disponíveis
        $vagas = VagaModel::obterAtivas();
        // Exibir as vagas disponiveis
        SiteView::exibir('home.php',$vagas);
    }

    public static function exibirVaga($id)
    {
        // Obter a vaga
        $vaga = VagaModel::obterPorId($id);
//        var_dump($vaga);
//        die();
        // Exibir as vagas disponiveis
        SiteView::exibir('vaga.php',$vaga);
    }

    public static function inscreverVaga($id)
    {
        // Obter a vaga
        $vaga = VagaModel::obterPorId($id);
        if ($_SESSION==null || $_SESSION['id_candidato']==null){
            SiteView::exibir('login.php',$vaga);
        } else {
            // Verificar se já está inscrito
            $id_candidato = $_SESSION['id_candidato'];
            $inscrito = InscricaoModel::existeVagaCandidato($id,$id_candidato);
            if ($inscrito){
                SiteView::exibir('vaga_inscricao_confirmada.php',$vaga);
            } else {
                SiteView::exibir('vaga_inscrever.php',$vaga);
            }
        }
    }

    public static function inscreverVagaConfirmar($id_vaga)
    {
        // Obter a vaga
        $vaga = VagaModel::obterPorId($id_vaga);
        $id_candidato = $_SESSION['id_candidato'];
        $inscricao = InscricaoModel::inscrever($id_vaga,$id_candidato);
        SiteView::exibir('vaga_inscricao_confirmada.php',$vaga);
    }

    public static function login($email, $senha)
    {
        // Sanitizar
        $email = filter_var($email,FILTER_VALIDATE_EMAIL);
        $senha = filter_var($senha,FILTER_SANITIZE_STRING);
        $candidato = CandidatoModel::obterPorEmail($email);
        $retorno = array();
        if ($candidato!=false){
            if ($candidato->password==md5($senha)) {
                // Autentica-lo
                $retorno['sucesso'] = true;
                $retorno['nome'] = $candidato->nome;
                $_SESSION['id_candidato'] = $candidato->id;
                //            "autenticado: true";
                //            var_dump($candidato);
            } else {
                $retorno['sucesso']=false;
                $retorno['mensagem']="Senha incorreta!";
            }
        } else {
            // Retornar erro
            $retorno['sucesso']=false;
            $retorno['mensagem']="Usuário inexistente!";
        }
        echo json_encode($retorno);
    }

    public static function exibirPerfil()
    {
        $candidato = CandidatoModel::getCandidatoLogado();
//        var_dump($candidato);
//        die();
        SiteView::exibir('perfil.php',$candidato);
    }
}
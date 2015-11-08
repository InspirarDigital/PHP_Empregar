<?php

/**
 * Created by PhpStorm.
 * User: TiagoGouvea
 * Date: 07/11/15
 * Time: 16:12
 */
class CandidatoModel
{
    public static function obterPorEmail($email)
    {
        $sql = "select *
                from candidatos
                where email = '$email'";
        $result = Db::query($sql);
        if (count($result)==0){
            return false;
        } else if (count($result)==1){
            return $result[0];
        } else {
            return false;
        }
    }


    public static function obterPorId($id_candidato)
    {
        $sql = "select *
                from candidatos
                where id = '$id_candidato'";
        $result = Db::query($sql);
        if (count($result)==0){
            return false;
        } else if (count($result)==1){
            return $result[0];
        } else {
            return false;
        }
    }

    public static function getCandidatoLogado()
    {
        /* @var $candidato Candidato */
        $candidato = CandidatoModel::obterPorId($_SESSION['id_candidato']);

        return $candidato;
    }
}
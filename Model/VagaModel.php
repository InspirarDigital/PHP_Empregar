<?php

/**
 * Created by PhpStorm.
 * User: TiagoGouvea
 * Date: 31/10/15
 * Time: 14:51
 */
class VagaModel
{
    public static function obterAtivas()
    {
        // Obter todas empresas
        $sql = "select * from vagas where ativa=1";
        $result = Db::query($sql);
        return $result;
    }

    public static function obterPorId($id)
    {
        // Obter todas empresas
        $sql = "select * from vagas where id=$id";
        $result = Db::query($sql);
        if (count($result)==0){
            die("Vaga não encontrada");
        }
        return $result[0];
    }


}
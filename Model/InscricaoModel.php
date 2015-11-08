<?php

/**
 * Created by PhpStorm.
 * User: TiagoGouvea
 * Date: 31/10/15
 * Time: 17:40
 */
class InscricaoModel
{
    public static function inscrever($id_vaga, $id_candidato)
    {
        $sql = "insert into inscricoes
                (id_vaga,id_candidato)
                values
                (:id_vaga,:id_candidato)";
        $sucesso = Db::execute(
            $sql,
            array(
                'id_vaga'=>array(PDO::PARAM_INT,$id_vaga),
                'id_candidato'=>array(PDO::PARAM_INT,$id_candidato)
            )
        );
        return $sucesso;
    }

    public static function existeVagaCandidato($id, $id_candidato)
    {
        $sql = "select count(id) as qtd
                from inscricoes
                 where id_vaga=$id and id_candidato=$id_candidato";
        $result = Db::query($sql);
        return $result[0]->qtd>0;
    }
}
<?php
class EmpresaModel
{
    public static function todas()
    {
        // Obter todas empresas
        $sql = "select * from empresas";
        $result = Db::query($sql);
//        var_dump($result);
        // Retornar empresas
        return $result;
    }

    public static function incluir($dados)
    {
        $sql = "insert into empresas
                (razao_social,telefone)
                VALUES
                ('$dados[razao_social]','$dados[telefone]')";
        Db::execute($sql);
        return Db::getLastId();
    }

    public static function atualizar($dados,$id)
    {
        $sql = "update empresas
                set
                razao_social='$dados[razao_social]',
                telefone='$dados[telefone]'
                where id=$id";
//        var_dump($sql);
//        die();
       return Db::execute($sql);
    }

    public static function excluir($id)
    {
        $sql = "delete from empresas
                where id=$id";
        Db::execute($sql);
    }

    public static function obterPorId($id)
    {
        // Obter todas empresas
        $sql = "select * from empresas where id=$id";
        $result = Db::query($sql);
        $empresa = $result[0];
//        echo "<pre>";
//        var_dump($empresa);
//        var_dump($result);
//        die();
        // Retornar empresas
        return $empresa;
    }
}
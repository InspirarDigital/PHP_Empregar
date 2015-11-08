<?php
class Db{
    /* @var $conexao_pdo PDO */
    private static $conexao_pdo;

    public static function query($sql)
    {
        $pst=self::$conexao_pdo->prepare($sql);
        $sucesso = $pst->execute();
        if (!$sucesso) {
            echo "<br /><br />Erro na query: $sql<br /><br />";
            print_r($pst->errorInfo());
        }
        return $pst->fetchAll(PDO::FETCH_OBJ);
    }

    public static function execute($sql,$params)
    {
        $pst=self::$conexao_pdo->prepare($sql);
        if ($params)
            foreach($params as $param=>$value){
                $tipo=$value[0];
                $valor = $value[1];
//                echo "pst->bindParam($param,$valor,$tipo)";
                $pst->bindParam($param,$valor,$tipo);
            }
        $sucesso = $pst->execute();
        if (!$sucesso) {
            echo "<br /><br />Erro na query: $sql<br /><br />";
            print_r($pst->errorInfo());
        }
        return $sucesso;
    }

    public static function getLastId()
    {
        return self::$conexao_pdo->lastInsertId();
    }

    public static function conectar($base,$usuario,$senha,$host)
    {
        self::$conexao_pdo = null;
        $detalhes_pdo = 'mysql:host=' . $host . ';dbname='. $base;
        try {
            self::$conexao_pdo = new PDO(
                $detalhes_pdo,$usuario,$senha);
            self::$conexao_pdo->exec("set names utf8");
        } catch (PDOException $e) {
            print "Erro: " . $e->getMessage() . "<br>";
            die();
        }
    }



}
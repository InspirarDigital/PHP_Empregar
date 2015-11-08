<?php
/**
 * Created by PhpStorm.
 * User: TiagoGouvea
 * Date: 31/10/15
 * Time: 14:45
 */

class SiteView {
    public static function exibir($arquivo,$dados=null)
    {
        // Obter o centro (lista de empresas)
        $arquivoCentro = dirname(__FILE__) . '/../View/Site/'.$arquivo;
        if (!file_exists($arquivoCentro)){
            die("arquivo $arquivoCentro não existe!");
        }
        // Carregar o layout + centro (lista de empresas)
        require dirname(__FILE__).'/Site/layout.php';
    }
}
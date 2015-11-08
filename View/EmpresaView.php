<?php
/**
 * Created by PhpStorm.
 * User: TiagoGouvea
 * Date: 24/10/15
 * Time: 17:03
 */
class EmpresaView {
    public static function exibir($arquivo,$dados=null)
    {
        // Obter o centro (lista de empresas)
        $arquivoCentro = dirname(__FILE__) . '/../View/Empresa/'.$arquivo;
        // Carregar o layout + centro (lista de empresas)
        require dirname(__FILE__).'/Admin/layout.php';
    }
}
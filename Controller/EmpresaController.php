<?php

require dirname(__FILE__) . '/../Model/EmpresaModel.php';
require dirname(__FILE__) . '/../View/EmpresaView.php';

class EmpresaController
{
    public static function listar()
    {
//        echo "Listar empresas!";
        $empresas = EmpresaModel::todas();
        EmpresaView::exibir('listar.php', $empresas);
    }

    public static function editar($id)
    {
        $empresa = EmpresaModel::obterPorId($id);
//        var_dump($empresa);
//        die();
        EmpresaView::exibir('formulario.php', $empresa);
    }

    public static function incluir()
    {
        EmpresaView::exibir('formulario.php');
    }

    public static function salvar($id = null)
    {
        // Validar
        if ($id == null)
            $sucesso = EmpresaModel::incluir($_POST)!=null;
        else
            $sucesso = EmpresaModel::atualizar($_POST,$id);

        $app = \Slim\Slim::getInstance();
        if ($sucesso)
            $app->flashNow('info', 'Registro salvo com sucesso!');
        else
            $app->flashNow('error', 'Erro ao salvar registro!');

        self::listar();
    }

    public static function excluir($id)
    {
        EmpresaModel::excluir($id);
        self::listar();
    }
}
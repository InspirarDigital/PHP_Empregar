<?php
/**
 * Created by PhpStorm.
 * User: TiagoGouvea
 * Date: 17/10/15
 * Time: 14:54
 */
require 'vendor/autoload.php';
require 'lib/Db.php';

if ($_SERVER['SERVER_NAME'] == 'localhost')
    require 'config_dev.php';
else
    require 'config_prod.php';
session_start();
//session_destroy();
// Conectar com o banco de dados
Db::conectar($dbname, $user, $password, $host);

$app = new \Slim\Slim();

require 'Controller/SiteController.php';
$app->get('/', function () {
    SiteController::index();
});

$app->post('/login/', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json');
    SiteController::login($_POST['email'], $_POST['senha']);
});

$app->get('/perfil/', function () use ($app) {
    //  Exibir perfil do usuário
    SiteController::exibirPerfil();
});

$app->post('/perfil/', function () use ($app) {
    // Atualizar foto do usuário
    require 'lib/Imagem.php';
    $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $arquivo = dirname(__FILE__) . '/public/img/' . $_SESSION['id_candidato'] . '.' . $ext;
    move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        $arquivo
    );
    smart_resize_image($arquivo, null, 300, 300, false, 'file', $arquivo, false, false, 50);
    SiteController::exibirPerfil();
});

$app->get('/vaga/:id/', function ($id) {
    SiteController::exibirVaga($id);
});
$app->get('/vaga/:id/inscrever/', function ($id) {
    SiteController::inscreverVaga($id);
});
$app->post('/vaga/:id/inscrever/', function ($id) {
    SiteController::inscreverVagaConfirmar($id);
});


$app->group('/admin', function () use ($app) {
    $app->get('/', function () {
        require 'View/Admin/layout.php';
    });
    $app->group('/empresa', function () use ($app) {
        require 'Controller/EmpresaController.php';
        $app->get('/', function () {
            EmpresaController::listar();
        });
        $app->get('/incluir/', function () {
            EmpresaController::incluir();
        });

        $app->post('/incluir/', function () {
            EmpresaController::salvar();
        });
        $app->get('/:id/excluir/', function ($id) {
            EmpresaController::excluir($id);
        });

        $app->get('/:id/editar/', function ($id) {
            EmpresaController::editar($id);
        });
        $app->post('/:id/editar/', function ($id) {
            EmpresaController::salvar($id);
        });
    });
});

$app->run();
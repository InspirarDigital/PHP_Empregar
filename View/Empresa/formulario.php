<?php
$incluindo = $dados==null;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
                    <?php echo ($incluindo ? "Incluir": "Editar")." Empresa"; ?>
                </h5>

                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post">
                    <div class="form-group"><label class="col-lg-2 control-label">Razão Social</label>
                        <div class="col-lg-10"><input type="text" name="razao_social" value="<?= ($incluindo? null: $dados->razao_social); ?>" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Telefone</label>

                        <div class="col-lg-10"><input type="text" name="telefone" value="<?php echo $dados->telefone; ?>" placeholder="" class="form-control"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" class="btn btn-sm btn-white" value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

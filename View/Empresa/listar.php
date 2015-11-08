<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Empresas</h5>

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

                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Empresa</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dados as $registro): ?>
                        <tr>
                            <td><?php echo $registro->id; ?></td>
                            <td><?php echo $registro->razao_social; ?></td>
                            <td><?php echo $registro->telefone; ?></td>
                            <td>
                                <a href="./admin/empresa/<?php echo $registro->id; ?>/editar/">
                                    <i class="fa fa-pencil text-navy"></i>
                                </a>
                                <a href="./admin/empresa/<?php echo $registro->id; ?>/excluir/">
                                    <i class="fa fa-trash text-navy"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
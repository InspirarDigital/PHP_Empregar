<?php $vaga = $dados; ?>
<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2><?php echo $vaga->titulo; ?></h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="portfolio-item" id="vagas">
                <div class="caption">
                    <div class="caption-content">
                    </div>
                </div>

                <hr>
                <span style="font-size:22px;"><?php echo $vaga->descricao; ?></span><br>
                <hr>
                Área: <?php echo $vaga->area; ?><br>
                Data Limite de inscrição: <?php echo $vaga->data_limite; ?><br>
                Salário: <?php echo $vaga->salario; ?><br>
                <hr>
                <h3>Benefícios</h3>
                <?php echo $vaga->beneficios; ?><br>
                <h4>Local seleção</h4>
                <?php echo $vaga->local_selecao; ?><br>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-12">
                <a href="../vaga/<?php echo $vaga->id; ?>/inscrever/" class="btn btn-success btn-lg">Me inscrever</a>
            </div>
        </div>

    </div>
</section>
<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Vagas em aberto</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <?php foreach($dados as $vaga): ?>
                <div class="col-sm-4 portfolio-item" id="vagas">
                    <a href="../vaga/<?php echo $vaga->id; ?>/" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                            </div>
                        </div>
                        <?php echo $vaga->titulo; ?><br>
                        <?php echo $vaga->area; ?><br>
                        <?php echo $vaga->data_limite; ?><br>
                        <?php echo $vaga->salario; ?><br>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
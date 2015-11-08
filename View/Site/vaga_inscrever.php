<?php $vaga = $dados; ?>
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2><?php echo $vaga->titulo; ?></h2>
                <h3>Inscrever para vaga</h3>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <?php echo $vaga->descricao; ?>
            </div>
        </div>
        <hr>
        <form method="post">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-success btn-lg">Confirmar inscrição</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</section>
<?php $candidato = $dados; ?>
<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2><?php echo $candidato->nome; ?></h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="portfolio-item" id="vagas">
                <div class="caption">
                    <div class="caption-content">
                    </div>
                </div>

                <form method="post" enctype="multipart/form-data">
                <h3>Foto</h3>

                    <img src="<?php echo "../img/".$candidato->id.".jpg"; ?>" alt="<?php echo $candidato->nome; ?>">

                    <hr>
                    Alterar foto:

                    <input type="file" name="foto" accept="image/*">

                    <div class="row">
                        <div class="form-group col-xs-12">
                            <input type="submit" value="Salvar" class="btn btn-success btn-lg">
                        </div>
                    </div>

                </form>

            </div>
        </div>


    </div>
</section>
<!-- Buffer temporisation -->
<?php ob_start() ?>

<!-- Mise à jour variable de session -->
<?php $_SESSION['view'] = "accueil";  ?>

<!-- Contenu page -->
<div class="container">

    <div class="row">
        <div class="col-md-6 mx-auto mt-5">
            <h1>La <span id="whiteMarkUp">bibliothèque</span> de poche!</h1>
        </div>
    </div>

    <div class="row">
        <div id="carouselExampleControls" class="carousel carousel-dark slide col-10 col-md-6 col-lg-5 mx-auto mb-3" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class='mt-3'>
                    <h6>A la une</h6>
                </div>
                <?php for ($i = 0; $i < count($livres); $i++) : ?>

                    <div class="carousel-item <?php echo ($i === 0) ? "active" : "" ?> ">
                        <div class='col-md-auto text-center'>
                            <a href="<?= URL ?>livres/R/<?= $livres[$i]->getId(); ?>"><img src="public/images/<?= $livres[$i]->getImage() ?>" class="img-fluid d-block w-100" alt="<?= $livres[$i]->getImage() ?>"></a>
                        </div>
                    </div>

                <?php endfor; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6 mx-auto mt-3 mb-5">
            <h2>Pour accéder aux <span id="whiteMarkUp">idées</span> des meilleurs livres, en quelques minutes, sur tous les supports...</h2>
        </div>
    </div>

</div>

<!-- Chargement template avec contenu buffer -->
<?php
$content = ob_get_clean();
$titre = "";
$description = "Page d'accueil";

require "template.php";
?>
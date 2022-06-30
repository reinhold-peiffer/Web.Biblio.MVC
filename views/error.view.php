<?php
ob_start();
?>

<div class="container">

    <div class="row">
        <img src="<?= URL ?>public/images/warning.svg" class="col-lg-3 mx-auto" alt="warning.svg">
    </div>

    <div class="row">
        <a href="<?= URL ?>accueil" class="btn btn-secondary col-3 mx-auto mt-5 mb-5">Fermer</a>
    </div>

</div>



<?php
$content = ob_get_clean();
$titre = $msg;
$description = "Page d'erreurs";

require "template.php";
?>
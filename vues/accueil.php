<?php
$titre = 'Accueil';
ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-0 col-lg-1 col-xl-2">
    </div>
    <div class="col-12 col-lg-10 col-xl-8">


    <div class="mt-2">
        <a href="#" class="add-link">Générer ?</a>
    </div>

</div>



<?php
$contenu = ob_get_clean();
require_once('layout.php');
<?php
$titre = 'Accueil';

$diane = "<span class='diane'>DIANE LESPIGNANAISE</span>";





ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-0 col-lg-1 col-xl-2">
    </div>
    <div class="col-12 col-lg-10 col-xl-8">



    <!-- GENERATION TABLEAU -->
    <!-- <button type="button" name="genereliste" id="genereliste" onclick="genereListe()">Générer liste</button> -->
    <button type="button" name="printbutton" id="printbutton" onclick="handleClickPrint()" class="inutile et-button">Imprimer</button>
    <table id="tableEtiquettes" class="et-table">
    <tbody>
      <!-- Rappel : pays = chasseur -->
      <?php foreach ($payss as $pays): ?>
        <?php foreach ($animals as $animal): ?>
          <?php foreach ($dates as $date): ?>

            <tr><td><?= $diane ?><br/><span class='et-nom'><?= $pays->getNom() ?> <?= $pays->getPrenom() ?></span><br/><?= $animal->getNom() ?><br/><?= $date->getDateLong() ?></td>
            <td><?= $diane ?><br/><span class='et-nom'><?= $pays->getNom() ?> <?= $pays->getPrenom() ?></span><br/><?= $animal->getNom() ?><br/><?= $date->getDateLong() ?></td></tr>
            
          <?php endforeach; ?>
        <?php endforeach; ?>
      <?php endforeach; ?>

    </tbody>
    </table>
    <!-- FIN GENERATION TABLEAU -->


</div>



<?php
$contenu = ob_get_clean();
require_once('layout.php');
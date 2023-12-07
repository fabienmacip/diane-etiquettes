<?php
$titre = 'Accueil';

$diane = "<div class='et-diane'>DIANE LESPIGNANAISE</div>";
$dianeBlanc = "<div class='et-diane et-blanc'>DIANE LESPIGNANAISE</div>"; // pour étiquettes vides (voir PERDREAU)





ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-0 col-lg-1 col-xl-2">
    </div>
    <div class="col-12 col-lg-10 col-xl-8">

    <div class="confidentiel my-5">
      Pour des raisons de confidentialit&eacute;, vous devez être connecté pour voir la liste des chasseurs.
    </div>

    <!-- GENERATION TABLEAU -->
    <!-- <button type="button" name="genereliste" id="genereliste" onclick="genereListe()">Générer liste</button> -->
    <button type="button" name="printbutton" id="printbutton" onclick="handleClickPrint()" class="inutile et-button">Imprimer</button>
    <table id="tableEtiquettes" class="et-table">
    <tbody>
      <!-- Rappel : pays = chasseur 
           D'abord, on n'affiche que les LIEVRES
      -->
      <?php foreach ($payss as $pays): ?>
        <?php
           foreach ($animals as $animal): 
        
            // PERDREAU
            if($animal->getNom() !== "LIEVRE") {
              $cpt = 0;
              foreach ($dates as $date): 
              $cpt++;
              ?>
              
              <tr class='tr-perdreau'>
                <td>
                  <?= $diane ?>
                  <div class='et-nom'><?= $pays->getNom() ?> <?= $pays->getPrenom() ?></div>
                  <div class='et-animal'><?= $animal->getNom() ?></div>
                  <div class='et-date <?= $animal->getPolice() ?>'><?= $date->getDateLong() ?></div>
                </td>
                <td>
                  <?= $diane ?>
                  <div class='et-nom'><?= $pays->getNom() ?> <?= $pays->getPrenom() ?></div>
                  <div class='et-animal'><?= $animal->getNom() ?></div>
                  <div class='et-date <?= $animal->getPolice() ?>'><?= $date->getDateLong() ?></div>
                </td>
              </tr>

              <?php endforeach; 
              while($cpt < 4) {
                  /* Remplissage de lignes blanches pour imprimer les étiquettes PERDREAU 
                     par nombre pair, afin d'avoir toutes celles d'un chasseur sur la même page */
                  ?>
                  
                     <tr class='tr-perdreau'>
                        <td>
                          <?= $dianeBlanc ?>
                          <div class='et-nom et-blanc'><?= $pays->getNom() ?> <?= $pays->getPrenom() ?></div>
                          <div class='et-animal et-blanc'><?= $animal->getNom() ?></div>
                          <div class='et-date  et-blanc <?= $animal->getPolice() ?>'><?= $date->getDateLong() ?></div>
                        </td>
                        <td>
                          <?= $dianeBlanc ?>
                          <div class='et-nom et-blanc'><?= $pays->getNom() ?> <?= $pays->getPrenom() ?></div>
                          <div class='et-animal et-blanc'><?= $animal->getNom() ?></div>
                          <div class='et-date  et-blanc <?= $animal->getPolice() ?>'><?= $date->getDateLong() ?></div>
                        </td>
                     </tr>
                  
                  <?php
                  $cpt++;
              }
              // LIEVRE
              } elseif($animal->getNom() === "LIEVRE") {

              for($i = 0 ; $i < 2 ; $i++) { ?>
              <tr class='tr-lievre'>
                <td>
                  <?= $diane ?>
                  <div class='et-nom'><?= $pays->getNom() ?> <?= $pays->getPrenom() ?></div>
                  <div class='et-animal'>LIEVRE</div>
                  <div class='et-date'>2023</div>
                </td>
                <td>
                  <?= $diane ?>
                  <div class='et-nom'><?= $pays->getNom() ?> <?= $pays->getPrenom() ?></div>
                  <div class='et-animal'>LIEVRE</div>
                  <div class='et-date'>2023</div>
                </td>
              </tr>

            <?php
               }// end for
              } // end if
             ?>
          

            
          <?php endforeach; ?>
      <?php endforeach; ?>

      <!-- Rappel : pays = chasseur 
           Puis, on n'affiche que les PERDREAUX
      -->
      <?php foreach ($payss as $pays): ?>
        <?php
           foreach ($animals as $animal): 
        
            // PERDREAU
            if($animal->getNom() !== "LIEVRE") {
              $cpt = 0;
              foreach ($dates as $date): 
              $cpt++;
              ?>
              
              <tr class='tr-perdreau'>
                <td>
                  <?= $diane ?>
                  <div class='et-nom'><?= $pays->getNom() ?> <?= $pays->getPrenom() ?></div>
                  <div class='et-animal'><?= $animal->getNom() ?></div>
                  <div class='et-date <?= $animal->getPolice() ?>'><?= $date->getDateLong() ?></div>
                </td>
                <td>
                  <?= $diane ?>
                  <div class='et-nom'><?= $pays->getNom() ?> <?= $pays->getPrenom() ?></div>
                  <div class='et-animal'><?= $animal->getNom() ?></div>
                  <div class='et-date <?= $animal->getPolice() ?>'><?= $date->getDateLong() ?></div>
                </td>
              </tr>

              <?php endforeach; 
              while($cpt < 4) {
                  /* Remplissage de lignes blanches pour imprimer les étiquettes PERDREAU 
                     par nombre pair, afin d'avoir toutes celles d'un chasseur sur la même page */
                  ?>
                  
                     <tr class='tr-perdreau'>
                        <td>
                          <?= $dianeBlanc ?>
                          <div class='et-nom et-blanc'><?= $pays->getNom() ?> <?= $pays->getPrenom() ?></div>
                          <div class='et-animal et-blanc'><?= $animal->getNom() ?></div>
                          <div class='et-date  et-blanc <?= $animal->getPolice() ?>'><?= $date->getDateLong() ?></div>
                        </td>
                        <td>
                          <?= $dianeBlanc ?>
                          <div class='et-nom et-blanc'><?= $pays->getNom() ?> <?= $pays->getPrenom() ?></div>
                          <div class='et-animal et-blanc'><?= $animal->getNom() ?></div>
                          <div class='et-date  et-blanc <?= $animal->getPolice() ?>'><?= $date->getDateLong() ?></div>
                        </td>
                     </tr>
                  
                  <?php
                  $cpt++;
              }
              // LIEVRE
              } elseif($animal->getNom() === "LIEVRE") {

              for($i = 0 ; $i < 2 ; $i++) { ?>
              <tr class='tr-lievre'>
                <td>
                  <?= $diane ?>
                  <div class='et-nom'><?= $pays->getNom() ?> <?= $pays->getPrenom() ?></div>
                  <div class='et-animal'>LIEVRE</div>
                  <div class='et-date'>2023</div>
                </td>
                <td>
                  <?= $diane ?>
                  <div class='et-nom'><?= $pays->getNom() ?> <?= $pays->getPrenom() ?></div>
                  <div class='et-animal'>LIEVRE</div>
                  <div class='et-date'>2023</div>
                </td>
              </tr>

            <?php
               }// end for
              } // end if
             ?>
          

            
          <?php endforeach; ?>
      <?php endforeach; ?>


    </tbody>
    </table>
    <!-- FIN GENERATION TABLEAU -->


</div>



<?php
$contenu = ob_get_clean();
require_once('layout.php');
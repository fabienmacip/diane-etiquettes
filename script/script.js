//  ##############  MISSION - 1 ###################

// ########################            CHARGEMENT PAGE OK              #############################

// Fin du chargement de la page.
$(document).ready(() => {
let pageMission ='';
/*   if (pageMission = document.getElementById('form-create-mission'))  {
      // ########### PLANQUES ##############
      // On affecte la liste des planques dans une variable en JS
      let listePlanques = [];
      $('#listePlanques div input[type=checkbox]').each(function(){
        listePlanques.push(this.value);
      });

      // ########### AGENTS #############

      // On affecte la liste des agents dans une variable en JS
      let listeAgents = [];
      // On les trie selon la spécialité, afin d'obliger à choisir au moins un agent de la même
      // spécialité que la mission
      let listeSpecialitesDesAgents = [];
      $('#listeAgents div input[type=checkbox]').each(function(){
        // Génération de la liste des agents
        listeAgents.push([this.value,$('#paysAgent'+this.value).val()]);
        // Génération de liste des spécialités de chaque agent
        listeSpecialitesDesAgents.push([this.value,$('#specialitesAgent'+this.value).val()]);
      });

      majSpecialiteMission($('#form-create-mission div #specialite').val(),listeSpecialitesDesAgents);

      // ############# SPECIALITES #############
      $('#form-create-mission div #specialite').on('change', function() {
        majSpecialiteMission(this.value, listeSpecialitesDesAgents);
      });


      // ########### CIBLES ##############
      // On affecte la liste des cibles dans une variable en JS
      let listeCibles = [];
      $('#listeCibles div input[type=checkbox]').each(function(){
        listeCibles.push(this.value);
      });  

      // ########### CONTACTS ##############
      // On affecte la liste des cibles dans une variable en JS
      let listeContacts = [];
      $('#listeContacts div input[type=checkbox]').each(function(){
        listeContacts.push(this.value);
      });  

      // ####### PLANQUES et CONTACTS ##########
      // Masquer toutes les planques et tous les contacts qui ne sont pas du pays.
      majListePlanquesContacts($('#form-create-mission div #pays').val(), listePlanques, listeContacts);

      // A chaque changement de sélection du pays, masquer toutes les "planques et contacts" qui ne sont pas du pays.
      $('#form-create-mission div #pays').on('change', function() {
        majListePlanquesContacts(this.value, listePlanques, listeContacts);
      });

      // La liste d'agents contient des tableaux : id_agent et id_pays_de_l_agent
      $('#form-create-mission #listeCibles div input[type=checkbox]').on('click', function() {
        //majListeAgents($('#cible'+this.value).val(),$('#paysCible'+this.value).val(), listeAgents);
        majListeAgents(listeCibles, listeAgents);
      });

      // Activer le bouton de validation du formulaire de création d'agent quand on a choisi au moins
      // un agent de la bonne spécialité
      $('#form-create-mission #listeAgents div input[type=checkbox]').on('click', function() {
        verifAuMoinsUnAgentSpe();
      });
      
      
    } */ // FIN du IF pageMission

    // Si on n'est pas ADMIN connecté, alors on n'accède pas aux formulaires de CRUD.
    if($('#isAdmin').val() != 1) {
      $('form').hide(); 
      /* $('button').hide(); */
      $('button ').prop('disabled',true);
      $('button').addClass('inactif');
      $('#form-connexion').show();
      /* $('.btn-connexion').show(); */
      $('.btn-connexion').prop('disabled',false);
      $('.btn-connexion').removeClass('inactif');
      /* $('#navbarDropdown').prop('disabled',false); */

      $('.add-link').hide();

      // Formulaires de création ayant l'icône PLUS
/*       $('#pre-form-create-mission').hide();
      $('#pre-form-create-personne').hide();
      $('#pre-form-create-planque').hide(); */
    } else {
      $('form').show();
      /* $('button').show(); */
      $('button').prop('disabled',false);
      $('#les-admins #tr1 [type=button]').prop('disabled',true).css('background-color','grey').css('border-color','grey');
    }
    




}) // FIN DU document.READY

//  ##############  MISSION - 2  ###################


// ##############  PAYS  ###################

// Affiche le formulaire de modification du pays
function displayUpdatePays(id, nom, prenom){

  let updateForm = '<form method="post" action="index.php">' + 
                '<div class="form-group row my-3">' +
                '<div class="col-12 col-lg-6 mb-3 mb-lg-0 d-flex align-items-start">' +
                '<label for="nom"></label><input type="text" maxlength="50" name="nom" value="'+ nom + '" id="nom" placeholder="'+ nom + '" class="form-control">' +
                '</div>' +
                '<div class="col-12 col-lg-6 mb-3 mb-lg-0 d-flex align-items-start">' +
                '<label for="prenom"></label><input type="text" maxlength="50" name="prenom" value="'+ prenom + '" id="prenom" placeholder="'+ prenom + '" class="form-control">' +
                '</div>' +
                '<div class="col-12 col-lg-6 d-flex justify-content-around align-items-start mt-2"><input type="hidden" name="idPaysToUpdate" id="idPaysToUpdate" value="' + id + '">' +
                '<input type="hidden" name="action" id="action" value="updatePays">' +
                '<input type="hidden" name="page" id="page" value="payss">' +
                '<button type="reset" class="btn btn-primary">Reset</button>' +
                '<button type="button" id="annuler" class="btn btn-primary">Annuler</button>' +
                '<button type="submit" class="btn btn-primary">Envoyer</button></div></div>' +
                '</form>';

  //let codeAConserver = $(`#tr${id}`);
  let codeAConserver = $('#tr'+id);
  $('#tr'+id).replaceWith("<tr id='tr"+id+"'><td colspan='4'>" + updateForm + "</td></tr>");

  // On frise tous les autres boutons "Modifier"
  $('.updatePays').prop('disabled',true);


  // Si on clique sur ANNULER, on ré-affiche la ligne normale -> codeAConserver
  $( "#annuler" ).click(function() {
    $('#tr'+id).replaceWith(codeAConserver);
    $('.updatePays').prop('disabled',false);
  });
}

// Confirme suppression d'un Pays
function confirmeSuppressionPays(id,nom){
  
  let lien = "index.php?page=payss&action=delete&id=" + id + "&nom="+ nom;

  if(confirm("Supprimer " + nom + " ?")){
    window.location.href = lien;
      
  } 
}



// ####################  ADMINISTRATEUR ####################

// Affiche le formulaire de modification d'un administrateur
function displayUpdateAdministrateur(id, nom, prenom, mail){

  let updateForm = '<form method="post" action="index.php">' + 
                '<div class="form-group row my-3">' +
                '<div class="col-7 col-lg-3 form-floating"><input type="text" maxlength="40" name="nom" value="'+ nom + '" id="nom" placeholder="'+ nom + ' " class="form-control"><label for="nom">Nom</label></div>' +
                '<div class="col-7 col-lg-3 form-floating"><input type="text" name="prenom" value="'+ prenom + '" maxlength="30" id="prenom" placeholder="' + prenom + '" class="form-control"><label for="prenom">Pr&eacute;nom</label></div>' +
                '<div class="col-7 col-lg-3 form-floating"><input type="mail" name="mail" value="' + mail + '" maxlength="50" id="mail" placeholder="' + mail + '" class="form-control"><label for="mail">Mail</label></div>' +
                '<div class="col-7 col-lg-3 form-floating"><input type="text" name="mot_de_passe" value="" minlength="8" maxlength="40" id="mot_de_passe" placeholder="" class="form-control"><label for="mot_de_passe">Mot de passe</label><span style="font-size: 0.7rem;">(laisser vide si vous ne souhaitez pas modifier)</span></div></div>' +               
                '<div class="row text-center"><div class="col-0 col-lg-3"><input type="hidden" name="idAdministrateurToUpdate" id="idAdministrateurToUpdate" value="' + id + '">' +
                '<input type="hidden" name="action" id="action" value="update">' +
                '<input type="hidden" name="page" id="page" value="administrateurs"></div>' +
                '<div class="col-7 col-lg-6 d-flex justify-content-around"><button type="reset" class="btn btn-primary">Reset</button>' +
                '<button type="button" id="annuler" class="btn btn-primary">Annuler</button>' +
                '<button type="submit" class="btn btn-primary">Envoyer</button></div><div class="col-0 col-lg-3"></div></div>' +
                '</form>';

  let codeAConserver = $('#tr'+id);
  $('#tr'+id).replaceWith("<tr id='tr"+id+"'><td colspan='7'>" + updateForm + "</td></tr>");

  // On frise tous les autres boutons "Modifier"
  $('.updateAdministrateur').prop('disabled',true);


  // Si on clique sur ANNULER, on ré-affiche la ligne normale -> codeAConserver
  $( "#annuler" ).click(function() {
    $('#tr'+id).replaceWith(codeAConserver);
    $('.updateAdministrateur').prop('disabled',false);
  });
}

// Confirme suppression d'un administrateur
function confirmeSuppressionAdministrateur(id, nom, prenom){
  
  let lien = "index.php?page=administrateurs&action=delete&id=" + id + "&nom="+ nom + "&prenom="+ prenom;

  if(confirm("Supprimer " + nom + " " + prenom + " ?")){
    // Supprimer la ligne dans la BDD
    window.location.href = lien;
  }
}



function alertMe() {
  alert("Cliqué ! ");
}



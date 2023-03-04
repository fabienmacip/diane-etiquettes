<?php
session_start();

////////////////////////////////////////////////////////////////
/* $pdo = null;

try {
    //$pdo = new PDO('mysql:host=localhost;dbname=spy;charset=utf8', 'root', '');
    $pdo = new PDO('mysql:host=91.216.107.161;dbname=fatab195806_9ectvj;charset=utf8', 'fatab195806', '!Angular20');
    } catch (PDOException $e) {
        exit('Erreur : '.$e->getMessage());
    } */
require_once('modeles/ConnectMe.php');
//use ConnectMe;
////////////////////////////////////////////////////////////////

require_once('controleurs/controleur.php');
require_once('modeles/Modele.php');
require_once('modeles/Pays.php');
require_once('modeles/Payss.php');
require_once('modeles/Administrateur.php');
require_once('modeles/Administrateurs.php');

/* $LISTE_PAYS = "index.php?page=payss";
$LISTE_SPECIALITES = "index.php?page=specialites";
$LISTE_TYPE_MISSIONS = "index.php?page=typemissions";
$LISTE_PLANQUES = "index.php?page=planques";
$LISTE_PERSONNES = "index.php?page=personnes";
$LISTE_MISSIONS = "index.php?page=missions";
$LISTE_ADMINISTRATEURS = "index.php?page=administrateurs"; */

$controleur = new Controleur($pdo);

/* var_dump($_POST);
foreach($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars($value);
    echo "La clé ".$key." est ".$_POST[$key].PHP_EOL;
}
var_dump('AFTER');
var_dump($_POST); */

if(isset($_POST['action']) && 'connexion' === $_POST['action']) {
    $controleur->verifConnexion($_POST['mail'], $_POST['password']);
}

/* if(isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {
    $connecte = true;
} else {
    $connecte = false;
} */


// Par défaut, index.php affiche la liste des missions (voir le dernier ELSE)
// Connexion / Déconnexion des admins
if(isset($_GET['page']) && 'connexion' === $_GET['page']) {
    $controleur->connexion();
} else if (isset($_GET['page']) && 'deconnexion' === $_GET['page']) {
    $controleur->deconnexion();

}// CHASSEUR - CRUD
// CHASSEUR - CREATE
elseif (isset($_POST['page']) && 'payss' === $_POST['page'] && isset($_POST['action']) && 'createPays' === $_POST['action'] && isset($_POST['nom']) && isset($_POST['prenom'])) {
    $controleur->createPays($_POST['nom'],$_POST['prenom']);
// CHASSEUR - UPDATE
} elseif (isset($_POST['page']) && 'payss' === $_POST['page'] && isset($_POST['action']) && 'updatePays' === $_POST['action'] && isset($_POST['nom']) && isset($_POST['prenom'])) {
    $controleur->updatePays($_POST['idPaysToUpdate'],$_POST['nom'],$_POST['prenom']);
// CHASSEUR - DELETE
} elseif (isset($_GET['page']) && 'payss' === $_GET['page'] && isset($_GET['action']) && 'delete' === $_GET['action'] && isset($_GET['id']) && isset($_GET['nom'])) {
    $controleur->deletePays($_GET['id'],$_GET['nom']);
// CHASSEUR - READ
} elseif (isset($_GET['page']) && 'payss' === $_GET['page'] && !isset($_GET['action'])) {
    $controleur->listerPays();
}

// ADMINISTRATEURS - CRUD    
// ADMINISTRATEURS - CREATE
elseif (isset($_POST['page']) && 'administrateurs' === $_POST['page'] && isset($_POST['action']) && 'create' === $_POST['action'] 
            && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['mot_de_passe'])) {
    $controleur->createAdministrateur($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['mot_de_passe']);
// ADMINISTRATEURS - UPDATE
} elseif (isset($_POST['page']) && 'administrateurs' === $_POST['page'] && isset($_POST['action']) && 'update' === $_POST['action'] && isset($_POST['nom']) && isset($_POST['prenom'])) {
    $controleur->updateAdministrateur($_POST['idAdministrateurToUpdate'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['mot_de_passe']);
// ADMINISTRATEURS - DELETE
} elseif (isset($_GET['page']) && 'administrateurs' === $_GET['page'] && isset($_GET['action']) && 'delete' === $_GET['action'] && isset($_GET['id']) && isset($_GET['nom']) && isset($_GET['prenom'])) {
    $controleur->deleteAdministrateur($_GET['id'],$_GET['nom'],$_GET['prenom']);
// ADMINISTRATEURS - READ
} elseif (isset($_GET['page']) && 'administrateurs' === $_GET['page']) {
    $controleur->listerAdministrateurs();
}
else {
    $controleur->listerPays();
}

<?php

require_once('modeles/Modele.php');
class Controleur {
     use Modele; 

    public function afficherMissions()
    {
        $payss = new Payss($this->pdo);
        $payss = $payss->listerPays();
        $pdo = $this->pdo;
        require_once('vues/liste-pays.php');
    }

    public function connexion() {
        require_once('vues/page-connexion.php');
    }

    public function deconnexion() {
        // Procédure de deconnexion
        $_SESSION['admin'] = 0;
        session_destroy();
        
        $this->afficherMissions();
    }

    public function verifConnexion($mail,$password) {
        $admin = new Administrateurs($this->pdo);
        $messageConnexion = "";
        if($admin->verifConnexion($mail,$password)) {
            $_SESSION['admin'] = 1;
            $this->afficherMissions();
        } else {
            $_SESSION['admin'] = 0;
            $messageConnexion = "Identifiant ou mot de passe erroné(s).";
            require_once('vues/page-connexion.php');
        }
    }

    // PAYS - CRUD

    public function listerPays()
    {
        $payss = new Payss($this->pdo);
        $payss = $payss->listerPays();
        require_once('vues/liste-pays.php');
    }

    public function createPays($nom, $prenom)
    {
        $payss = new Payss($this->pdo);
        $paysToCreate = $payss->createPays($nom, $prenom);
        $payss = $payss->listerPays();
        require_once('vues/liste-pays.php');
    }

    public function updatePays($id, $nom, $prenom)
    {
        $payss = new Payss($this->pdo);
        $paysToUpdate = $payss->updatePays($id, $nom, $prenom);
        $payss = $payss->listerPays();
        require_once('vues/liste-pays.php');
    }

    public function deletePays($id,$nom)
    {
        $payss = new Payss($this->pdo);
        $paysToDelete = $payss->deletePays($id, $nom);
        $payss = $payss->listerPays();
        require_once('vues/liste-pays.php');
    }


// ADMINISTRATEUR - CRUD

    public function listerAdministrateurs()
    {
        $administrateurs = new Administrateurs($this->pdo);
        $administrateurs = $administrateurs->lister();
        require_once('vues/liste-administrateurs.php');
    }

    public function createAdministrateur($nom, $prenom, $mail, $mot_de_passe)
    {
        $administrateurs = new Administrateurs($this->pdo);
        $administrateurToCreate = $administrateurs->create($nom, $prenom, $mail, $mot_de_passe);
        $administrateurs = $administrateurs->lister();
        require_once('vues/liste-administrateurs.php');
    }

    public function updateAdministrateur($id,$nom, $prenom, $mail, $mot_de_passe)
    {
        $administrateurs = new Administrateurs($this->pdo);
        $administrateurToUpdate = $administrateurs->update($id,$nom, $prenom, $mail, $mot_de_passe);
        $administrateurs = $administrateurs->lister();
        require_once('vues/liste-administrateurs.php');
    }

    public function deleteAdministrateur($id,$nom,$prenom)
    {
        $administrateurs = new Administrateurs($this->pdo);
        $administrateurToDelete = $administrateurs->delete($id, $nom, $prenom);
        $administrateurs = $administrateurs->lister();
        require_once('vues/liste-administrateurs.php');
    }

}
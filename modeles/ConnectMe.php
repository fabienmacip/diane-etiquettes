<?php 

    $pdo = null;
    
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=diane;charset=utf8', 'root', '');
        //$pdo = new PDO('mysql:host=91.216.107.161;dbname=fatab195806_12ru6xb;charset=utf8', 'fatab195806', 'xF8!S64-S1uxW!k');
        } catch (PDOException $e) {
            exit('Erreur : '.$e->getMessage());
        }



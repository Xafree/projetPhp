<?php
    require 'IndexController.php';

    $serveur ='localhost';
    $db = 'bd_projet';
    $login = 'root';
    $mdp = '';
    
    $connexion = new GestionDataBase($login,$mdp,$serveur,$db);
    $connexion->insertMedecin();
?>
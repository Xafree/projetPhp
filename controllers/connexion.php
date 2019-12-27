<?php
    require 'IndexController.php';

    $serveur ='localhost';
    $db = 'bd_projet';
    $login = 'root';
    $mdp = '';
    
    $connexion = new GestionDataBase($login,$mdp,$serveur,$db);

    if(isset($_POST['med_valider'])){
      var_dump($connexion->insertMedecin());
      header('Location: C:\wamp64\www\projetPhp\medecin.php');
    }
    if(isset($_POST['user_valider'])){
      $connexion->insertPatient();
      echo "enregistrement valider";
      header('Location: C:\wamp64\www\projetPhp\patient.php');
    }

    if(isset($_POST['suppr_med'])){
      $med = $_POST['med_nom'];
      $connexion->deleteMed($med);
      echo "\n enregistrement valider";
      header('Location: C:\wamp64\www\projetPhp\medecin.php');
    }

   $connexion = null;
?>
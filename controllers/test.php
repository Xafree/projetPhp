<?php 

    $server ='localhost';
    $db = 'bd_projet';
    $login = 'root';
    $mdp = '';

    try {  
        $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);    
    }catch (Exception $e) {
        die('Erreur : '. $e->getMessage());     
    }

    $req = $linkpdo->prepare('INSERT INTO medecin (nom, prenom, civilite )
    VALUES( :nom, :prenom,:civilite)');  

    $nom = $_POST['user_nom'];
    $prenom = $_POST['user_prenom'];
    $civiliter = $_POST['user_civilite'];

    $req->execute(array('nom' => $nom ,
                        'prenom' => $prenom,
                        'civilite' => $civiliter));

    echo "New record created successfully";

?>

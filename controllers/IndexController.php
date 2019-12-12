<?php
    namespace yasmf;
    use yasmf/DataSource;
    use yasmf/Router;

    class connexion {

        private $login;
        private $pw;
        private $serveur;
        private $database;

        public function __construct($log,$pass,$server,$db){
            $login = $log;
            $pw = $pass;
            $serveur = $server;
            $database = $db;
        }

        public function tryConnexion(){
            try {  
                $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);    
            }catch (Exception $e) {
                die('Erreur : '. $e->getMessage());     
            }
        }

        public function getValuePost(){
            $nom = $_POST['user_nom'];
            $prenom = $_POST['user_prenom'];
            $adresse = $_POST['user_adresse'];
            $ville = $_POST['user_ville'];
            $codepostal = $_POST['user_code_postal'];
            $civiliter = $_POST['user_civile'];
            $naissance = $_POST['user_naissance'];
            $lieuNaissance = $_POST['user_lieu_naissance'];
            $numsecu = $_POST['user_num_secu'];

            return $info =[$nom,$prenom,$adresse,$ville,$codepostal,$civiliter,$naissance,$lieuNaissance,$numsecu];
        }

        public function insertExecPatient(){
            $info = $this.getValuePost();
            $req = $linkpdo->prepare('INSERT INTO patient (num_securite_social, nom, prenom, 
                                                            adresse, code_postal,date_naissance ,civilite,	lieu_naissance ,id_medecin,	Ville  )
            VALUES(:num_securite_social, :nom, :prenom, :adresse, :code_postal, 
                    :date_naissance ,:civilite,	:lieu_naissance ,:id_medecin,:Ville)'); 

            $req->execute(array('num_securite_social' => $this->getValuePost[0], 'nom', 'prenom', 
            'adresse', 'code_postal','date_naissance' ,'civilite',	'lieu_naissance' ,'id_medecin',	'Ville'));
        }

        public function insertMedecin(){

        }
    }
?>
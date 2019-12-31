<?php
    class GestionDataBase {

        private $login;
        private $pw;
        private $serveur;
        private $database;
        private $pdo;

        public function __construct($log,$pass,$server,$db){
            $this->login = $log;
            $this->pw = $pass;
            $this->serveur = $server;
            $this->database = $db;
        }

        public function tryConnexion(){
            try {  
                $this->pdo = new PDO("mysql:host=$this->serveur;dbname=$this->database", $this->login, $this->pw);
            }catch (Exception $e) {
                die('Erreur : '. $e->getMessage());     
            }
        }

        private function getValuePostClient(){
            $out['nom']             = $_POST['user_nom'];
            $out['prenom']          = $_POST['user_prenom'];
            $out['adresse']         = $_POST['user_adresse'];
            $out['ville']           = $_POST['user_ville'];
            $out['codepostal']      = $_POST['user_code_postal'];
            $out['civiliter']       = $_POST['user_civile'];
            $out['naissance']       = $_POST['user_naissance'];
            $out['lieuNaissance']   = $_POST['user_lieu_naissance'];
            $out['numsecu']         = $_POST['user_num_secu'];
            $out['id_medecin']      = $_POST['user_id_medecin'];
            return $out;
            }

        private function getValuePostMedecin(){
            $out['nom']         = $_POST['med_nom'];
            $out['prenom']      = $_POST['med_prenom'];
            $out['civiliter']   = $_POST['med_civilite'];
            return $out;
        }

        public function insertPatient(){
            $out = $this->getValuePostClient();
            $this->tryConnexion();
            $req = $this->pdo->prepare('INSERT INTO patient(num_securite_social,nom,prenom,adresse,code_postal,date_naissance,civilite,lieu_naissance,id_medecin, ville)
                                        VALUES(:num_securite_social, :nom, :prenom, :adresse, :code_postal, :date_naissance ,:civilite, :lieu_naissance, :id_medecin, :ville)'); 
            $req->execute(array('num_securite_social'   => $out['numsecu'],
                                'nom'                   => $out['nom'],
                                'prenom'                => $out['prenom'], 
                                'adresse'               => $out['adresse'],
                                'code_postal'           => $out['codepostal'],
                                'date_naissance'        => $out['naissance'],
                                'civilite'              => $out['civiliter'],
                                'lieu_naissance'        => $out['lieuNaissance'], 
                                'id_medecin'            => $out['id_medecin'],
                                'ville'                 => $out['ville']));
        }

        public function insertMedecin(){
            $out = $this->getValuePostMedecin();
            $this->tryConnexion();
            $req = $this->pdo->prepare('INSERT INTO medecin (nom, prenom, civilite)
                                        VALUES(:nom, :prenom,:civilite)');  
            $req->execute(array('nom'       => $out['nom'],
                                'prenom'    => $out['prenom'],
                                'civilite'  => $out['civiliter']));
        } 
            
        public function requetePatient(){
            $requete = "SELECT * FROM `patient`";
            $this->tryConnexion();        
        }

        public function deleteMed($med){
            $chek = "SELECT nom from `medecin` where `medecin`.`nom` = '$med";
            $sql = "DELETE FROM `medecin` WHERE `medecin`.`nom` = '$med'";
            $this->tryConnexion();
            $resChek = $this->pdo->query($chek);
            if($resChek == false){
                $this->pdo->query($sql);
            }else{
                echo " nous avons pas ce nom dans la base de donnée ";
            }   
        }

        public function gestionTableauMedecin(){
            $sql = "SELECT * FROM `medecin`";
            $this->tryConnexion();
            try {
                $stmt = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
                do {
                    echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
                } while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR));
                $stmt = null;
            }
            catch (PDOException $e) {
                print $e->getMessage();
            }
        }
    };
?>

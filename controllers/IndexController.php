<!DOCTYPE html>
    <meta charset = 'UTF8'> 
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
                    echo "Connexion successfull";
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

            public function insertExecPatient(){
                $out = $this->getValuePostClient();
                $this->tryConnexion();
                $req = $this->pdo->prepare('INSERT INTO patient (num_securite_social, nom, prenom, 
                                                                adresse, code_postal,date_naissance ,civilite,	lieu_naissance ,id_medecin,	Ville  )
                                            VALUES(:num_securite_social, :nom, :prenom, :adresse, :code_postal, 
                                                    :date_naissance ,:civilite,	:lieu_naissance ,:id_medecin,:Ville)'); 

                $req->execute(array('num_securite_social'   => $out['numsecu'],
                                    'nom'                   => $out['nom'],
                                    'prenom'                => $out['prenom'], 
                                    'adresse'               => $out['adresse'],
                                    'code_postal'           => $out['codepostal'],
                                    'date_naissance'        => $out['naissance'],
                                    'civilite'              => $out['civiliter'],
                                    'lieu_naissance'        => $out['lieuNaissance'], 
                                    'id_medecin'            => $out['id_medecin'],
                                    'Ville'                 => $out['ville']));
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
        };
    ?>
</html>
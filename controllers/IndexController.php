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
                $nom = $_POST['user_nom'];
                $prenom = $_POST['user_prenom'];
                $adresse = $_POST['user_adresse'];
                $ville = $_POST['user_ville'];
                $codepostal = $_POST['user_code_postal'];
                $civiliter = $_POST['user_civile'];
                $naissance = $_POST['user_naissance'];
                $lieuNaissance = $_POST['user_lieu_naissance'];
                $numsecu = $_POST['user_num_secu'];
                $id_medecin = $_POST['user_id_medecin'];

                return array($nom,$prenom,$adresse,$ville,$codepostal,$civiliter,$naissance,$lieuNaissance,$numsecu,$id_medecin);
            }
            private function getValuePostMedecin(){
                $out['nom'] = $_POST['user_nom'];
                $out['prenom'] = $_POST['user_prenom'];
                $out['civiliter']= $_POST['user_civilite'];
                return $out;
            }

            public function insertExecPatient(){
                $info = $this.getValuePostClient();
                $req = $linkpdo->prepare('INSERT INTO patient (num_securite_social, nom, prenom, 
                                                                adresse, code_postal,date_naissance ,civilite,	lieu_naissance ,id_medecin,	Ville  )
                VALUES(:num_securite_social, :nom, :prenom, :adresse, :code_postal, 
                        :date_naissance ,:civilite,	:lieu_naissance ,:id_medecin,:Ville)'); 

                $req->execute(array('num_securite_social' => $this->getValuePostClient()[8],
                                    'nom' => $this->getValuePostClient()[0],
                                    'prenom' => $this->getValuePostClient()[1], 
                                    'adresse' => $this->getValuePostClient()[2],
                                    'code_postal' => $this->getValuePostClient()[4],
                                    'date_naissance' => $this->getValuePostClient()[6] ,
                                    'civilite' => $this->getValuePostClient()[5],
                                    'lieu_naissance' => $this->getValuePostClient()[7] , 
                                    'id_medecin' => $this->getValuePostClient()[9],
                                    'Ville' => $this->getValuePostClient()[3]));
            }

            public function insertMedecin(){
                $out = $this->getValuePostMedecin();
                $this->tryConnexion();
                $req = $this->pdo->prepare('INSERT INTO medecin (nom, prenom, civilite)
                                            VALUES( :nom, :prenom,:civilite)');  
                $req->execute(array('nom' => $out['nom'],
                                          'prenom' => $out['prenom'],
                                          'civilite' => $out['civiliter']));
            }
        };
    ?>
</html>
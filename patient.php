<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>gestion patient</title>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <div id="globale">
            <header id= "header">
                <div id="subscribe">
                    <a href="connexion.html">se connecter</a>
                </div>
                <div id="menu">  
                    <ul id="navigation">
                        <li><a href="index.html"   title="acceuil">Acceuil</a></li>
                        <li><a href="medecin.php" title="Medecin">Médecin</a></li>
                        <li><a href="patient.php" title="patient">Patient</a></li>
                    </ul>
                </div>
            </header>
            <form method="POST">
                <input type="submit" id="ajouter"  name="button_ajouter"   value="Ajouter" >
                <input type="submit" id="modifier" name="button_modifier"  value="Modifier">
                <input type="submit" id="Effacer"  name="button_effacer"   value="Effacer" >
            </form>
            <?php 
            if(isset($_POST['button_ajouter'])){
                echo'
                <div id="formulaire">
                    <h1><u>Le formulaire d"entrée client</u></h1>
                    <form action="controllers/connexion.php" method="POST">
                        <div>
                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" name="user_nom" >
                        </div>
                        <div>
                            <label for="Prenom">Prénom :</label>
                            <input type="text" id="Prénom" name="user_prenom" >
                        </div>
                        <div>
                            <label for="Adresse">Adresse :</label>
                            <input type="text" id="Adresse" name="user_adresse" >
                        </div>
                        <div>
                            <label for="Cp">Code postal :</label>
                            <input type="number" id="cp" name="user_code_postal" >
                        </div>
                        <div>
                            <label for="date_naissance">date de naissance :</label>
                            <input type="date" id="cp" name="user_naissance" >
                        </div>
                        <div>
                            <label for="civilité">civilité :</label>
                            <input type="text" id="tel" name="user_civile" >
                        </div>
                        <div>
                            <label for="Lieu_naissance">Lieu de naissance :</label>
                            <input type="text" id="résultat" name="user_lieu_naissance" >
                        </div>
                        <div>
                            <label for="Lieu_naissance">ville :</label>
                            <input type="text" id="résultat" name="user_ville" >
                        </div>
                        <div>
                            <label for="Num_secu">Numéro de sécurité social :</label>
                            <input type="number" id="résultat" name="user_num_secu" >
                        </div>
                        <div>
                            <label for="Num_secu">Nom médecin :</label>
                            <input type="text" id="résultat" name="user_id_medecin">
                        </div>
                        <input type="submit" id="envoyer" name="user_valider" value="Valider">
                        <input type="reset" id="envoyer" name="user_valider" value="Effacer">
                    </form>
                </div>';
            }
            ?>

            <footer>
                
            </footer>
        </div>
        
    </body>
</html>
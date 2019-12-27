<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>gestion medecin</title>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <div id="globale">
            <header>
                <div id="subscribe">
                    <div>
                        <a href="connexion.html">se connecter</a>
                    </div>
                </div>
                <div id="menu">  
                    <ul id="navigation">
                        <li><a href="index.html" title="acceuil">Acceuil</a></li>
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
                    <h1>Le formulaire des médecin </h1>
                    <form action="controllers/connexion.php" method="POST">
                        <div>
                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" name="med_nom" >
                        </div>
                        <div>
                            <label for="Prenom">Prénom :</label>
                            <input type="text" id="Prénom" name="med_prenom" >
                        </div>
                        <div>
                            <label for="civilité">civilité :</label>
                            <input type="text" id="Adresse" name="med_civilite" >
                        </div>
            
                        <input type="submit" id="envoyer" name="med_valider" value="Valider">
                        <input type="reset" id="reset" name="med_effacer" value="Effacer">
                    </form>';}
                    
                    if(isset($_POST['button_effacer'])){
                        echo'
                        <h1>suppresion de medecin </h1>
                        <form action="controllers/connexion.php" method="POST">
                            <div>
                                <label for="nom">Nom :</label>
                                <input type="text" id="nom" name="med_nom" >
                            </div>
                            <input type="submit" id="envoyer" name="suppr_med" value="Valider">
                        </form>';
                        if(isset($_POST['suppr_med'])){
                            echo "Effacement avec succées";
                        }  
                    }
            ?>
            <footer id="footer">

            </footer>
        </div>
    </body>
</html>
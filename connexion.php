<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sportify</title>
  <style>
    .rectangle {
      width: 125px;
      height: 75px;
      margin: 20px;
      background-color: #808080;
      text-align: center;
      color: black;
      line-height: 75px;
      text-decoration: none;
      display: inline-block;
      border: 3px solid #000;

    }
     .wrapper {
      width: 80%; /* Par exemple, 80% de la largeur de la fenêtre */
      height: 100%;
      margin: 0 auto; /* Centre le wrapper horizontalement */
      padding: 20px; /* Marge intérieure pour le contenu */
      background-color: #808080;
    }

    .header {
        width: 75%;
        margin: 0 auto;
        padding: 20px;
        background-color: white;
        border: 2px solid #000;
        text-align: center;
        margin-bottom: -21px;
        display: flex;
    }
    .header h1 {
      color: blue; /* Couleur bleue pour "Consultation sportive" */
      margin-right: 20px;
    }
    .header-text {
      color: red; /* Couleur rouge pour "Sportify" */
    }
    .navigation {
        width: 75%;
        margin: 0 auto;
        padding: 20px;
        background-color: white;
        border: 2px solid #000;
        margin-bottom: -21px;

    }
    .section {
        width: 75%;
        margin: 0 auto;
        padding: 20px;
        background-color: white;
        border: 2px solid #000;
        margin-bottom: -21px;

    }



    .fin{
      width: 75%;
        
        margin-bottom: 20px;
    }

  </style>
</head>
<body>


<?php
// Vérifier si le formulaire a été soumis

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $identifiant = isset($_POST["Identifiant"]) ? $_POST["Identifiant"] : "";
    $motDePasse = isset($_POST["Mot_de_passe"]) ? $_POST["Mot_de_passe"] : "";


    
    // Exemple d'affichage
    //identifier le nom de base de données
    $database = "projet";
    //connectez-vous dans votre BDD
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    //si le BDD existe, faire le traitement
    if ($db_found) {
        $sql = "SELECT `ID`, `photo`, `nom`, `prenom`, `date_de_naissance`, `telephone`, `email`, `type` FROM compte 
        WHERE ID='$identifiant' AND MDP='$motDePasse'";
        $result = mysqli_query($db_handle, $sql);
        if (mysqli_fetch_assoc($result)!= NULL) {
            $sql = "SELECT `ID`, `photo`, `nom`, `prenom`, `date_de_naissance`, `telephone`, `email`, `type` FROM compte 
        WHERE ID='$identifiant' AND MDP='$motDePasse'";
        $result = mysqli_query($db_handle, $sql);
            echo "<div class='wrapper'>";
                echo "<div class='header'>";
                    echo "<h1><span class='header-text'>Sportify:</span> Consultation sportive</h1>";
                    echo "<img src='sportify.jpg' alt='Consultation sportive Image'>";
            echo "</div>";
            echo "<div class='navigation'>";
                echo "<a href='accueil.php' class='rectangle'>accueil</a>";
                echo "<a href='Tout_parcourir' class='rectangle'>Tout parcourir</a>";
                echo "<a href='rendez_vous.php' class='rectangle'>Rendez-vous</a>";
                echo "<a href='recherche.html' class='rectangle'>recherche</a>";
                echo "<a href='connexion.html' class='rectangle'>Votre compte</a>";
            echo "</div>";
            echo "<div class='section'>";
                echo "<h2>Votre compte:</h2>";
            $data = mysqli_fetch_assoc($result);
            echo " <img src='{$data['photo']}' width='150' height='150'>";
            echo "<div style='display: inline-block; margin-left: 20px;'>";
            echo "Identifiant: " . $data['ID'] . "<br>";
            echo "Nom: " . $data['nom'] . "<br>";
            echo "Prenom: " . $data['prenom'] . "<br>";
            echo "Date de naissance: " . $data['date_de_naissance'] . "<br>";
            echo "téléphone: " . $data['telephone'] . "<br>";
            echo "adresse email: " . $data['email'] . "<br>";
            if($data['type']=='utilisateur'){
                echo '<a href="creation_coach">cliquez ici pour devenir coach</a>';
            }
            }

            else{
                echo "Erreur lors de la connexion";
            }


            echo "</div>"; // Close the section
            echo "</div>"; // Close the wrapper

        

    }
}
?>
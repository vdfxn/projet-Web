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

      .rectangle_recherche{
      width:200px;
      height:30px;

    }

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

    <div class="wrapper">
        <div class="header">
             <h1><span class="header-text">Sportify:</span> Consultation sportive</h1>
              <img src="sportify.jpg" alt="Consultation sportive Image">
        </div>
        <div class="navigation">
        <a href="accueil.php"  class="rectangle" >accueil</a>
        <a href="Tout_parcourir"  class="rectangle">Tout parcourir</a>
        <a href="rendez_vous.php"  class="rectangle">Rendez-vous</a>
        <a href="recherche.html"  class="rectangle">recherche</a>
        <a href="connexion.html"  class="rectangle">Votre compte</a>
        </div>
    <div class="section">
        <h2>Vos Rendez-vous</h2>
      


<?php

         $database = "projet";
    //connectez-vous dans votre BDD
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    //si le BDD existe, faire le traitement
    if ($db_found) {

        $sql = "SELECT `ID`, `photo`, `nom`, `prenom`, `date_de_naissance`, `telephone`, `email`, `type` FROM compte 
        WHERE ID='$row5'";
        $result = mysqli_query($db_handle, $sql);
         $data = mysqli_fetch_assoc($result);
            echo " <img src='{$data['photo']}' width='150' height='150'>";
            echo "<div style='display: inline-block; margin-left: 20px;'>";
            echo "Identifiant: " . $data['ID'] . "<br>";
            echo "Nom: " . $data['nom'] . "<br>";
            echo "Prenom: " . $data['prenom'] . "<br>";
            $sql1="SELECT `jour`, `horaire`, `adresse`, `salle` FROM rendez_vous WHERE ID_coach='julienc'";
        $result1 = mysqli_query($db_handle, $sql1);
        $data1 = mysqli_fetch_assoc($result1);
            echo "jour: " . $data1['jour'] . "<br>";
            echo "horaire: " . $data1['horaire'] . "<br>";
            echo "adresse: " . $data1['adresse'] . "<br>";
            echo "salle: " . $data1['salle'] . "<br>";
            $sql2="SELECT `sport` FROM coach WHERE ID='julienc'";
        $result2 = mysqli_query($db_handle, $sql2);
        $data2 = mysqli_fetch_assoc($result2);
        echo "entrainement de : " . $data2['sport'] . "<br>";

    }

   



        
        
            



        else {
            echo "  ";
        }

?>
<input type="submit" value="Annuler le rendez-vous">






</body>
</html>
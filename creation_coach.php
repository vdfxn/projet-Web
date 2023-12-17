<?php
// Vérifier si le formulaire a été soumis

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $identifiant = isset($_POST["Identifiant"]) ? $_POST["Identifiant"] : "";
    $CV = isset($_POST["CVV"]) ? $_POST["CVV"] : "";
    $ex = isset($_POST["ex"]) ? $_POST["ex"] : "";
    $sp= isset($_POST["sp"]) ? $_POST["sp"] : "";

    
    // Exemple d'affichage
    //identifier le nom de base de données
    $database = "projet";
    //connectez-vous dans votre BDD
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    //si le BDD existe, faire le traitement
    if ($db_found) {
        $sql = "SELECT `ID` FROM compte  WHERE ID='$identifiant'";
        $result = mysqli_query($db_handle, $sql);
        $row = mysqli_num_rows($result);
        if($row>0){
            $sql0= "SELECT `type` FROM compte  WHERE ID='$identifiant'";
            $result0 = mysqli_query($db_handle, $sql0);
            $row0 = mysqli_fetch_assoc($result0);
            if($row0['type']=='coach'){
                echo "ce compte est deja coach";
            }
            else{

            $sql1="INSERT INTO `coach`(`ID`, `CV`, `experience`, `sport`) VALUES ('$identifiant','$CV','$ex','$sp')";
            $result1 = mysqli_query($db_handle, $sql1);
            echo "votre demande a bien été éffectuer";
            $sql2= "UPDATE `compte` SET`type`='coach' WHERE ID='$identifiant'";
            $result2 = mysqli_query($db_handle, $sql2);

            }

            }

        else {
            echo " ce compte n'existe pas";
        }



    }

    }

    ?>

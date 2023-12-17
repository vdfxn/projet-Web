
<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $identifiant = isset($_POST["Identifiant"]) ? $_POST["Identifiant"] : "";
    $motDePasse = isset($_POST["Mot_de_passe"]) ? $_POST["Mot_de_Passe"] : "";
    $ph = isset($_POST["ph"]) ? $_POST["ph"] : "";
    $no = isset($_POST["no"]) ? $_POST["no"] : "";
    $pr = isset($_POST["pr"]) ? $_POST["pr"] : "";
    $da = isset($_POST["da"]) ? $_POST["da"] : "";
    $te = isset($_POST["te"]) ? $_POST["te"] : "";
    $em = isset($_POST["ad"]) ? $_POST["ad"] : "";
    

    
    // Exemple d'affichage
    // Identifier le nom de la base de données
    $database = "projet";
    // Connectez-vous à votre BDD
    // Rappel : votre serveur = localhost | votre login = root | votre mot de passe = '' (rien)
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    // Si la BDD existe, effectuer le traitement
    if ($db_found) {
        $sql = "SELECT ID FROM compte WHERE ID='$identifiant' AND MDP='$motDePasse'";
        $result = mysqli_query($db_handle, $sql);
        if (mysqli_fetch_assoc($result) != NULL) {
            echo "L'identifiant est déjà utilisé.";
        } else {

            $sql = "INSERT INTO compte (ID, MDP, photo, nom, prenom, date_de_naissance, telephone, email, type) VALUES ('$identifiant', '$motDePasse', '$ph', '$no', '$pr', '$da', '$te', '$em', 'utilisateur')";
            if (mysqli_query($db_handle, $sql)) {
                echo "Création de votre compte réussie.";
            } else {
                echo "Erreur lors de la création du compte : " ;
            }
        }
    } else {
        echo "Erreur de connexion à la base de données.";
    }
}

?>
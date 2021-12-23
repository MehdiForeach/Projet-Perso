<?php
    require_once "ressources.php";

    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    $mdp = md5($mdp);

    $query = "SELECT * FROM users WHERE pseudo='$pseudo' AND pw='$mdp';";
    
    $mysqli = new mysqli($servername, $username, $password, $database);
    $res = $mysqli->query( $query );
    $ligne = $res->fetch_assoc();

    if($rows = $res->num_rows && $ligne['rang'] == 0)
        print("Bienvenue $pseudo");
    else if ($rows = $res->num_rows && $ligne['rang'] == 1)
        print("Bienvenue MONSIEUR $pseudo");
    else
        print("Introuvable");

    $mysqli->close();
?>
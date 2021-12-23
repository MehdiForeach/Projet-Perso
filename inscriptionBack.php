<?php
    require_once "ressources.php";

    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    $mdp = md5($mdp);

    $query = "SELECT * FROM users WHERE pseudo='$pseudo' AND pw='$mdp';";

    $mysqli = new mysqli($servername, $username, $password, $database);
    $res = $mysqli->query( $query );

    if($rows = $res->num_rows)
        print("Vous êtes déja inscrit $pseudo !");
    else
    {
        $query = "INSERT INTO users (pseudo, pw) VALUES ('$pseudo', '$mdp');";
        
        $res = $mysqli->query( $query );

        if($res)
            print("Vous êtes inscrit $pseudo");
        else
            print("Introuvable");
    }
    
    $mysqli->close();
?>
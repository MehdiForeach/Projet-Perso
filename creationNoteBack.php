<?php
    require_once "ressources.php";

    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $epingle = $_POST['epingle'];
    $dateRappel = $_POST['dateRappel'];
    
    $mysqli = new mysqli($servername, $username, $password, $database);

    if($dateRappel == "")
    {
        $dateRappel = "NULL";

        $query = "INSERT INTO notes (titre, description, epingle, dateCreation, dateRappel) VALUES ('$titre', '$description', $epingle, NOW(), $dateRappel);";
        
        $res = $mysqli->query( $query );
    }
    else
    {
        $query = "INSERT INTO notes (titre, description, epingle, dateCreation, dateRappel) VALUES ('$titre', '$description', $epingle, NOW(), '$dateRappel');";
            
        $res = $mysqli->query( $query );
    }

    if($res)
        print("Note créer !");
    else
        print("Erreur ");
    
    $mysqli->close();
?>
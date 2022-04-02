<?php

require_once "ressources.php";

    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $id = $_POST['id'];
    $dateR = $_POST['dateR'];

    if ($dateR == "")
        $query = "UPDATE notes SET titre='$titre', description='$description', dateRappel=null WHERE id=$id;";
    else
        $query = "UPDATE notes SET titre='$titre', description='$description', dateRappel='$dateR' WHERE id=$id;";
    
    $mysqli = new mysqli($servername, $username, $password, $database);
    $res = $mysqli->query( $query );
    $mysqli->close();
?>
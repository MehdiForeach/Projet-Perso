<?php

require_once "ressources.php";

    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $id = $_POST['id'];

    $query = "UPDATE notes SET titre='$titre', description='$description' WHERE id=$id;";
    
    $mysqli = new mysqli($servername, $username, $password, $database);
    $res = $mysqli->query( $query );
    $mysqli->close();
?>
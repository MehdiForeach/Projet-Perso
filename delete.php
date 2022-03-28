<?php

require_once "ressources.php";

    $id = $_POST['id'];

    $query = "DELETE FROM notes WHERE id=$id;";
    
    $mysqli = new mysqli($servername, $username, $password, $database);
    $res = $mysqli->query( $query );
    $mysqli->close();
?>
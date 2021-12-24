<?php
    require_once "ressources.php";

    $query = "SELECT * FROM notes WHERE epingle=1;";
    
    $mysqli = new mysqli($servername, $username, $password, $database);
    $res = $mysqli->query( $query );
    // $ligne = $res->fetch_assoc();

    $tableauData = [];

    while ( $ligne = $res->fetch_assoc())
        $tableauData[] = $ligne;

    print( json_encode( $tableauData ) );

    $mysqli->close();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Mes Notes</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <header>
      <h1>Notes</h1>
    </header>

    <main>
        <div class="contenu" id="contenu">
            <?php
                $idNote = $_GET['id'];
                require_once "ressources.php";

                $query = "SELECT * FROM notes WHERE id=$idNote;";
                
                $mysqli = new mysqli($servername, $username, $password, $database);
                $res = $mysqli->query( $query );
                // $ligne = $res->fetch_assoc();
            
                $tableauData = [];
            
                while ( $ligne = $res->fetch_assoc())
                    $tableauData[] = $ligne;

                    echo "<div id='$idNote' class='tache'>";
                    echo "<h2>".$tableauData[0]['titre']."</h2>";
                    echo "<h3>".$tableauData[0]['description']."</h3>";
                    echo "<div class='dateCreation'><p>".$tableauData[0]['dateCreation']."</p></div>";
                    if($tableauData[0]['dateRappel'] != null)
                      echo "<div class='dateRappel'><p>Rappel : ".$tableauData[0]['dateRappel']."</p></div></div>";
                    else
                      echo "</div>";
            
                $mysqli->close();
            ?>
        </div>
        <div style="color:white;" id="message"></div>
        <button onclick="updateNote()">MAJ</button>
        <button onclick="verifNote()">Supprimer</button>
    </main>

    <footer>
    </footer>

  <script>
      function updateNote()
      {
        $('.tache').html("<input type='text' id='titre' placeholder='titre'><br>"+
                          "<input type='text' id='description' placeholder='description'><br><button onclick='sendData()'>Ok</button>");
      }

      function verifNote()
      {
        $('#message').html("Etes vous sur de vouloir supprimer cette note ?<br><button onclick='deleteNote()'>Oui</button><br><button onclick='miseZero()'>Non</button>");
      }

      function deleteNote()
      {
        $.post("delete.php", 
            {id: $('.tache').attr('id') });
      }

      function miseZero()
      {
        $('#message').html('');
      }

      function sendData()
      {
        $.post("data.php", 
            {id: $('.tache').attr('id'), titre: $('#titre').val()  , description: $('#description').val() });
      }
  </script>

  </body>
</html>
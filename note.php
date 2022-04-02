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
        <button onclick="updateNote('<?=$tableauData[0]['titre']?>','<?=$tableauData[0]['description']?>', '<?=$tableauData[0]['dateCreation']?>', '<?=$tableauData[0]['dateRappel']?>')">MAJ</button>
        <button onclick="verifNote()">Supprimer</button>
    </main>

    <footer>
    </footer>

  <script>
      function updateNote(titre, desc, dateC, dateR)
      {
        $('.tache').html("<input type='text' id='titre' value='"+titre+"'><br>"+
                          "<textarea id='description'>"+desc+"</textarea><br>"+
                          "<input type='date' id='date' data='"+dateC+"' value='"+dateR+"'><br><button onclick='sendData()'>Ok</button>");
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
        let dateR = $('#date').val();

        $.post("data.php", 
            {
              id: $('.tache').attr('id'),
              titre: $('#titre').val(),
              description: $('#description').val(),
              dateC: $('#date').attr('data'),
              dateR: dateR
            },
            function()
            {
              if (dateR)
                dateR = "<div class='dateRappel'><p>Rappel : "+dateR+"</p></div>";
                
              $('.tache').html("<h2>"+$('#titre').val()+"</h2>"+
                                "<h3>"+$('#description').val()+"</h3>"+
                                "<div class='dateCreation'><p>"+$('#date').attr('data')+"</p></div>"+
                                dateR);
            });
      }
  </script>

  </body>
</html>
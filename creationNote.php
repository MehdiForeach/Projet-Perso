<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Mes Notes - Créer une nouvelle note</title>
    <link rel="stylesheet" href="style.css">
    <script>
        var epingle = 0;

      function creerNote()
      {
        let titre = $( "#titre" ).val();
        let description = $( "#description" ).val();
        let myEpingle = epingle;
        let dateRappel = $( "#dateRappel" ).val();

        if(titre != "")
        {
          $.post(
              "creationNoteBack.php",
              {
                  titre : titre,
                  description : description,
                  epingle : myEpingle,
                  dateRappel : dateRappel
              },
              function(data, status)
              {
                $("#res").text(data);
              }
          );
        }
        else
          $("#res").text("Veuillez remplir les champs !");
      }

      function myEpingle()
      {
        if($('#epingle').is(":checked"))
            epingle = 1;
        else
            epingle = 0;
      }
    </script>
  </head>

  <body>
    <header>
      <h1>Notes</h1>
    </header>

    <main>
        <div class="contenu" id="contenu">

            <div>
                <input id="titre" type="text" placeholder="Entrez le titre">
            </div>

            <div>
                <input id="description" type="text" placeholder="Entrez la description">
            </div>

            <br>
            <button onclick="creerNote()">Créer</button>

            <input onclick="myEpingle()" type="checkbox" id="epingle" name="epingle">
            <label style="color:white;" for="epingle"> Epinglé cette note</label>
            
            <br><br>
            <label style="color:white;" for="dateRappel">Date rappel : </label>
            <input type='date' name="dateRappel" id='dateRappel'>

            <div style="color:red;" id="res"></div>

        </div>
    </main>

    <footer>
    </footer>

  </body>
</html>
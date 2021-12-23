<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Mes Notes - Connexion</title>
    <link rel="stylesheet" href="style.css">
    <script>
      function connexion()
      {
        let pseudo = $( "#pseudo" ).val();
        let mdp = $( "#mdp" ).val();

        if(pseudo != "" && mdp != "")
        {
          $.post(
              "loginBack.php",
              {
                  pseudo : pseudo,
                  mdp : mdp
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

      function inscription()
      {
        let pseudo = $( "#pseudo" ).val();
        let mdp = $( "#mdp" ).val();

        if(pseudo != "" && mdp != "")
        {
          $.post(
              "inscriptionBack.php",
              {
                  pseudo : pseudo,
                  mdp : mdp
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
    </script>
  </head>

  <body>
    <header>
      <h1>Notes</h1>
    </header>

    <main>
        <div class="contenu" id="contenu">

            <div>
                <input id="pseudo" type="text" placeholder="Entrez votre pseudo">
            </div>

            <div>
                <input id="mdp" type="password" placeholder="Entrez votre mot de passe">
            </div>

            <br>
            <button onclick="connexion()">Connexion</button>
            <button onclick='inscription()'>S'inscrire</button>
            
            <div id="res"></div>
        </div>
    </main>

    <footer>
    </footer>

  </body>
</html>
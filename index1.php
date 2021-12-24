<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Mes Notes</title>
    <link rel="stylesheet" href="style.css">
    <script>
      $(document).ready( function()
                          {
                            $.get( "index1Back.php",
                                    function( data, status )
                                    {
                                      let tableau = JSON.parse( data );
                                      // console.log( tableau );
                                      let chaine = "";

                                      for ( ligne of tableau )
                                      {
                                        chaine += "<div class='tacheSimple'>";
                                        chaine += "<h2>"+ligne['titre']+"</h2>";
                                        chaine += "<h3>"+ligne['description']+"</h3>";
                                        chaine += "<div class='dateCreation'><p>"+ligne['dateCreation']+"</p></div>";
                                        chaine += "</div>";
                                      }

                                      $( "#notesSimple" ).append( chaine );
                                    }   
                                  );

                                  $.get( "index1EpingleBack.php",
                                    function( data, status )
                                    {
                                      let tableau = JSON.parse( data );
                                      // console.log( tableau );
                                      let chaine = "";

                                      for ( ligne of tableau )
                                      {
                                        chaine += "<div class='tacheEpingle'>";
                                        chaine += "<h2>"+ligne['titre']+"</h2>";
                                        chaine += "<h3>"+ligne['description']+"</h3>";
                                        chaine += "<div class='dateCreation'><p>"+ligne['dateCreation']+"</p></div>";
                                        chaine += "</div>";
                                      }

                                      $( "#notesEpingle" ).append( chaine );
                                    }   
                                  );
                          }
                        );
    </script>
  </head>

  <body>
    <header>
      <h1>Notes</h1>
    </header>

    <main>
        <div class="contenu" id="contenu">

            <div class="notesEpingle" id="notesEpingle"><p style="color:white;">Epinglé</p></div>

            <div class="separation" id="separation"></div>

            <div class="notesSimple" id="notesSimple"></div>

            <div id="finContenu">
                <button onclick="window.location.href='creationNote.php';" class="boutonAdd">+</button>
            </div>

        </div>
    </main>

    <footer>
    </footer>

  </body>
</html>
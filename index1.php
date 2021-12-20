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

            <div class="notesEpingle" id="notesEpingle">
                <div class="tacheEpingle">
                    <h2>Titre</h2>
                    <h3>Description</h3>
                    <div class="dateCreation"><p>Date de Creation</p></div>
                </div>

                <div class="tacheEpingle">
                    <h2>Titre</h2>
                    <h3>Description</h3>
                    <div class="dateCreation"><p>Date de Creation</p></div>
                </div>
            </div>

            <div class="separation" id="separation"></div>

            <div class="notesSimple" id="notesSimple">
                <div class="tacheSimple">
                    <h2>Titre</h2>
                    <h3>Description</h3>
                    <div class="dateCreation"><p>Date de Creation</p></div>
                </div>
            </div>

            <div id="finContenu">
                <button class="boutonAdd">+</button>
            </div>

        </div>
    </main>

    <footer>
    </footer>

  </body>
</html>
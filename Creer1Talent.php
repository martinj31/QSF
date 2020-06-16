<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
​
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
​	<link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Quai des savoir-faire</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="Accueil.php">Quai des savoir-faire</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Accueil.php">Accueil<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Besoin.php">Besoins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Talent.php">Talents</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AbonnerCategorie.php">Catégories</a>
          </li>  
        </ul>
          
          <?php
            require_once 'Fonctions.php';
            if (empty($_SESSION['email'])){
                echo ('<div class="switch-field">');
                echo ('<input type="radio" id="" name="affichagevisiteur" value="Pro et Perso" checked/>');
                echo ('<label for="radio-three">Pro et Perso</label>');
                echo ('<input type="radio" id="" name="affichagevisiteur" value="Pro" />');
                echo ('<label for="radio-four">Pro</label>');
                echo ('<input type="radio" id="" name="affichagevisiteur" value="Perso" />');
                echo ('<label for="radio-five">Perso</label>');
                echo ('</div>');
            } 
          ?>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">   
            <?php
            require_once 'Fonctions.php';
            
            if(isset($_SESSION['email'])){
                    echo('<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">');
                    echo $_SESSION['email'];       // quand l'utiliateur n'a pas croché le case Anonyme au moment de l'inscription, on va afficher son adresse mail
                    echo('</a>');
            } else {
                echo('<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">');
                echo "Visiteur";                   //Utilisateur qui n'a pas conncté
                echo('</a>');
            } 
            ?>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                if(isset($_SESSION['email'])){
                    echo ('<a class="dropdown-item" href="MonProfil.php">Mon profil</a>');
                    echo ('<a class="dropdown-item" href="MesCategories.php">Mes catégories</a>');
                    echo ('<a class="dropdown-item" href="Deconnecter.php" onclick="Deconnexion()">Déconnecter</a>');
                ?>
                    <script>
                        function Deconnexion() {
                            alert("Déconnexion réussite !");
                            }
                    </script>
                <?php
                } else {
                    echo ('<a class="dropdown-item" href="Login.php">Se connecter</a>');
                    echo ('<a class="dropdown-item" href="Inscription.php">S\'inscrire</a>');
                }
                ?>
            </div>
          </li>
        </ul>
      </div>
    </nav>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
        <div class="jumbotron">
          <div class="container">
			
            <h1> Ajouter un talent </h1>
            <form action="Saisir1Talent.php" method="post">
            <?php
            require_once('Fonctions.php');
            date_default_timezone_set('Europe/Paris');
            echo "Date de création : " . date("yy/m/d"); 
            ?>
            <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                      <select class="custom-select mr-sm-2" name="categorieT" id="inlineFormCustomSelect" required>
                            <option value="" selected>Choisir une catégorie(*)</option>
                            <option value="1" name="categorieT" title="...">Sport</option>
                            <option value="2" name="categorieT" title="Réunions créatives/Pitcher .....">Animation</option>
                            <option value="3" name="categorieT" title="...">Outils métiers</option>
                            <option value="4" name="categorieT" title="Yoga, méditation...">Développement personnel</option>
                            <option value="5" name="categorieT" title="...">Associatif</option>
                            <option value="6" name="categorieT" title="...">Covoiturage</option>
                            <option value="7" name="categorieT" title="Word, Excel, PowerPoint, Outlook...">Bureautique</option>
                            <option value="8" name="categorieT" title="Internet, site Web, réparation PC...">Informatique</option>
                            <option value="9" name="categorieT" title="Cuisine, bricolage, musique, théâtre, ciné, culture, philatélie, généalogie...">Loisir </option>
                            <option value="10" name="categorieT" title="Demande de créér une catégorie à l'administrateur">Autres </option>
                      </select>
                    </div>
            </div>
            <div class="form-group">
              <label for="inputEmail4">Titre(<span style="color:red">*</span>)</label>
              <input type="text" name="titreT" class="form-control col-md-4" id="inputEmail4" maxlength="20" required>
            </div>
            <div class="form-group">
                    <label for="inputEmail4">Déscription du talent(<span style="color:red">*</span>)</label><br/>
                    <textarea rows="4" cols="50" name="descriptionT" placeholder=" Veuillez préciser votre talent" required></textarea>
            </div>
            <div class="form-group">
                    <label for="inputAddress">Type de talent(<span style="color:red">*</span>)</label>				
            </div>
                
            <div class="form-group">
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="typeT" id="inlineRadio1" required value="Pro">
                <label class="form-check-label" for="inlineRadio1">Pro</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="typeT" id="inlineRadio2" value="Perso">
                <label class="form-check-label" for="inlineRadio2">Perso</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="typeT" id="inlineRadio3" value="Pro et Perso">
                <label class="form-check-label" for="inlineRadio3">Pro&Perso</label>
              </div>               
            </div>

              <div class="form-group">
              <button type="submit" class="btn btn-dark">Créer</button>
              </div>
            </form>
          </div>
        </div>
        
        <footer>
          <p id="copyright"><em><small>copyright &#9400; Talents Land, CPAM Haute-Garonne, 2020. All rights reserved.</small></em></p>
        </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

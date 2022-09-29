<html>
  <head>
    <title>KBC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="modele/cssGeneral.css">
  </head>
  <body>
    <div class="mynav">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="#"><a href="index.php?uc=accueil" title="KBC">
            <img 	alt="K Beauty Cosmetics"
              src="images/logo.png"
              height="90px"
              width="auto"/>
          </a></a>

          <a class="navbar-brand" href="#"><a href=index.php?uc=gererPanier&action=voirPanier title="Panier">
              <img 	alt="K Beauty Cosmetics"
                src="images/panier.png"
                height="50px"
                width="auto"/>
            </a></a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Soins
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <?php
                      $lesSoins = $pdo->getLesSoins();
                      foreach( $lesSoins as $unSoin)
                      {
                        $idSoin = $unSoin['id_Soins'];
                        $nom = $unSoin['nom_Soins'];
                        ?>
                          <a class="dropdown-item" href=index.php?uc=voirSoins&soin=<?=$idSoin ?>&action=voirLesProduits><?=$nom ?></a>
                      <?php
                      }
                      ?>
                    </div>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Marques
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <?php
                      $lesMarques = $pdo->getLesMarques();
                      foreach( $lesMarques as $uneMarque)
                      {
                        $idMarque = $uneMarque['id_Marque'];
                        $nomMarque = $uneMarque['nom_Marque'];
                        ?>
                          <a class="dropdown-item" href=index.php?uc=voirSoins&marque=<?=$idMarque ?>&action=voirLesProduitParMarque><?=$nomMarque ?></a>
                      <?php
                      }
                      ?>
                    </div>
                  </li>

                <li class="nav-item">
                  <a class="nav-link disabled" href="#" Title="Produits Homme">
                    Homme</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="index.php?uc=voirSoins&action=voirTuto" tabindex="-1" aria-disabled="true" Title="">
                    Tuto</a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kézako
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"> La skincare routine coréenne </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Votre diagnostic </a>
                  </div>
                </li>

                <?php error_reporting(0);
                if($_SESSION['connect'] == !'oui')
                {
                  echo '<li class="nav-item">
                    <a class="nav-link " href="index.php?uc=login&action=connected" tabindex="-1" aria-disabled="true" Title="Connectez-vous pour plus de contenu">Connexion</a>
                  </li>';
                }
                ?>
                <?php error_reporting(0);
                if($_SESSION['connect'] == 'oui')
                {
                  echo
                 '<li class ="nav-item">
                    <a class ="nav-link" href="index.php?uc=login&action=connected"> Gestion des Produits </a>
                  </li>
                 <li class="nav-item">
                    <a class="nav-link " href="index.php?uc=login&action=deco" tabindex="-1" aria-disabled="true" >Deconnexion</a>
                  </li>';
                }
                ?>

          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $this->e($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
<!--     <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">        
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"> -->
    
    <link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">  
    <!-- jQuery library -->
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    Latest compiled JavaScript
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" href="<?= $this->assetUrl('css/simple-sidebar.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/styles.css') ?>">


        <!-- Permet des inclusions dans mon head depuis la vue -->
    <?php echo $this->section("head") ?>

</head>
<body>

<!-- Début Top header -->
    <main class="container-fluid topheader">
        <div class="row">
            <div class="col-lg-12 top-header">
                <ul class="reseau">
                    <li><a href="<?php echo $this->url('login') ?>">connexion</a></li>
                    <li><a href="#"><img src="<?= $this->assetUrl('img/facebook_logos.png') ?>" alt="logos" class="img-responsive"></a></li>
                    <li> <a href="#"><img src="<?= $this->assetUrl('img/whatsapp_logo.png') ?>" alt="logos" class="img-responsive"></a></li>
                </ul>
            </div>
        </div>
        <div class="row">

                <div class="col-sm-3">
                    <a href="#"><img src="<?= $this->assetUrl('img/quiz_au-soeeeleil-soleil_29832.png') ?>" alt="logos" class="img-responsive img-circle logos" width= "260px;"></a>
                </div>

                <div class="col-sm-6">
                   <img class="img-responsive carousel" src="/Alliance-Sociale/public/assets/img/13725086_999551693491252_5244655575039982654_o.jpg"/>
                </div>

               <!--  <div class="col-sm-3">
                    <script charset='UTF-8' src='http://www.meteofrance.com/mf3-rpc-portlet/rest/vignettepartenaire/97226011/type/VILLE_FRANCE/size/PAYSAGE_VIGNETTE' type='text/javascript'></script>    
                                                
                </div> -->
        </div>
            
       
    </main>
 
<!-- Fin Top header -->
 <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=""></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo $this->url('default_home') ?>">Accueil</a></li>
            <li class="dropdown">

              <a href="<?php echo $this->url('default_home') ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Presentation
                <span class="caret"></span>
              </a>

              <ul class="dropdown-menu">
                <li><a href="<?php echo $this->url('default_home') ?>">Qui sommes nous</a></li>
        <!--         <li>La Mission</li>
                <li>L'équipe</li>
                <li>Témoignages</li> -->
              </ul>
            </li>

            <li class="dropdown">
              <a href="<?php echo $this->url('default_home') ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Evènements
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>Evènements à venir</li>
                <li>Evènements passés</li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="<?php echo $this->url('default_home') ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Nos Activités
                <span class="caret"></span>
              </a>

              <ul class="dropdown-menu">
                <li>Vie Sociale</li>
                <li>Citoyenneté</li>
                <li>Vie Quotidienne</li>
                <li>Education</li>
                <li>Sports et Loisirs</li>
                <li>Animation</li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="<?php echo $this->url('default_home') ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Contactez nous
                <span class="caret"></span>
              </a>

              <ul class="dropdown-menu">
                <li>Où sommes-nous</li>
                <li>Nos sites</li>
                <li>La Commune</li>
                <li>Formations</li>
                <li>Bénévolat</li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="<?php echo $this->url('default_home') ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Inscriptions
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>Activités</li>
                <li>Animation</li>
                <li>Adhésions</li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="<?php echo $this->url('default_home') ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Galeries
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>Medias souvenirs</li>
                <li>Derniers évènements</li>
                <li>Vidéos</li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>



        <section class="containerss1">
          <p>Flux Facebook</p>
        </section>
        <section class="containerss">
            <?= $this->section('main_content') ?>
        </section>
        <section class="containerss2">
            <p>calendrier</p>
        </section>

    <!-- Début footer -->
        <footer class="bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-sm-6 text-center">
                                <h3>Centre Social Alliance sociale</h3>
                                <p>LCR Résidence Gaïac<br>
                                Quartier Cédalise<br>
                                97290 LE MARIN<br></p>

 <!--                                <div class="slider">
                                    Slider partenaire
                                </div> -->
                            </div>

                            <div class="col-sm-4 text-center">
                                <h3>Horaire</h3>

                                <p>Le lundi : de 8h00 à 12h00 et de 13h00 à 17h00<br>
                                Du Mardi au Vendredi : 8h00 à 17h00<br>
                                Le Samedi : 9h00 à 12h00 et de 14h00 à 17h00</p>
                            </div>

                            <div class="col-md-12 text-center">
                               C.CASCA J.DESTIN C.JEAN-TOUSSAINT E-L.ROBARD R.MARIE-LUCE  &copy; 2017 
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </footer>

    <!-- Fin footer -->

    <!-- jQuery -->
    <script src="<?= $this->assetUrl('js/jquery.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script>


<!-- Permet des inclusions de scripts depuis la vue -->
    <?php echo $this->section("script") ?>


</body>
</html>
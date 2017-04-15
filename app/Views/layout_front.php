<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $this->e($title) ?></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Permet la compatibilité avec MS IE-EDGE -->
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <!-- Google font Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet"> 

    <!-- Bootstrap CSS -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?=$this->assetUrl('css/bootstrap.min.css')  ?>">

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->

    <!-- Google font Open -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    

    <link rel="stylesheet" href="<?= $this->assetUrl('css/simple-sidebar1.css') ?>">

    <!-- Permet des inclusions dans mon head depuis la vue -->
    <?php echo $this->section("head") ?>
</head>
<body>
<div class="container">
  <!-- Topper w/ logo -->
   <!-- End Topper -->
  <!-- Navigation -->
  <div class="row">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand visible-xs-inline-block nav-logo" href="#">Alliance Sociale</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav js-nav-add-active-class">
            <li class="active"><a href="#">Accueil</a></li>

            <li><a href="#">Presentation<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li>Qui sommes nous</li>
                <li>La Mission</li>
                <li>L'équipe</li>
                <li>Témoignages</li>
              </ul></li>

            <li><a href="#">Evènements<span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>Evènements à venir</li>
                <li>Evènements passés</li>
              </ul></a></li>

            <li><a href="#">Nos Activités<span class="caret"></span>
              </a>

              <ul class="dropdown-menu">
                <li>Vie Sociale</li>
                <li>Citoyenneté</li>
                <li>Vie Quotidienne</li>
                <li>Education</li>
                <li>Sports et Loisirs</li>
                <li>Animation</li>
              </ul></a></li>

            <li><a href="#">Contactez nous<span class="caret"></span>
              </a>

              <ul class="dropdown-menu">
                <li>Où sommes-nous</li>
                <li>Nos sites</li>
                <li>La Commune</li>
                <li>Formations</li>
                <li>Bénévolat</li>
              </ul></a></li>

            <li><a href="#">Inscriptions<span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>Activités</li>
                <li>Animation</li>
                <li>Adhésions</li>
              </ul></a></li>

            <li class="visible-xs-block"><a href="#">Qui sommes nous?</a></li>
            <li class="visible-xs-block"><a href="#">Témoignages</a></li>
            <li class="visible-xs-block"><a href="#">Actualités</a></li>
            <li class="visible-xs-block"><a href="#">Support</a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Galeries<span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>Medias souvenirs</li>
                <li>Derniers évènements</li>
                <li>Vidéos</li>
              </ul><b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Press Release</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div>
    </nav>
  </div>
</div>



      <main class="content">
        <div>
            <?= $this->section('main_content') ?>
        </div>    
    </main>      

<body>
</html>
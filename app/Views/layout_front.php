<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $this->e($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">        
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?= $this->assetUrl('css/simple-sidebar.css') ?>">
    <!-- <link rel="stylesheet" href="<?= $this->assetUrl('css/styles.css') ?>"> -->


        <!-- Permet des inclusions dans mon head depuis la vue -->
    <?php echo $this->section("head") ?>

</head>
<body>

 <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Alliance Sociale</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Accueil</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Presentation<span class="caret"></span></a>
              <ul class="dropdown-menu">
                            <li>Qui sommes nous</li>
                            <li>La Mission</li>
                            <li>L'équipe</li>
                            <li>Témoignages</li>
                </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Evènements<span class="caret"></span></a>
              <ul class="dropdown-menu">
                            <li>Evènements à venir</li>
                            <li>Evènements passés</li>
                </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nos Activités<span class="caret"></span></a>
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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contactez nous<span class="caret"></span></a>
              <ul class="dropdown-menu">
                            <li>Où sommes-nous</li>
                            <li>Nos sites</li>
                            <li>La Commune</li>
                            <li>Formations</li>
                            <li>Bénévolat</li>
                </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inscriptions<span class="caret"></span></a>
              <ul class="dropdown-menu">
                            <li>Activités</li>
                            <li>Animation</li>
                            <li>Adhésions</li>
                </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Galeries<span class="caret"></span></a>
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



        <div>
            <?= $this->section('main_content') ?>
        </div>
          

    <!-- jQuery -->
    <script src="<?= $this->assetUrl('js/jquery.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= $this->assetUrl('js/bootstrap.min.js'); ?>"></script>


<!-- Permet des inclusions de scripts depuis la vue -->
    <?php echo $this->section("script") ?>
</body>
</html>
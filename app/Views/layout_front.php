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
    <link rel="stylesheet" href="<?= $this->assetUrl('css/styles.css') ?>">


        <!-- Permet des inclusions dans mon head depuis la vue -->
    <?php echo $this->section("head") ?>

</head>
<body>

 <nav>
       <img class="logo" src="<?= $this->assetUrl('img/quiz_au-soeeeleil-soleil_29832.png') ?>" width="70px"//>
        <ul>
            <li class="accueil"><a href="index.php">Accueil</a></li>
            <li class="presentation"><a href="presentation.php">Presentation</a>
                <ul class="submenu">
                    <li><a href="#">Qui sommes-nous</a>
                    <p>
                        <img class="logo" src="<?= $this->assetUrl('img/maxresdefault.jpg') ?>" width="80px"/>
                    </p>
                    <p class="resume">
                       Afin de répondre aux besoins des administrés et de faciliter le quotidien des parents, la ville met à votre disposition « l’Espace Famille ».  
                    </p>
                    </li>
                    <li><a href="#">La Mission</a></li>
                    <li><a href="#">L'équipe</a></li>
                    <li><a href="#">Témoignages</a></li>
                </ul>
            </li>
            <li class="evenements"><a href="evenements.php">Evènements</a>
                <ul class="submenu">
                    <li><a href="#">Evènements à venir</a></li>
                    <li><a href="#">Evènements passés</a></li>
                </ul>
            </li>
            <li class="activites"><a href="http://localhost/PROJET/Alliance-Sociale/public/activities/">Nos Activités</a>
                <ul class="submenu">
                    <li><a href="#">Vie Sociale</a></li>
                    <li><a href="#">Citoyenneté</a></li>
                    <li><a href="#">Vie Quotidienne</a></li>
                    <li><a href="#">Education</a></li>
                    <li><a href="#">Sports et Loisirs</a></li>
                    <li><a href="#">Animation</a></li>
                </ul>
            </li>
            <li class="contact"><a href="contact.php">Contactez nous</a>
                <ul class="submenu">
                    <li><a href="#">Où sommes-nous</a></li>
                    <li><a href="#">Nos sites</a></li>
                    <li><a href="#">La Commune</a></li>
                    <li><a href="#">Formations</a></li>
                    <li><a href="#">Bénévolat</a></li>
                </ul>
            </li>
            <li class="inscription"><a href="inscription.php">Inscriptions</a>
                <ul class="submenu">
                    <li><a href="#">Activités</a></li>
                    <li><a href="#">Animation</a></li>
                    <li><a href="#">Adhésions</a></li>
                </ul>
            </li>
            <li class="galeries"><a href="galeries.php">Galeries</a>
                <ul class="submenu">
                    <li><a href="#">Photos souvenirs</a></li>
                    <li><a href="#">Derniers évènements</a></li>
                    <li><a href="#">Vidéos</a></li>
                </ul>
            </li>
            <li class="galeries"><a href="http://localhost/PROJET/Alliance-Sociale/public/">Espace Administration</a></li>
        </ul>
    </nav>




        <div>
            <?= $this->section('main_content') ?>
        </div>
          

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


<!-- Permet des inclusions de scripts depuis la vue -->
    <?php echo $this->section("script") ?>
</body>
</html>
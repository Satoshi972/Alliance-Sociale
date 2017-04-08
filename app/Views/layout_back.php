<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $this->e($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">        
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/styless.css') ?>"> -->
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?= $this->assetUrl('css/simple-sidebar.css') ?>">
</head>
<body>
 <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <p class="titre1">
                        Espace Administration
                    </p>
                </li>
                <li class="dropdown">
                <a href="page-parente.html" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                aria-expanded="false">Gestion des utilisateurs <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                    <a href="#">Création</a>
                </li>
                <li>
                    <a href="#">Suppression</a>
                </li>
                <li>
                    <a href="#">Modification</a>
                </li>
                <li>
                    <a href="#">Détails de l'utilisateur</a>
                </li>
                <li>
                    <a href="#">Contact direct</a>
                </li>
                </ul>
                </li>
                <li>
                    <p class="titre">Gestion des utilisateurs</p>
                </li>
                
                 <li>
                    <p class="titre">Gestion des activités</p>
                </li>
                </li>
                <li>
                    <a href="#">Création activité</a>
                </li>
                <li>
                    <a href="#">Suppression activité</a>
                </li>
                <li>
                    <a href="#">Modification activité</a>
                </li>
                <li>
                    <a href="#">Détails de l'activité</a>
                </li>
                <li>
                    <a href="#">Association Médias</a>
                </li>
                <li>
                    <p class="titre">Gestion fiche de contact</p>
                </li>
                </li>
                <li>
                    <a href="#">Liste des fiches</a>
                    <ul>
                    <li><a href="#">Détails de de la fiche</a>
                        <ul>
                            <li><a href="#">Marquer comme lu</a></li>
                            <li><a href="#">Suppression</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Recherche mot clé</a></li>
                    </ul>
                </li>
                <li>
                    <p class="titre">Gestion des activités</p>
                </li>
                </li>
                <li>
                    <a href="#">Création event</a>
                </li>
                <li>
                    <a href="#">Modification event</a>
                </li>
                <li>
                    <a href="#">Association Médias</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->section('main_content') ?>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Afficher menu Admin</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>
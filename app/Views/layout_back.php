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
    <!-- 66-->
    <?php echo $this->section("sliderCss") ?>
    
    <!-- Font awesome -->
    <link rel="stylesheet" href="<?=$this->assetUrl('css/font-awesome.min.css')  ?>">
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->

    <!-- Google font Open -->

    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">        
    <link href="<?=$this->assetUrl('css/bootstrap.min.css')  ?>">
    <link href="<?=$this->assetUrl('css/font-awesome.min.css')  ?>">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">



    

    <link rel="stylesheet" href="<?= $this->assetUrl('css/simple-sidebar1.css') ?>">

    <!-- Permet des inclusions dans mon head depuis la vue -->
    
    <?php echo $this->section("head") ?>
</head>


<body>
    <div id="navbar-wrapper">
        <header>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo $this->url('admin') ?>">Espace Administration</a>
                    </div>
                    <div id="navbar-collapse" class="collapse navbar-collapse">
                        
                        <ul class="nav navbar-nav navbar-right navdate">
                            <li class="dropdown">
                                <?php
                                  setlocale(LC_TIME, 'fra_fra');
                                  echo strftime('<BR>%A %d %B %Y'); // jeudi 11 octobre 2012, 16:03
                                ?>
                                <ul class="dropdown-menu dropdown-menu-flag" role="menu">
                                    <li>
                                        <a href="#">
                                            <img src="<?= $this->assetUrl('img/whatsapp_PNG23.png') ?>" alt="Français" width="28px" height="18px">
                                            <span>Français</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a id="user-profile" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= $this->assetUrl('img/user-icon-png-pnglogocom.img.png') ?>" class="img-responsive img-thumbnail img-circle">Identifiant</a>
                                <ul class="dropdown-menu dropdown-block" role="menu">
                                    <!-- <li><a href="#">Mon compte</a></li> -->
                                    <li><a href="logout">Déconnexion</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </div>

    <div id="wrapper">
        <div id="sidebar-wrapper">

            <aside id="sidebar">
                <ul id="sidemenu" class="sidebar-nav">
                    <div class="container-fluid">
  
                      <div class="row">
                          
                          <!-- menu -->
                          <div id="MainMenu">
                            <div class="list-group panel">

                              <?php if($w_user['role'] === 'admin'): ?>
                              <a href="#demo1" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
                                <span class="sidebar-icon"><i class="fa fa-users"></i></span>
                                <span class="sidebar-title">
                                      Gestion des utilisateurs  
                                  <i class="fa fa-caret-down"></i>
                                </span>
                              </a>
                              <?php endif; ?>
                              <div class="collapse" id="demo1">
                                <a href="<?= $this->url('list_users') ?>" class="list-group-item">Liste des Utilisateurs</a>
                                <a href="<?= $this->url('add_users') ?>" class="list-group-item">Ajout d'utilisateur</a>
                              </div>
                              
                              <a href="#demo2" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
                                <span class="sidebar-icon"><i class="fa fa-users"></i></span>
                                <span class="sidebar-title">
                                      Gestion Fiche de contact  
                                  <i class="fa fa-caret-down"></i>
                                </span>
                              </a>


                              <div class="collapse" id="demo2">
                                <a href="<?= $this->url('contactList') ?>" class="list-group-item">Liste des fiches</a>
                                
                              </div>


                              <a href="#demo3" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
                                <span class="sidebar-icon">
                                  <i class="fa fa-calendar" aria-hidden="true"></i>
                                </span>
                                <span class="sidebar-title">
                                    Gestion des Evènements   
                                <i class="fa fa-caret-down"></i>
                                </span>
                              </a>

                              <div class="collapse" id="demo3">
                                <a href="<?= $this->url('addEvent') ?>" class="list-group-item">Ajouter un évènement</a>
                                <a href="<?= $this->url('listEvent') ?>" class="list-group-item">Liste des Evènements</a>
                              </div>

                              <a href="#demo4" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
                                <span class="sidebar-icon">
                                  <i class="fa fa-fire" aria-hidden="true"></i>
                                </span>
                                <span class="sidebar-title">
                                      Gestion des Activités   
                                  <i class="fa fa-caret-down"></i>
                                </span>
                              </a>

                              <div class="collapse" id="demo4">
                                <a href="<?= $this->url('list_activite') ?>" class="list-group-item">Liste des Activités</a>
                                <a href="<?= $this->url('add_activite') ?>" class="list-group-item">Ajouter une activité</a>
                              </div>

                              <a href="#demo5" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
                                <span class="sidebar-icon">
                                  <i class="fa fa-camera" aria-hidden="true"></i>
                                </span>
                                <span class="sidebar-title">            
                                      Médias   
                                  <i class="fa fa-caret-down"></i>
                                </span>
                              </a>

                              <div class="collapse" id="demo5">
                                <a href="<?= $this->url('addmedias') ?>" class="list-group-item">Ajouter un média</a>
                                <a href="<?= $this->url('listMediasBack',['page'=>1]) ?>" class="list-group-item">Galerie</a>
                              </div>

                              <a href="#demo6" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
                                <span class="sidebar-icon">
                                  <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                </span>
                                <span class="sidebar-title">            
                                      Partenaires   
                                  <i class="fa fa-caret-down"></i>
                                </span>
                              </a>

                              <div class="collapse" id="demo6">
                                <a href="<?= $this->url('add_partners') ?>" class="list-group-item">Ajouter un partenaire</a>
                                <a href="<?= $this->url('partners') ?>" class="list-group-item">liste des partenaires</a>
                              </div>

                            </div>
                          </div>

                      </div>

                    </div>
                </ul>
            </aside> 

        </div>


        <main id="page-content-wrapper" role="main">
          
              <?= $this->section('main_content') ?>
          
        </main>

    </div> 

  <!-- Zone de script -->

  <!-- jQuery library -->

  <script src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>
  <script src="<?= $this->assetUrl('js/jquery-ui.min.js') ?>"></script>
  <script src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script>
 
  <!-- Permet des inclusions de scripts depuis la vue -->
  <?php echo $this->section("script") ?>


  <!-- Fin zone de script -->
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $this->e($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Permet la compatibilité avec MS IE-EDGE -->
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- 66-->
    <?php echo $this->section("sliderCss") ?>
    
    <!-- Font awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Google font Open -->

    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet"> 

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <link rel="stylesheet" href="<?= $this->assetUrl('css/back.css') ?>">

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
                                <a id="user-profile" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= $this->assetUrl('img/deconnexion.png') ?>" style="width: 40px;height: 40px;" class="img-responsive">Déconnexion</a>
                                <ul class="dropdown-menu dropdown-block" role="menu">
                                    <!-- <li><a href="#">Mon compte</a></li> -->
                                    <li><a href="<?php echo $this->url('default_home') ?>">Aller sur le site</a></li>
                                    <li><a href="<?php echo $this->url('logout') ?>">Se déconnecter</a></li>
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
                                <a href="<?= $this->url('add_activite') ?>" class="list-group-item">Ajouter une activité</a>
                                <a href="<?= $this->url('list_activite') ?>" class="list-group-item">Liste des Activités</a>
                              </div>

                              <a href="#demo1" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
                                <span class="sidebar-icon"><i class="fa fa-users"></i></span>
                                <span class="sidebar-title">
                                      Gestion des utilisateurs  
                                  <i class="fa fa-caret-down"></i>
                                </span>
                              </a>
                              <div class="collapse" id="demo1">
                                <a href="<?= $this->url('add_users') ?>" class="list-group-item">Ajout d'utilisateur</a>
                                <a href="<?= $this->url('list_users', ['page'=> 1,'age1' => 0, 'age2'=> 150]) ?>" class="list-group-item">Liste des Utilisateurs</a>
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
                              
                              <a href="#demo2" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
                                <span class="sidebar-icon"><i class="fa fa-sticky-note" aria-hidden="true"></i>
                                </span>
                                <span class="sidebar-title">
                                      Gestion Fiche de contact  
                                  <i class="fa fa-caret-down"></i>
                                </span>
                              </a>

                              <div class="collapse" id="demo2">
                                <a href="<?= $this->url('contactList',['page'=> 1]) ?>" class="list-group-item">Liste des fiches</a>
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
                              
                              <a href="#management" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
                                <span class="sidebar-icon">
                                  <i class="fa fa-info" aria-hidden="true"></i>

                                </span>
                                <span class="sidebar-title">            
                                      Gestion du site   
                                  <i class="fa fa-caret-down"></i>
                                </span>
                              </a>

                              <div class="collapse" id="management">
                                <a href="<?= $this->url('updateAboutInfos') ?>" class="list-group-item">Informations à propos</a>
                              </div>

                              <a href="#statistics" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
                                <span class="sidebar-icon">
                                  <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                </span>
                                <span class="sidebar-title">            
                                      Statistiques  
                                  <i class="fa fa-caret-down"></i>
                                </span>
                              </a>

                              <div class="collapse" id="statistics">
                                <a href="<?= $this->url('userStat') ?>" class="list-group-item">Nombre d'adhérent</a>
                              </div>
                            <?php else: ?>
                              <a href="#demo1" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
                                <span class="sidebar-icon"><i class="fa fa-users"></i></span>
                                <span class="sidebar-title">
                                      Gestion des utilisateurs  
                                  <i class="fa fa-caret-down"></i>
                                </span>
                              </a>
                              <div class="collapse" id="demo1">
                                <a href="<?= $this->url('add_users') ?>" class="list-group-item">Ajout d'utilisateur</a>
                                <a href="<?= $this->url('list_users', ['page'=> 1,'age1' => 0, 'age2'=> 150]) ?>" class="list-group-item">Liste des Utilisateurs</a>
                              </div>
                            <?php endif; ?>
                            </div>
                          </div>

                      </div>

                    </div>
                </ul>
            </aside> 

        </div>


        <main id="page-content-wrapper" role="main" class="container">
          
              <?= $this->section('main_content') ?>
          
        </main>

    </div> 

  <!-- Zone de script -->

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <!-- JQuery UI -->
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
  <!-- Bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="<?= $this->assetUrl('js/function.js') ?>"></script>
  <script>
    $(function()
    {
      var timerIn = 200;
      var timerOut = 200;
      $('ul.nav li.dropdown').hover(function() {
          $(this).find('> .dropdown-menu').stop(true, true).fadeIn(timerIn);
          $(this).addClass('open');
      }, function() {
          $(this).find('> .dropdown-menu').stop(true, true).fadeOut(timerOut);
          $(this).removeClass('open');
      });
    })
  </script>
  <!-- Permet des inclusions de scripts depuis la vue -->
  <?php echo $this->section("script") ?>


  <!-- Fin zone de script -->
</body>
</html>
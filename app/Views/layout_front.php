<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $this->e($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
<!--     <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">        
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"> -->


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lobster|Merienda" rel="stylesheet">
   
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <!-- CDN bootstrap nécessaire pour slider partner -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">  
    <!-- jQuery library -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
    <!--Latest compiled JavaScript -->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <?php echo $this->section("cdn") ?>
    <link rel="stylesheet" href="<?= $this->assetUrl('css/frontother.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/jumboCss.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/simple-sidebar.css') ?>">

    <link rel="stylesheet" href="<?= $this->assetUrl('css/front.css') ?>">

    <!-- CSS pour le calendrier -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/fullcalendar.min.css') ?>">

    <!-- slider -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/sliderPartners.css') ?>">

        <!-- Permet des inclusions dans mon head depuis la vue -->
    <?php echo $this->section("head") ?>

</head>
<body>
		<div id="page">
		<div><img class="img-responsive projector" src="<?= $this->assetUrl('img/montage.jpg') ?>" style="margin:0 auto;"></div>

 <!-- Navigation -->
    <nav id="navigation" class="navbar navbar-inverse navbar-center" role="navigation">
        <div class="container-fluid centernav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $this->url('default_home') ?>"><img id="minilogo" class="minilogo" style="width:31%" src="<?= $this->assetUrl('img/minilogoAllianceSociale.png') ?>"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-center">
                    <li>
                        <a class="lienmenu" href="<?php echo $this->url('default_home') ?>">Accueil</a>
                    </li>
                    <li>

              <a class="lienmenu" href="<?php echo $this->url('about') ?>">Présentation</a></li>
                    
                    <li class="dropdown">
                        <a class="lienmenu" href="<?php echo $this->url('default_home') ?>" class="dropdown-toggle" data-toggle="dropdown">Evènements <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo $this->url('listPastEvent') ?>">Evènements passés</a>
                            </li>
                            <li>
                                <a href="<?php echo $this->url('default_home') ?>">Evènements à venir</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
            <a class="lienmenu" href="<?php echo $this->url('default_home') ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Nos Activités<span class="caret"></span></a>

              <ul class="dropdown-menu">
      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Formations <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="<?php echo $this->url('details_activite',['id'=>10]) ?>">Formation du personnel</a></li>
          <li><a tabindex="-1" href="<?php echo $this->url('details_activite',['id'=>11]) ?>">Prevention et secours civique</a></li>
          <li><a tabindex="-1" href="<?php echo $this->url('details_activite',['id'=>12]) ?>">BAFA</a></li>
        </ul>
      </li>
      <li class="dropdown-submenu">
        <a  class="test" tabindex="-1" href="#">Comité des jeunes </a>
      </li>
      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Sports et loisirs <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="<?php echo $this->url('details_activite',['id'=>1]) ?>">Gymnastique</a></li>
          <li><a tabindex="-1" href="<?php echo $this->url('details_activite',['id'=>2]) ?>">Judo</a></li>
          <li><a tabindex="-1" href="<?php echo $this->url('details_activite',['id'=>3]) ?>">Zumba</a></li>
          <li><a tabindex="-1" href="<?php echo $this->url('details_activite',['id'=>4]) ?>">Randonnée</a></li>
          <li><a tabindex="-1" href="<?php echo $this->url('details_activite',['id'=>6]) ?>">Danse traditionnelle</a></li>
          <li><a tabindex="-1" href="<?php echo $this->url('details_activite',['id'=>7]) ?>">Accueil de loisirs (sans hébergement)</a></li>
          <li><a tabindex="-1" href="<?php echo $this->url('details_activite',['id'=>8]) ?>">Couture</a></li>
          <li><a tabindex="-1" href="<?php echo $this->url('details_activite',['id'=>9]) ?>">Cuisine</a></li>
        </ul>
      </li>
      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Education<span class="caret"></span></a> 
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="<?php echo $this->url('details_activite',['id'=>5]) ?>">Accompagnement scolaire</a></li>
        </ul>
      </li>
      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Animation<span class="caret"></span></a> 
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="<?php echo $this->url('details_activite',['id'=>13]) ?>">Autres</a></li>
        </ul>
                  </li></ul>
      
                    <li>
                        <a class="lienmenu" href="<?php echo $this->url('contactfront') ?>">Contactez nous</a>
                    </li>
                    <li>
                        <a class="lienmenu" href="<?php echo $this->url('accession') ?>">Adhésion</a>
                    </li>
                    <li class="dropdown">
                          <?php if(empty($w_user)): ?>

                         <a class="lienmenu" href="<?php echo $this->url('listMedias',['page'=>1]) ?>"> Galeries</a>

                         <?php else: ?>

                        <a class="lienmenu" href="<?php echo $this->url('listMediasGuest',['page'=>1]) ?>">Galeries</a>

                         <?php endif; ?>
                    </li>
                    <?php if (empty($w_user)): ?>
                    <li class="dropdown"><a  class="lienmenu" href="<?php echo $this->url('login') ?>"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Connexion</a></li>
                    <?php else: ?>
                    <li class="dropdown"><a  class="lienmenu" href="<?php echo $this->url('logout') ?>"><i class="fa fa-power-off" aria-hidden="true"></i> Déconnexion</a></li>
                    <?php endif ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    
<div class="container-fluid contentpart">


    <!-- Marketing Icons Section -->
    <div class="row">
        
        
        <!-- main content -->
        <div class="col-md-6 col-md-push-3">
            <div class="panel panel-default">
                <!--<div class="panel-heading">
                    <!--<h1 style="text-align:center"><i class="fa fa-fw fa-gift"></i></h1>-->
                <!--</div>-->
                <div class="panel-body contenu">
                  <?= $this->section('main_content') ?>
                </div>
            </div>
        </div>
        <!-- fin main content -->
        
        <div id="fbsidebarlittle" class="col-md-3 col-md-pull-6 fbscroll">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 style="text-align:center"><i class="fa fa-fw fa-check"></i>Suivez nous sur Facebook</h2>

                </div>
                <!-- Zone d'inclusion de Facebook -->
                <div class="panel-body fb-place">
                  <div class="fb-page little-fb" data-href="https://www.facebook.com/AllianceSocialeduMarin/" data-width="250" data-hide-cover="false" data-show-facepile="false" data-show-posts="false">
                  </div>
               
                  <div class="fb-page big-fb" data-href="https://www.facebook.com/AllianceSocialeduMarin/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/AllianceSocialeduMarin/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/AllianceSocialeduMarin/">Alliance Sociale</a></blockquote></div>
                </div>
                <!-- Fin zone de facebook -->
            </div>
        </div>
        
        <div id="fbsidebarmiddle" data-spy="affix" data-offset-top="350" data-offset-bottom="350" class="col-md-3 col-md-pull-6 fbscroll">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 style="text-align:center"><i class="fa fa-fw fa-check"></i>Suivez nous sur Facebook</h2>

                </div>
                <!-- Zone d'inclusion de Facebook -->
                <div class="panel-body fb-place">
                  <div class="fb-page little-fb" data-href="https://www.facebook.com/AllianceSocialeduMarin/" data-width="250" data-hide-cover="false" data-show-facepile="false" data-show-posts="false">
                  </div>
               
                  <div class="fb-page big-fb" data-href="https://www.facebook.com/AllianceSocialeduMarin/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/AllianceSocialeduMarin/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/AllianceSocialeduMarin/">Alliance Sociale</a></blockquote></div>
                </div>
                <!-- Fin zone de facebook -->
            </div>
        </div>
        
        <div id="fbsidebarbig" data-spy="affix" data-offset-top="350" data-offset-bottom="550" class="col-md-3 col-md-pull-6 fbscroll">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 style="text-align:center"><i class="fa fa-fw fa-check"></i>Suivez nous sur Facebook</h2>

                </div>
                <!-- Zone d'inclusion de Facebook -->
                <div class="panel-body fb-place">
                  <div class="fb-page little-fb" data-href="https://www.facebook.com/AllianceSocialeduMarin/" data-width="250" data-hide-cover="false" data-show-facepile="false" data-show-posts="false">
                  </div>
               
                  <div class="fb-page big-fb" data-href="https://www.facebook.com/AllianceSocialeduMarin/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/AllianceSocialeduMarin/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/AllianceSocialeduMarin/">Alliance Sociale</a></blockquote></div>
                </div>
                <!-- Fin zone de facebook -->
            </div>
        </div>
        
        
        
        <div id="calendarsidebarlittle"  class="col-md-3 calendarscroll">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 style="text-align:center"><i class="fa fa-fw fa-compass"></i>Calendrier d'évènements</h2>
            </div>
            <div class="panel-body img-responsive">
              <!-- Zone calendrier -->
              <div id="calendar"></div>
              <!-- detail de mon event -->
              <div id="fullCalModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                            <h4 id="modalTitle" class="modal-title"></h4>
                        </div>
                        <img id="picture" class="modal-body img-responsive img-thumbnail text-center " style="width: 100% !important;"alt='Affiche'>
                        <div id="modalBody" class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a id="link" ><button class="btn btn-primary">Plus d'infos</button></a>
                        </div>
                    </div>
                </div>
              </div>
              <!-- Fin Zone calendrier -->
              <br>    
              <!-- Zone méteo -->
              <div class="meteo">
               <iframe src="https://www.meteoblue.com/fr/meteo/widget/daily/le-marin_martinique_3570426?geoloc=fixed&days=4&tempunit=CELSIUS&windunit=KILOMETER_PER_HOUR&coloured=coloured&pictoicon=0&pictoicon=1&maxtemperature=0&maxtemperature=1&mintemperature=0&mintemperature=1&windspeed=0&windspeed=1&windgust=0&winddirection=0&uv=0&humidity=0&precipitation=0&precipitationprobability=0&spot=0&pressure=0&layout=light"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups" style="width: 100%;height: 370px"></iframe><div><!-- DO NOT REMOVE THIS LINK --><a href="https://www.meteoblue.com/fr/meteo/prevision/semaine/le-marin_martinique_3570426?utm_source=weather_widget&utm_medium=linkus&utm_content=daily&utm_campaign=Weather%2BWidget" target="_blank"></a></div>      
              </div>
                <!-- Fin zone météo -->
            </div>
        </div>
    </div>
        
        <div id="calendarsidebarmiddle"  data-spy="affix" data-offset-top="350" data-offset-bottom="350"  class="col-md-3 calendarscroll">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 style="text-align:center"><i class="fa fa-fw fa-compass"></i>Calendrier d'évènements</h2>
            </div>
            <div class="panel-body img-responsive">
              <!-- Zone calendrier -->
              <div id="calendar2"></div>
              <!-- detail de mon event -->
              <div id="fullCalModal2" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                            <h4 id="modalTitle2" class="modal-title"></h4>
                        </div>
                        <img id="picture2" class="modal-body img-responsive img-thumbnail text-center " style="width: 100% !important;"alt='Affiche'>
                        <div id="modalBody2" class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a id="link2" ><button class="btn btn-primary">Plus d'infos</button></a>
                        </div>
                    </div>
                </div>
              </div>
              <!-- Fin Zone calendrier -->
              <br>    
              <!-- Zone méteo -->
              <div class="meteo">
               <iframe src="https://www.meteoblue.com/fr/meteo/widget/daily/le-marin_martinique_3570426?geoloc=fixed&days=4&tempunit=CELSIUS&windunit=KILOMETER_PER_HOUR&coloured=coloured&pictoicon=0&pictoicon=1&maxtemperature=0&maxtemperature=1&mintemperature=0&mintemperature=1&windspeed=0&windspeed=1&windgust=0&winddirection=0&uv=0&humidity=0&precipitation=0&precipitationprobability=0&spot=0&pressure=0&layout=light"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups" style="width: 100%;height: 370px"></iframe><div><!-- DO NOT REMOVE THIS LINK --><a href="https://www.meteoblue.com/fr/meteo/prevision/semaine/le-marin_martinique_3570426?utm_source=weather_widget&utm_medium=linkus&utm_content=daily&utm_campaign=Weather%2BWidget" target="_blank"></a></div>      
              </div>
                <!-- Fin zone météo -->
            </div>
        </div>
    </div>
    
    <div id="calendarsidebarbig"  data-spy="affix" data-offset-top="350" data-offset-bottom="550"  class="col-md-3 calendarscroll">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 style="text-align:center"><i class="fa fa-fw fa-compass"></i>Calendrier d'évènements</h2>
            </div>
            <div class="panel-body img-responsive">
              <!-- Zone calendrier -->
              <div id="calendar3"></div>
              <!-- detail de mon event -->
              <div id="fullCalModal3" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                            <h4 id="modalTitle3" class="modal-title"></h4>
                        </div>
                        <img id="picture3" class="modal-body img-responsive img-thumbnail text-center " style="width: 100% !important;"alt='Affiche'>
                        <div id="modalBody3" class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a id="link3" ><button class="btn btn-primary">Plus d'infos</button></a>
                        </div>
                    </div>
                </div>
              </div>
              <!-- Fin Zone calendrier -->
              <br>    
              <!-- Zone méteo -->
              <div class="meteo">
               <iframe src="https://www.meteoblue.com/fr/meteo/widget/daily/le-marin_martinique_3570426?geoloc=fixed&days=4&tempunit=CELSIUS&windunit=KILOMETER_PER_HOUR&coloured=coloured&pictoicon=0&pictoicon=1&maxtemperature=0&maxtemperature=1&mintemperature=0&mintemperature=1&windspeed=0&windspeed=1&windgust=0&winddirection=0&uv=0&humidity=0&precipitation=0&precipitationprobability=0&spot=0&pressure=0&layout=light"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups" style="width: 100%;height: 370px"></iframe><div><!-- DO NOT REMOVE THIS LINK --><a href="https://www.meteoblue.com/fr/meteo/prevision/semaine/le-marin_martinique_3570426?utm_source=weather_widget&utm_medium=linkus&utm_content=daily&utm_campaign=Weather%2BWidget" target="_blank"></a></div>      
              </div>
                <!-- Fin zone météo -->
            </div>
        </div>
    </div>
    
  </div>
            </div>          
        


<!-- Début footer -->
<div class="container-fluid">

<footer id="footerx">

  <h3 style="text-align:center">Partenaires</h3>
       <!--Item slider text-->


  <!-- Item slider-->
  <!--<div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="carousel carousel-showmanymoveone slide" id="itemslider">-->
          <!-- Carousel inner -->
          <!--<div class="carousel-inner">
            <div class="item active">
              <div class="col-xs-12 col-sm-6 col-md-2">
                <a href="#"><img src="<?= $this->assetUrl('img/partners/sa.png') ?>" class="img-responsive center-block"></a>-->
   <!--              <h4 class="text-center">MAYORAL SUKNJA</h4>
               <h5 class="text-center">4000,00 RSD</h5>
                -->            <!--</div>
            </div>

            <div class="item">
              <div class="col-xs-12 col-sm-6 col-md-2">
                <a href="#"><img src="<?= $this->assetUrl('img/partners/DRJSCS.png') ?>" class="img-responsive center-block"></a>-->
               <!--  <h4 class="text-center">MAYORAL KOŠULJA</h4>
               <h5 class="text-center">4000,00 RSD</h5> -->
              <!--</div>
            </div>

            <div class="item">
              <div class="col-xs-12 col-sm-6 col-md-2">
                <a href="#"><img src="<?= $this->assetUrl('img/partners/logo_espace_sud.png') ?>" class="img-responsive center-block"></a>-->
             <!--    <span class="badge">10%</span> -->
  <!--               <h4 class="text-center">PANTALONE TERI 2</h4>
  <h5 class="text-center">4000,00 RSD</h5>
  <h6 class="text-center">5000,00 RSD</h6> -->
              <!--</div>
            </div>

            <div class="item">
              <div class="col-xs-12 col-sm-6 col-md-2">
                <a href="#"><img src="<?= $this->assetUrl('img/partners/logo ville_du_marin.png') ?>" class="img-responsive center-block"></a>-->
  <!--               <h4 class="text-center">CVETNA HALJINA</h4>
  <h5 class="text-center">4000,00 RSD</h5> -->
              <!--</div>
            </div>

            <div class="item">
              <div class="col-xs-12 col-sm-6 col-md-2">
                <a href="#"><img src="<?= $this->assetUrl('img/partners/logo_caf.png') ?>" class="img-responsive center-block"></a>-->
  <!--               <h4 class="text-center">MAJICA FOTO</h4>
  <h5 class="text-center">4000,00 RSD</h5> -->
              <!--</div>
            </div>

            <div class="item">
              <div class="col-xs-12 col-sm-6 col-md-2">
                <a href="#"><img src="<?= $this->assetUrl('img/partners/logo_simar.png') ?>" class="img-responsive center-block"></a>-->
  <!--               <h4 class="text-center">MAJICA MAYORAL</h4>
  <h5 class="text-center">4000,00 RSD</h5> -->
              <!--</div>
            </div>
          </div>-->
          <!-- Fin de carousel inner -->
          <!-- Slider control -->
          <!--<div id="slider-control">
            <a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="https://s12.postimg.org/uj3ffq90d/arrow_left.png" alt="Left" class="img-responsive"></a>
            <a class="right carousel-control" href="#itemslider" data-slide="next"><img src="https://s12.postimg.org/djuh0gxst/arrow_right.png" alt="Right" class="img-responsive"></a>
          </div>-->
          <!-- Fin slider control -->
        <!--</div>
      </div>
    </div>
  </div>-->
  <!-- Item slider end-->

  <!-- Item slider-->
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <div class="carousel slide slide2" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
          <div class="carousel-inner slide-partner">
          
          </div>
          <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
        </div>
        </div>
    </div>
  </div>
  <!-- Item slider end-->

  <div class="row">
      <div class="col-lg-12">
      <div class="infos">
          <div class="row">
              <div class="col-sm-4 text-center coord">
                  <h3>Centre Social Alliance sociale</h3>
                  <p>LCR Résidence Gaïac<br>
                  Quartier Cédalise<br>
                  97290 LE MARIN</p>
<!--                                <div class="slider">
                      Slider partenaire
                  </div> -->
              </div>

              <div class="col-sm-4 text-center coord">
                  <h2>Téléphones</h2>

                  <p>0596 74 76 58<br>
                  0696 27 65 85<br>
                  </p>
              </div>

              <div class="col-sm-4 text-center coord">
                  <h3>Horaire</h3>

                  <p>Le lundi : de 8h00 à 12h00 et de 13h00 à 17h00<br>
                  Du Mardi au Vendredi : 8h00 à 17h00<br>
                  Le Samedi : 9h00 à 12h00 et de 14h00 à 17h00</p>
              </div>

              </div>
              </div>
              <br>

              <div class="col-md-12 text-center copyright">
     
                 <b>C.CASCA J.DESTIN C.JEAN-TOUSSAINT E-L.ROBARD R.MARIE-LUCE  &copy; 2017 </b>
              </div>
      </div>
  </div>
</footer>
       
</div>        
    <!-- Fin footer -->
</div>
<!-- Fin Page -->
<!-- jQuery -->
<script src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>


<!-- JQuery UI -->
<script src="<?= $this->assetUrl('js/jquery-ui.min.js') ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script>

<!-- Full calendar -->
<script src="<?= $this->assetUrl('js/fullcalendar/moments.js') ?>"></script>
<script src="<?= $this->assetUrl('js/fullcalendar/fullcalendar.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/fullcalendar/gcal.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/fullcalendar/fr.js') ?>"></script>



<!-- Navigation fixe -->

<script type="text/javascript">
		$(function(){
			// On recupere la position du bloc par rapport au haut du site
			var position_top_raccourci = $("#navigation").offset().top;
			
			//Au scroll dans la fenetre on d�clenche la fonction
			$(window).scroll(function () {
			
				//si on a defile de plus de 150px du haut vers le bas
				if ($(this).scrollTop() > position_top_raccourci) {
				
					//on ajoute la classe "fixNavigation" a <div id="navigation">
					$('#navigation').addClass("fixNavigation"); 
                    
                    $('#minilogo').addClass("minilogoscroll"); 
                    
                    $('#minilogo').removeClass("minilogo"); 
                    
                    $('#minilogo').removeClass("minilogoscrollnone"); 
				} else {
				
					//sinon on retire la classe "fixNavigation" a <div id="navigation">
					$('#navigation').removeClass("fixNavigation");
                    
                    $('#minilogo').removeClass("minilogoscroll"); 
                    
                    $('#minilogo').addClass("minilogoscrollnone"); 
                    
                    $('#minilogo').addClass("minilogo"); 
				}
                
			});
		});
		</script>


<!-- API Facebook -->
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
  //Full calendar commence ici
  var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var picture = '/Alliance-Sociale/public/';
        var lien = '/Alliance-Sociale/public/events/view/';
        
  $('#calendar').fullCalendar({
            events: "<?= $this->url('listAllEvent'); ?>",
            header: {
                left: '',
                center: 'prev title next',
                right: ''
            },
            eventClick:  function(event, jsEvent, view) {
                $('#modalTitle').html(event.title);
                $('#picture').attr('src',picture+event.picture);
                $('#modalBody').html(event.content);
                $('#link').attr('href',lien+event.id);
                $('#fullCalModal').modal();
            },
    
      
        
          
        });
    
   $('#calendar2').fullCalendar({
            events: "<?= $this->url('listAllEvent'); ?>",
            header: {
                left: '',
                center: 'prev title next',
                right: ''
            },
            eventClick:  function(event, jsEvent, view) {
                $('#modalTitle2').html(event.title);
                $('#picture2').attr('src',picture+event.picture);
                $('#modalBody2').html(event.content);
                $('#link2').attr('href',lien+event.id);
                $('#fullCalModal2').modal();
            },
    
      
        
          
        });
    
    $('#calendar3').fullCalendar({
            events: "<?= $this->url('listAllEvent'); ?>",
            header: {
                left: '',
                center: 'prev title next',
                right: ''
            },
            eventClick:  function(event, jsEvent, view) {
                $('#modalTitle3').html(event.title);
                $('#picture3').attr('src',picture+event.picture);
                $('#modalBody3').html(event.content);
                $('#link3').attr('href',lien+event.id);
                $('#fullCalModal3').modal();
            },
    
      
        
          
        });
  //Fin du full calendar
  // Slider carousel
  // $('#itemslider').carousel({ interval: 3000 });
  // $('.carousel-showmanymoveone .item').each(function(){
  //   var itemToClone = $(this);

  //   for (var i=1;i<6;i++) {
  //     itemToClone = itemToClone.next();


  //     if (!itemToClone.length) {
  //       itemToClone = $(this).siblings(':first');
  //     }

  //     itemToClone.children(':first-child').clone()
  //       .addClass("cloneditem-"+(i))
  //       .appendTo($(this));
  //   }
  // });
  // Slider
  $.getJSON('<?= $this->url('showAllPartners')?>',function(data) 
  {
      var res = "";
      $.each(data, function(index, val) 
      {
        res += '<div class="text-center item">';
        res += '<div class="col-md-2 col-sm-6 col-xs-12">';
        res += '<a href="#">';
        res += '<img class="img-responsive" src="/Alliance-Sociale/public/assets'+val.url+'" alt="'+val.alt+'"/>';
        res += '</a>';
        res += '</div>';
        res += '</div>';
        // res += '<div class="content text-center">'+val.alt+'</div>';
      });
      $('.slide-partner').html(res);
      $('.slide-partner').find("div:first-child").addClass('active');

      $('.slide2[data-type="multi"] .item').each(function(){
        var next = $(this).next();
        if (!next.length) {
          next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));
        
        for (var i=0;i<4;i++) {
          next=next.next();
          if (!next.length) {
              next = $(this).siblings(':first');
          }
          
          next.children(':first-child').clone().appendTo($(this));
        }
      });

  });
  // Fin slider
  // Menu dynamique
  $.getJSON('<?= $this->url('showAllCategories')?>'}, function(json, textStatus) {
      /*optional stuff to do after success */
  });
  //Fin menu dynamique
});
</script>
<!-- Permet des inclusions de scripts depuis la vue -->
<?php echo $this->section("script") ?>

</body>
</html>
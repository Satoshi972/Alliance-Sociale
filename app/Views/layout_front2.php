<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $this->e($title) ?></title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
    
    <?php echo $this->section("sliderCss") ?>
    <link rel="stylesheet" href="<?= $this->assetUrl('css/sliderCss.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/jumboCss.css') ?>">
   <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/front.css') ?>">
    
    
    <!-- CSS pour le calendrier -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/fullcalendar.min.css') ?>">
    
    <?php echo $this->section("head") ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Alliance Sociale</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.html">Accueil</a>
                    </li>
                    <li>
                        <a href="services.html">Présentation</a>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Evènements <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="portfolio-1-col.html">1 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-2-col.html">2 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-3-col.html">3 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-4-col.html">4 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-item.html">Single Portfolio Item</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nos Activités <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-home-1.html">Blog Home 1</a>
                            </li>
                            <li>
                                <a href="blog-home-2.html">Blog Home 2</a>
                            </li>
                            <li>
                                <a href="blog-post.html">Blog Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="services.html">Contactez nous</a>
                    </li>
                    <li>
                        <a href="services.html">Adhésion</a>
                    </li>
                    <li>
                        <a href="services.html">Galeries</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
    <header>
    <img class="img-responsive" src="<?= $this->assetUrl('img/montage.jpg') ?>">
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    
                </h1>
            </div>
            
                    <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        
                    </div>
                    <div class="panel-body">
            <!-- Zone d'inclusion de Facebook -->
            <div class="push fb-page" align="center" data-href="https://www.facebook.com/AllianceSocialeduMarin/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/AllianceSocialeduMarin/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/AllianceSocialeduMarin/">Alliance Sociale</a></blockquote></div>           
                    </div>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-8 col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        
                    </div>
                    <div class="panel-body contenu">
            <?= $this->section('main_content') ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        
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
                        <!-- <img id="picture" class="modal-body img-responsive img-thumbnail text-center" alt='Affiche'> -->
                        <div id="modalBody" class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a id="link" ><button class="btn btn-primary">Plus d'info</button></a>
                        </div>
                    </div>
                </div>
              </div>
            <!-- Zone calendrier -->
            <br>
                        <div class="meteo">
             <iframe src="https://www.meteoblue.com/fr/meteo/widget/daily/le-marin_martinique_3570426?geoloc=fixed&days=4&tempunit=CELSIUS&windunit=KILOMETER_PER_HOUR&coloured=coloured&pictoicon=0&pictoicon=1&maxtemperature=0&maxtemperature=1&mintemperature=0&mintemperature=1&windspeed=0&windspeed=1&windgust=0&winddirection=0&uv=0&humidity=0&precipitation=0&precipitationprobability=0&spot=0&pressure=0&layout=light"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups" style="width: 216px;height: 240px"></iframe><div><!-- DO NOT REMOVE THIS LINK --><a href="https://www.meteoblue.com/fr/meteo/prevision/semaine/le-marin_martinique_3570426?utm_source=weather_widget&utm_medium=linkus&utm_content=daily&utm_campaign=Weather%2BWidget" target="_blank"></a></div>
                             
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="container-fluid">

  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="carousel carousel-showmanymoveone slide" id="itemslider">
        <div class="carousel-inner">

          <div class="item active">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?= $this->assetUrl('img/partners/sa.png') ?>" class="img-responsive center-block"></a>
 <!--              <h4 class="text-center">MAYORAL SUKNJA</h4>
             <h5 class="text-center">4000,00 RSD</h5>
              -->            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?= $this->assetUrl('img/partners/DRJSCS.png') ?>" class="img-responsive center-block"></a>
             <!--  <h4 class="text-center">MAYORAL KOŠULJA</h4>
             <h5 class="text-center">4000,00 RSD</h5> -->
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?= $this->assetUrl('img/partners/logo_espace_sud.png') ?>" class="img-responsive center-block"></a>
           <!--    <span class="badge">10%</span> -->
<!--               <h4 class="text-center">PANTALONE TERI 2</h4>
<h5 class="text-center">4000,00 RSD</h5>
<h6 class="text-center">5000,00 RSD</h6> -->
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?= $this->assetUrl('img/partners/logo ville_du_marin.png') ?>" class="img-responsive center-block"></a>
<!--               <h4 class="text-center">CVETNA HALJINA</h4>
<h5 class="text-center">4000,00 RSD</h5> -->
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?= $this->assetUrl('img/partners/logo_caf.png') ?>" class="img-responsive center-block"></a>
<!--               <h4 class="text-center">MAJICA FOTO</h4>
<h5 class="text-center">4000,00 RSD</h5> -->
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?= $this->assetUrl('img/partners/logo_simar.png') ?>" class="img-responsive center-block"></a>
<!--               <h4 class="text-center">MAJICA MAYORAL</h4>
<h5 class="text-center">4000,00 RSD</h5> -->
            </div>
          </div>

       
        </div>

        <div id="slider-control">
        <a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="<?= $this->assetUrl('img/arrow_left.png') ?>" alt="Left" class="img-responsive"></a>
        <a class="right carousel-control" href="#itemslider" data-slide="next"><img src="<?= $this->assetUrl('img/arrow_right.png') ?>" alt="Right" class="img-responsive"></a>
      </div>
      </div>
    </div>
  </div>
</div>

        <hr>

        <!-- Footer -->
        <footer>
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
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>

    <!-- /.container -->

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

    <!-- API Facebook -->

    <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
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
        var picture = '/Alliance_Sociale/public/';
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
                //$('#picture').attr('src',picture+event.picture);
                $('#modalBody').html(event.content);
                $('#link').attr('href',lien+event.id);
                $('#fullCalModal').modal();
            }
        });
  //Fin du full calendar
});
</script>
<script>
    (function(){

  $('#itemslider').carousel({ interval: 3000 });
}());

(function(){
  $('.carousel-showmanymoveone .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<6;i++) {
      itemToClone = itemToClone.next();


      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }


      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());
    
    </script>

</body>

</html>

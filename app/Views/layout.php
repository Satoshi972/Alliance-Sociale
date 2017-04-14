<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $this->e($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">  

    <link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">

	<link rel="stylesheet" href="<?= $this->assetUrl('css/style_modal.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	

	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">

	<!-- Permet l'inclusion de head dans ma vue  -->
	<?= $this->section('head') ?>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/simple-sidebar.css') ?>">
  
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
                        </button>
                        <a class="navbar-brand" href="#">Espace Administration</a>
                    </div>
                    <div id="navbar-collapse" class="collapse navbar-collapse">
                        <form class="navbar-form navbar-left" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </span>
                            </div>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
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
                                    <li><a href="#">Mon compte</a></li>
                                    <li><a href="#">Déconnexion</a></li>
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
    <div>
      
      <!-- menu -->
      <div id="MainMenu">
        <div class="list-group panel">

        <a href="#demo1" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
            <span class="sidebar-icon"><i class="fa fa-users"></i></span>
          <span class="sidebar-title1">
          Gestion des utilisateurs   <i class="fa fa-caret-down"></i></a>
          <div class="collapse" id="demo1">
            <a href="" class="list-group-item">Liste des Utilisateurs</a>
            <a href="" class="list-group-item">Ajout d'utilisateur</a>
          </div>

          <a href="#demo2" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
          <span class="sidebar-icon"><i class="fa fa-newspaper-o"></i></span>
          <span class="sidebar-title1">Gestion Fiche de contact   <i class="fa fa-caret-down"></i></a>
          <div class="collapse" id="demo2">
            <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Liste des fiches <i class="fa fa-caret-down"></i></a>
            <div class="collapse list-group-submenu" id="SubMenu1">
              <a href="#" class="list-group-item" data-parent="#SubMenu1">Détails de la fiche</a>
              <a href="#" class="list-group-item" data-parent="#SubMenu1">Marquer comme lu</a>
              <a href="#" class="list-group-item" data-parent="#SubMenu1">Suppression</a>
            </div>
            <a href="javascript:;" class="list-group-item">Recherche mot clé</a>
          </div>


          <a href="#demo3" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
            <span class="sidebar-icon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
          <span class="sidebar-title1">
          Gestion des Evènements   <i class="fa fa-caret-down"></i></a>
          <div class="collapse" id="demo3">
            <a href="" class="list-group-item">Ajouter un évènement</a>
            <a href="" class="list-group-item">Liste des Evènements</a>
          </div>

          <a href="#demo4" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
            <span class="sidebar-icon"><i class="fa fa-fire" aria-hidden="true"></i></span>
          <span class="sidebar-title1">
          Gestion des Activités   <i class="fa fa-caret-down"></i></a>
          <div class="collapse" id="demo4">
            <a href="" class="list-group-item">Liste des Activités</a>
            <a href="" class="list-group-item">Ajouter une activité</a>
            <a href="" class="list-group-item">Liste des Catégories</a>
            <a href="" class="list-group-item">Ajouter une catégorie</a>
          </div>

          <a href="#demo5" class="list-group-item list-group-item-primary" data-toggle="collapse" data-parent="#MainMenu">
            <span class="sidebar-icon"><i class="fa fa-camera" aria-hidden="true"></i>
</span>
          <span class="sidebar-title1">
          Médias   <i class="fa fa-caret-down"></i></a>
          <div class="collapse" id="demo5">
            <a href="" class="list-group-item">Ajouter un média</a>
            <a href="" class="list-group-item">Galerie</a>
          </div>
        </div>
      </div>
    </div>
  </div>
    
</div>
                </ul>
            </aside>            
        </div>
        <main id="page-content-wrapper" role="main">
        <div class="content">
        <!-- <div id="page-wrapper"> -->
            <?= $this->section('main_content') ?>
        </div>
        </main>
    </div> 


    <!-- jQuery -->
  	<script src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=$this->assetUrl('js/bootstrap.min.js')?>"></script>

    <script src="<?= $this->assetUrl('js/script_modal.js') ?>"></script>

    <!-- Permet l'insertion de script dans ma vue -->
    <?= $this->section('script'); ?>


    <script>
        $(function(){
            $('#submitForm').click(function(el){
                el.preventDefault(); // On bloque l'action par défaut

                var form_user = $('#checkform'); // On récupère le formulaire
                $.ajax({
                    method: 'post',
                    url: '<?= $this->url("ajax_login") ?>',
                    data: form_user.serialize(), // On récupère les données à envoyer
                    success: function(resultat){
                        $('#result').html(resultat);
                        form_user.find('input').val(''); // Permet de vider les champs du formulaire.. 
                    }
                });
            });
            
            $('#ask_token').click(function(el){
                el.preventDefault(); // On bloque l'action par défaut

                var form_user = $('#checkform2'); // On récupère le formulaire
                $.ajax({
                    method: 'post',
                    url: '<?= $this->url("ajax_ask_token") ?>',
                    data: form_user.serialize(), // On récupère les données à envoyer
                    success: function(resultat){
                        $('#result').html(resultat);
                        form_user.find('input').val(''); // Permet de vider les champs du formulaire.. 
                    }
                });
            });
        
             $('#submitform2').click(function(el){
                el.preventDefault(); // On bloque l'action par défaut

                var form_user = $('#checkform3'); // On récupère le formulaire
                $.ajax({
                    method: 'post',
                    url: '<?= $this->url("ajax_logout") ?>',
                    data: form_user.serialize(), // On récupère les données à envoyer
                    success: function(resultat){
                        $('#result').html(resultat);
                        form_user.find('input').val(''); // Permet de vider les champs du formulaire.. 
                    }
                });
            });
            
            $('#new_mdp').click(function(el){
                el.preventDefault(); // On bloque l'action par défaut

                var form_user = $('#checkform4'); // On récupère le formulaire
                $.ajax({
                    method: 'post',
                    url: '<?= $this->url("ajax_resetpsw") ?>',
                    data: form_user.serialize(), // On récupère les données à envoyer
                    success: function(resultat){
                        $('#result').html(resultat);
                        form_user.find('input').val(''); // Permet de vider les champs du formulaire.. 
                    }
                });
            });
            
        });
</script>


</body>
</html>
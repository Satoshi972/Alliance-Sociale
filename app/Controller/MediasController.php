<?php

namespace Controller;

use \W\Controller\Controller;
use Controller\MasterController as Master;
use \Model\MediasModel as medias;
use \Model\ActivityModel as activity;
use \Model\CategoryModel as category;
use \Model\EventsModel as events;
use Respect\Validation\Validator as v;
use Intervention\Image\ImageManagerStatic as i;

class MediasController extends MasterController
{
	public function addMedias()
	{
		$roles = ['admin','editor'];
    	$this->allowTo($roles);

		$medias 	= new medias();
		$events    	= new events();
		$list       = $events->findAll();
		$errors 	= [];
		$success 	= false;


		$check = new Master();		
		//var_dump($_FILES);
		// var_dump($_FILES['picture']['error']);
		//var_dump($_FILES).'<br>';

		
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{		
	        if(!empty($_FILES))
	        {
	        	//die(var_dump($this->checkMedia($_FILES['medias'])));
	        	$tabMdedias = $check->checkMedia($_FILES['medias']);

			    if($tabMdedias)
			    {
			    	for($i=0; $i<count($tabMdedias);$i++)
			    	{
			    		$datas = [
			    			'url' 		=> $tabMdedias[$i],
			    			'id_related'=> $_POST['event'],
			    			'visible'	=> (isset($_POST['visible'])) ? 1 : 0,
			    			];
			    		$medias->insert($datas);
			        	$success = true;
			    	}
			    }
			    else
			    {
			    	$errors[] = 'Erreur, aucun médias correct détecté...';
			    }

		    }			    
		    else
		    {
		    	$errors[] = 'Erreur, aucun médias envoyé...';
		    }
		}

			$params = [
			'success' => $success,
			'errors'  => $errors,
			'list'	  => $list,
			];

	$this->show('medias/add_medias',$params);

	}

	public function listMedias($page)
	{
		$medias = new medias();
		# doc https://zestedesavoir.com/tutoriels/351/paginer-avec-php-et-mysql/

		$MediasPerPages  = 12; #Nous allons afficher 12 images par pages
		$nbMedias		 = $medias->nbMedias(); //Compte le nombre de médias en bdd 
		$nbPages 		 = ceil($nbMedias/$MediasPerPages); #Permet d'obtenir un chiffre rond, pour mon nombre de pages

		
		if(isset($page)) # Si la variable $_GET['page'] existe...
		{
		      $currentPage=intval($page);

	 
		     if($currentPage>$nbPages) # Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nbPages...
		     {
		          $currentPage=$nbPages;
		     }
		}
		else
		{
		     $currentPage=1; #La page actuelle est la n°1 
		     // $pages = 1;   
		}

		//var_dump($currentPage);
 
		$firstEntry= ($currentPage-1)*$MediasPerPages; // On calcul la première entrée à lire
		# La requête sql pour récupérer les messages de la page actuelle.
		$retour_messages= $medias->listPageMedias($firstEntry, $MediasPerPages);
 
		$params = [
			//'images' => $images,
			'medias'	  => $retour_messages,
			'nbPages'	  => $nbPages,
			'currentPage' => $currentPage,
			'page'		  => $page,
		];
		$this->show('medias/list_medias', $params);
	}	

	public function listMediasBack($page)
	{
		$roles = ['admin','editor'];
    	$this->allowTo($roles);

		$medias = new medias();
		# doc https://zestedesavoir.com/tutoriels/351/paginer-avec-php-et-mysql/

		$MediasPerPages  = 12; #Nous allons afficher 12 images par pages
		$nbMedias		 = $medias->nbMedias(); //Compte le nombre de médias en bdd 
		$nbPages 		 = ceil($nbMedias/$MediasPerPages); #Permet d'obtenir un chiffre rond, pour mon nombre de pages

		
		if(isset($page)) # Si la variable $_GET['page'] existe...
		{
		      $currentPage=intval($page);

	 
		     if($currentPage>$nbPages) # Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nbPages...
		     {
		          $currentPage=$nbPages;
		     }
		}
		else
		{
		     $currentPage=1; #La page actuelle est la n°1 
		     // $pages = 1;   
		}

		//var_dump($currentPage);
 
		$firstEntry= ($currentPage-1)*$MediasPerPages; // On calcul la première entrée à lire
		# La requête sql pour récupérer les messages de la page actuelle.
		$retour_messages= $medias->listPageMedias($firstEntry, $MediasPerPages);
 
		$params = [
			//'images' => $images,
			'medias'	  => $retour_messages,
			'nbPages'	  => $nbPages,
			'currentPage' => $currentPage,
			'page'		  => $page,
		];
		$this->show('medias/list_medias_back', $params);
	}	

	public function listMediasGuest($page)
	{
		$roles = ['admin','editor, member'];
    	$this->allowTo($roles);

		$medias = new medias();
		# doc https://zestedesavoir.com/tutoriels/351/paginer-avec-php-et-mysql/

		$MediasPerPages  = 12; #Nous allons afficher 12 images par pages
		$nbMedias		 = $medias->nbMediasGuest(); //Compte le nombre de médias en bdd 
		$nbPages 		 = ceil($nbMedias/$MediasPerPages); #Permet d'obtenir un chiffre rond, pour mon nombre de pages

		
		if(isset($page)) # Si la variable $_GET['page'] existe...
		{
		      $currentPage=intval($page);

	 
		     if($currentPage>$nbPages) # Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nbPages...
		     {
		          $currentPage=$nbPages;
		     }
		}
		else
		{
		     $currentPage=1; #La page actuelle est la n°1 
		     // $pages = 1;   
		}

		//var_dump($currentPage);
 
		$firstEntry= ($currentPage-1)*$MediasPerPages; // On calcul la première entrée à lire
		# La requête sql pour récupérer les messages de la page actuelle.
		$retour_messages= $medias->listPageMedias($firstEntry, $MediasPerPages);
 
		$params = [
			//'images' => $images,
			'medias'	  => $retour_messages,
			'nbPages'	  => $nbPages,
			'currentPage' => $currentPage,
			'page'		  => $page,
		];
		$this->show('medias/list_medias_guest', $params);
	}



	public function listAlbum()
	{
		$medias   = new medias();
		$activity = new activity();
		$category = new category();
		$events   = new events();

		$listMedias   = $medias->findAll();
		$listActivity = $activity->findAll();
		$listCategory = $category->findAll();
		$listEvents   = $events->eventMedias();

		var_dump($listEvents);

		$params = [
			'medias'   => $listMedias,
			'activity' => $listActivity,
			'category' => $listCategory,
			'events'   => $listEvents,
		];

		$this->show('medias/album', $params);
	}

	public function listMediasByCat($idE)
	{
		$medias   = new medias();
		$activity = new activity();
		$category = new category();
		$events   = new events();

		$listMedias   = $medias->findAll();
		$listActivity = $activity->findAll();
		$listCategory = $category->findAll();
		$listEvents   = $events->findAll();

		$params = [
			'medias'   => $listMedias,
			'activity' => $listActivity,
			'category' => $listCategory,
			'events'   => $listEvents,
		];

		$this->show('medias/album', $params);
	}

	public function deleteMedias($id)
	{
		$roles = ['admin','editor'];
    	$this->allowTo($roles);
    	
		$medias = new medias();
		$medias->delete($id);
		$this->redirectToRoute('listMedias',['page'=>1]);
	}

	/*
	logique :
	J'ai ma page ou j'affiche une liste de event
	Au clik sur l'event, via un id, j'affiche TOUT les medias qui appartiennent a cet event.
	Reflexion sur un tri par activité
	*/

}
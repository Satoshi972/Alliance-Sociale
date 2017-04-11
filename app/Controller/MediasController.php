<?php

namespace Controller;

use \W\Controller\Controller;
use Controller\MasterController as Master;
use \Model\MediasModel;
use Respect\Validation\Validator as v;
use Intervention\Image\ImageManagerStatic as i;

class MediasController extends MasterController
{

	public function addMedias()
	{
		$medias 	= new MediasModel();
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
	        	var_dump($tabMdedias);

			    if($tabMdedias)
			    {
			    	for($i=0; $i<count($tabMdedias);$i++)
			    	{
			    		$datas = ['url' => $tabMdedias[$i]];
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
			];

	$this->show('medias/add_medias',$params);

	}

	public function listMedias()
	{
		// On instancie le model qui permet d'effectuer un findAll() 
		$medias = new MediasModel();
		$images = $medias->findAll();

		$params = [
			'images' => $images
		];
		$this->show('medias/list_medias', $params);
	}

}
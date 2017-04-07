<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends MasterController
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
	}

}
<?php

namespace Controller;

use \W\Controller\Controller;

class ActivitiesController extends MasterController
{

	/**
	 * Page d'accueil par défaut
	 */
	public function activities()
	{
		$this->show('default/activities');
	}

}
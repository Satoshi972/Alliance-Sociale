<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\EventsModel;



class DefaultController extends MasterController
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
        date_default_timezone_set('America/Martinique');
        
        $find = new EventsModel();
        $infosfut =$find->findAllEventsFut($orderBy = 'start', $orderDir = 'ASC', $limit = 5, $offset = null);
        
        $find = new EventsModel();
        $infospres =$find->findAllEventsPres($orderBy = 'end', $orderDir = 'ASC', $limit = 5, $offset = null);
        
        $find = new EventsModel();
        $infospas =$find->findAllEventsPas($orderBy = 'end', $orderDir = 'ASC', $limit = 5, $offset = null);
        
        $params = ["infosfut" => $infosfut,
                   "infospres" => $infospres,
                   "infospas" => $infospas,
                  
                  ];
		$this->show('default/home', $params);
	}

  public function admin()
  {
    $roles = ['admin','editor'];
    $this->allowTo($roles);
    $this->show('default/admin');
  }

}